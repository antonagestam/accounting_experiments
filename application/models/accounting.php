<?php
	class accounting extends CI_Model
	{
		private $nodes;
		private $incomes;
		private $expenses;
		
		public function __construct(){
			parent::__construct();
		}
		
		public function new_transaction($data){
			$this->db->insert('transactions',$data);
		}
		
		public function new_node($data){
			$this->db->insert('nodes',$data);
		}
		
		public function get_types(){
			$this->db
				->from('node_types')
				->order_by('label');
			$query = $this->db->get();
			return $query->result();
		}
		
		public function get_node($id){
			// return the cached version if there is one
			if(isset($this->nodes[$id])) return $this->nodes[$id];
			// otherwise query db
			$this->db
				->from('nodes')
				->where('id',intval($id))
				->limit(1);
			$query = $this->db->get();
			$this->nodes[$id] = $query->row();
			return $this->nodes[$id];
		}
		
		public function get_balance($id){
			$income = 0;
			$expenses = 0;
			
			// get the cached values if they are set
			if(isset($this->incomes[$id],$this->expenses[$id])){
				return $this->incomes[$id] - $this->expenses[$id];
			}
			
			// get income
			$this->db
				->from('transactions')
				->where('to',$id)
				->select('value');
			$query = $this->db->get();
			if($query->num_rows()>0){
				$result = $query->result();
				foreach($result as $transaction){
					$income += $transaction->value;
				}
			}
			// cache the income
			$this->incomes[$id] = $income;
			
			// get expenses
			$this->db
				->from('transactions')
				->where('from',$id)
				->select('value');
			$query = $this->db->get();
			if($query->num_rows()>0){
				$result = $query->result();
				foreach($result as $transaction){
					$expenses += $transaction->value;
				}
			}
			// cache the expenses
			$this->expenses[$id] = $expenses;
			
			return $income - $expenses;
		}
		
		public function list_nodes(){
			$query = $this->db->query("SELECT nodes.id,nodes.label,node_types.label AS type FROM nodes,node_types WHERE nodes.type = node_types.id ORDER BY nodes.label");
			if($query->num_rows()<1) return false;
			$result = $query->result();
			foreach($result as $index => $node){
				$node->balance = $this->get_balance($node->id);
				$result[$index] = $node;
			}
			$this->cache_nodes($result);
			return $result;
		}
		
		public function list_transactions(){
			$query = $this->db->get('transactions');
			// return false if result set is empty
			if($query->num_rows()<1) return false;
			$result = $query->result();
			// get labels of nodes
			foreach($result as $index => $row){
				$row->from = $this->get_node($row->from)->label;
				$row->to = $this->get_node($row->to)->label;
				$result[$index] = $row;
			}
			return $result;
		}
		
		private function cache_nodes($result){
			foreach($result as $node){
				if(!isset($this->nodes[$node->id]))
					$this->nodes[$node->id] = $node;
			}
		}
	}
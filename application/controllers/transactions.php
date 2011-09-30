<?php
	class transactions extends CI_Controller
	{
		public function index(){
			$this->load->model('accounting');
			$this->load->view('template',array(
				'view' => 'transactions',
				'transactions' => $this->accounting->list_transactions(),
			));
		}
		
		public function add(){
			$this->load->model('accounting');
			$this->load->view('template',array(
				'view' => 'add_transaction',
				'nodes' => $this->accounting->list_nodes(),
			));
		}
		
		public function add_transaction(){
			$data = array(
				'from' => $this->input->post('from'),
				'value' => $this->input->post('value'),
				'to' => $this->input->post('to'),
				'reference_no' => $this->input->post('reference_ne'),
				'note' => $this->input->post('note'),
				'timestamp' => time(),
			);
			$this->load->model('accounting');
			$this->accounting->new_transaction($data);
			redirect('transactions');
		}
	}
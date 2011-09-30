<?php
	class nodes extends CI_Controller
	{
		public function index(){
			$this->load->model('accounting');
			$this->load->view('template',array(
				'view' => 'nodes',
				'nodes' => $this->accounting->list_nodes(),
			));
		}
		
		public function add(){
			$this->load->model('accounting');
			$this->load->view('template',array(
				'view' => 'add_node',
				'types' => $this->accounting->get_types(),
			));
		}
		
		public function add_node(){
			$this->load->model('accounting');
			$data = array(
				'label' => $this->input->post('label'),
				'type' => $this->input->post('type'),
			);
			$this->accounting->new_node($data);
			redirect('nodes');
		}
	}
<?php
	class start extends CI_Controller
	{
		public function index(){
			$this->load->model('accounting');
			$this->load->view('template',array(
				'view' => 'start',
			));
		}
	}
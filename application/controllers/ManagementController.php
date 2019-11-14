<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManagementController extends CI_Controller 
{

	function __construct()
	{
		parent:: __construct();
		$this->load->view('layouts/Header');
		$this->load->model('Management_model');
	}

	public function index()
	{
		$this->load->view('VST/management');
	}

	public function Execute()
	{
		$result = $this->Management_model->SqueryExecute();
		
	}

	public function SaveQuery()
	{
		$result = $this->Management_model->SaveQuery();
		$msg['success'] = false;
		if($result)
		{
			$msg['success'] = true;
		}
		
		echo json_encode($msg);
		exit();
	}


} # CLASS ENDS
?>
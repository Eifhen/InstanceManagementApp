<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InstanceController extends CI_Controller 
{

	function __construct()
	{
		parent:: __construct();
		$this->load->view('layouts/Header');
		$this->load->model('Instance_model');
	}

	public function index()
	{
		$this->load->view('VST/instance');
	}

	public function FileCreator()
	{
		$result = $this->Instance_model->FileCreator();
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

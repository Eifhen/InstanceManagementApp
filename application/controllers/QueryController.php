<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class QueryController extends CI_Controller
{
	function __construct()
	{
		parent:: __construct();
	}



	public function Editar()
	{

		$id = $this->input->get('id');
		$data = file_get_contents("description/".$id);
		$field = json_decode($data, true);

	
		echo json_encode($field);
		exit();

	}

	public function Update()
	{
		
		$NombreNuevo = $this->input->post('newName');
		$field = array(
			'NombreConsulta' => $this->input->post('saveAs'),
			'Descripcion' => $this->input->post('inputDetails'),
			'Fecha' => $this->input->post('fecha'),
			'Consulta' => $this->input->post('queryInfo')
			);

		$p = $field['NombreConsulta'];

        rename('description/'.$p."", 'description/'.$NombreNuevo);

        $field['NombreConsulta'] = $NombreNuevo;
        $json_string = json_encode($field);

        $file = fopen("description/".$NombreNuevo."","w");
		fputs($file,$json_string);
		fclose($file);

		$msg['success'] = true;
		echo json_encode($msg);
		exit();
	}

} #ENDS CLASS
?>
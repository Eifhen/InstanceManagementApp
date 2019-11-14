<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Instance_model extends CI_Model
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->dbforge();
		$this->load->database(); #cargamos la db
	}

	function FileCreator()
	{
		$attr = array('ENGINE' => 'InnoDB');
		$field = array(
			'InstanceName' => $this->input->post('NombreInstancia'),
			'InstanceUser' => $this->input->post('NombreUsuario'),
			'InstancePassWord' => $this->input->post('password'),
			'InstanceHost' => $this->input->post('Host'),
			'InstancePort' => $this->input->post('Port')
			);

		//Creamos el JSON
        $json_string = json_encode($field);
        $file = fopen("files/".$field['InstanceName']."","w");
       // $direccion = "files/".$field['InstanceName'].".json";
		fputs($file,$json_string);
		fclose($file);

		##-------------------------------------------------------------------------------
					# Cadena de Coneccion
		##-------------------------------------------------------------------------------
        $conexion = new mysqli($field['InstanceHost'],$field['InstanceUser'],$field['InstancePassWord']);
		
		

	} #ends function







}	#ENDS CLASS

 ?>
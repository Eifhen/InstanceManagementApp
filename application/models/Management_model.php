<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
Class Management_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function SqueryExecute()
	{
		$sql = $this->input->post('sqlconsulta');
		$instancia['instance'] = $this->input->post('instance');
		foreach ($instancia['instance'] AS $arr) 
		{
			$data = file_get_contents("files/".$arr);
			$field = json_decode($data, true);

			##-------------------------------------------------------------------------------
										# Cadena de Coneccion
			##-------------------------------------------------------------------------------

			// conection string
	        $conexion = new mysqli($field['InstanceHost'],$field['InstanceUser'],$field['InstancePassWord']);
	        $conexion->select_db($field['InstanceName']);
			$resultado = $conexion->query($sql);
			
			
		}
		
		$ss= array('flag' =>true ,'status' => $conexion->error );;
		if(!$resultado)
		{

			$ss['flag'] = false;
		}
		echo json_encode($ss);
		exit();
	}

	function SaveQuery()
	{
		$field = array(
			'NombreConsulta' => $this->input->post('saveAs'),
			'Descripcion' => $this->input->post('inputDetails'),
			'Fecha' => $this->input->post('fecha'),
			'Consulta' => $this->input->post('queryInfo')
			);

		//Creamos el JSON
        $json_string = json_encode($field);
        $file = fopen("description/".$field['NombreConsulta']."","w");
		fputs($file,$json_string);
		fclose($file);
	}

	

} #Ends Class
 ?>
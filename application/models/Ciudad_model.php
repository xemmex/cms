<?php
class Ciudad_model extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
	}

	/**
	* Devuelve una lista de ciudades
	*
	* @return array
	*/
	public function getAllCiudades()
	{
		//el parametro es el nombre de la tabla
		$query = $this->db->get('ciudad');
		//devuelve un array de filas
		return $query->result_array();
		/*
		Mientras sea una tabla sola, la usamos asi,
		pero si es un join de varias tablas hay que usar los
		prepared statements que usamos en la app
		*/
	}

	public function set_ciudad()
	{		
		$data = $this->input->post();
		$data = array(
			'ciNombre'	=> $this->input->post('nombre'),
			'ciLatitud'	=> $this->input->post('latitud'),
			'ciLongitud'=> $this->input->post('longitud')
		);
		return $this->db->insert('ciudad', $data);
	}
}
<?php

abstract class Abstracto extends CI_Controller{
	protected $_data;
	public function __construct()
        {        		
                parent::__construct();
                //helper para poder usar url y tener la app portable
                $this->load->helper('url');
                
        }
	
	/**
	* Carga layout completo
	* @param string $pageUrl
	* 
	* @return
	*/
	public function cargarLayout($pageUrl){
		$this->load->view('templates/header', $this->_data);
        $this->load->view($pageUrl, $this->_data);
        $this->load->view('templates/footer', $this->_data);
	}
	
	/**
	* Obtiene datos en json 
	* @param array $data
	* 
	* @return object
	*/
	protected function _getDataFromServer($data){
		$data = json_encode($data);	
		$opciones = array(
			'http'=>array(
				'method'=>"POST",
				'header'=> "Content-type: application/json",
				"content"	=> $data
		));	
		$contexto = stream_context_create($opciones);			
		return json_decode(file_get_contents(REMOTE_SERVER_JSON, false, $contexto));	
	}
	
}
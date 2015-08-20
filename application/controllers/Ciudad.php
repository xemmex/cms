<?php
require_once 'Abstracto.php';
class Ciudad extends Abstracto
{
	public function __construct()
	{
		parent::__construct();
		//asigna el modelo al controlador
		$this->load->model('ciudad_model');
	}

	public function index ()
	{
		/*
		{
		"controller" : "Ciudad",
		"action" : "listar",
		"LANG" : "ESP"
		}
		*/
		//el json de siempre
		
		//titulo de la pagina
		$this->_data['title'] = 'Lista de ciudades';
		
		//datos para el json
		$data = array("controller" => "Ciudad",
		"action" => "listar",
		"LANG" => "ESP");
					
		//pide la data al server					
		$r = $this->_getDataFromServer($data);
		//si hay exito manda las ciudades a la vista
		if ($r->type === 'exito'){
			$this->_data['ciudades'] = $r->data;
		}else{
			//si no... manda error
			$this->_data['error'] = $r->msg;
		}		
		//carga la vista (pagina html)
		$this->cargarLayout('pages/ciudad/index');		
	}

	public function crear()
	{
		//titulo de la pagina
		$this->_data['title'] = 'Crea una ciudad';
		//helpers: uno gestiona el formulario y el otro lo valida
		/*
		el helper form tiene ademas de los campos en si, filtros, validadores y
		la posibilidad de cambiar el marcado html de los elementos
		* */
		$this->load->helper('form');
		$this->load->library('form_validation');
		//strings para los errores
		$requerido = '"{field}" es obligatorio';
		$minimo    = '"{field}" debe tener como mínimo {param} caracteres.';
		$maximo    = '"{field}" debe tener como máximo {param} characters.';
		$decimal   = '"{field} debe ser un decimal"';
		//validacion y filtrado de los 3 campos
		$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|min_length[3]|max_length[40]', array(
				'required'  => $requerido,
				'min_length'=> $minimo,
				'max_length'=> $maximo

			));
		$this->form_validation->set_rules('latitud', 'Latitud', 'trim|required|decimal',array(
				'required'=> $requerido,
				'decimal' => $decimal
			));
		$this->form_validation->set_rules('longitud', 'Longitud', 'trim|required|decimal',array(
				'required'=> $requerido,
				'decimal' => $decimal
			)
		);
		//si es invalido...
		if($this->form_validation->run() === FALSE){
			$this->cargarLayout('pages/ciudad/crear');
		}
		else
		{
			$this->ciudad_model->set_ciudad();
			redirect('/ciudad/index/');
		}
	}


}
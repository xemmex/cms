<?php
require_once 'Abstracto.php';
class Index extends Abstracto{
	public function __construct()
        {
                parent::__construct();
        }
	
	public function index (){
		if ( ! file_exists(APPPATH.'/views/pages/index.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $this->_data['title'] = 'Panel de control de Guide Me';

        $this->load->view('templates/header', $this->_data);
        $this->load->view('pages/index', $this->_data);
        $this->load->view('templates/footer', $this->_data);
	}	
}
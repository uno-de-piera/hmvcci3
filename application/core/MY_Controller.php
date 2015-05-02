<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class MY_Controller extends MX_Controller
{
    public function loadTemplates( $view, $data = array() )
    {
        $this->load->view("header");
        $this->load->view( $view, $data );
        $this->load->view("footer");
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    public $autoload = array(
        "libraries" => array( "session" )
    );

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->loadTemplates("dashboard", array() );
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if( ! function_exists( "is_logged") )
{
    function is_logged()
    {
         $ci =& get_instance();
         return $ci->session->has_userdata("id");
    }
}

if( ! function_exists( "username_logged") )
{
    function username_logged()
    {
         $ci =& get_instance();
         return $ci->session->userdata("username");
    }
}

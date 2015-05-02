<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if( ! function_exists( "setFlash" ) )
{
    function setFlash( $key, $value )
    {
        $ci =& get_instance();
        $ci->session->set_flashdata( $key, $value );
    }
}

if( ! function_exists( "getFlash" ) )
{
    function getFlash( $key )
    {
        $ci =& get_instance();
        return $ci->session->flashdata( $key );
    }
}

if( ! function_exists( "display_flash_message" ) )
{
    function display_flash_message( $key, $type )
    {
        $ci =& get_instance();
        if( $ci->session->flashdata( $key ) )
        {
            $ci->load->view( "flash_template", array( "type" => $type, "key" => $key ) );
        }
    }
}

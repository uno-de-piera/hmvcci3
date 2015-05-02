<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller
{

    public $autoload = array(
            "libraries"     =>  array("session", "bcrypt", "form_validation"),
            "helper"        =>  array("form", "flash")
    );

    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $this->loadTemplates( "login" );
    }

    public function register()
    {
        $this->loadTemplates( "register" );
    }


    public function process_register()
    {
        if( $this->input->post() )
        {
            $this->form_validation->set_rules(
                "username",
                "nombre de usuario",
                "required|trim|max_length[100]|is_unique[users.username]"
            );

            $this->form_validation->set_rules(
                "email",
                "email",
                "required|trim|valid_email|is_unique[users.email]"
            );

            $this->form_validation->set_rules(
                "password",
                "password",
                "required|trim|min_length[6]|max_length[100]"
            );

            $this->form_validation->set_message(
                "required", "El campo %s es requerido"
            );
            $this->form_validation->set_message(
                "valid_email", "El campo %s no tiene un formato correcto"
            );
            $this->form_validation->set_message(
                "min_length", "El campo %s debe tener al menos %s carácteres"
            );
            $this->form_validation->set_message(
                "max_length", "El campo %s no puede tener más de %s carácteres"
            );
            $this->form_validation->set_message(
                "is_unique", "El campo %s ya está en uso"
            );

            if( $this->form_validation->run() == FALSE )
            {
                $this->register();
            }
            else
            {
                $this->load->model("auth_model", "authModel");
                $this->authModel->setUsername($this->input->post("username"));
                $this->authModel->setEmail($this->input->post("email"));
                $password = $this->input->post("password");
                $hash = $this->bcrypt->hash($password);
                $this->authModel->setPassword($hash);

                if( $this->authModel->register() === TRUE )
                {
                    setFlash("registered", "Registro correcto");
                    redirect(base_url("login"), "refresh");
                }
                setFlash("error_register", "Registro incorrecto");
                redirect(base_url("register"), "refresh");
            }
        }
    }

    public function process_login()
    {
        if( $this->input->post() )
        {
            $this->load->model("auth_model", "authModel");
            $this->authModel->setUsername($this->input->post("username"));
            $this->authModel->setPassword($this->input->post("password"));

            if( $user = $this->authModel->login() )
            {
                $this->session->set_userdata(
                    array(
                        "id"        =>      $user->id,
                        "username"  =>      $user->username,
                        "email"     =>      $user->email,
                        "created_at"=>      $user->created_at
                    )
                );
                setFlash("logged", "Bienvenido " . $user->username );
                redirect(base_url("dashboard"), "refresh");
            }
            setFlash("user_not_found", "Usuario no encontrado" );
            redirect(base_url("login"), "refresh");
        }
    }

    public function logout()
    {
        $this->session->unset_userdata(array("id", "username", "email", "created_at"));
        setFlash("logout", "Sesión cerrada");
        redirect(base_url("login"), "refresh");
    }
}

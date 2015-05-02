<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    private $username;
    private $email;
    private $password;

    public function setUsername( $username )
    {
        $this->username = $username;
    }

    public function setEmail( $email )
    {
        $this->email = $email;
    }

    public function setPassword( $password )
    {
        $this->password = $password;
    }

    public function register()
    {
        $this->db->set(
            array(
                "username"      =>      $this->username,
                "email"         =>      $this->email,
                "password"      =>      $this->password
            )
        );

        if( $this->db->insert("users") === TRUE )
        {
            return TRUE;
        }
        return FALSE;
    }

    public function login()
    {
        $query = $this->db->select("id, username, email, password, created_at")
                ->from("users")
                ->where("username", $this->username)
                ->get();

        if( $query->num_rows() === 1 )
        {
            $user = $query->row();
            $pass = $user->password;
            if ( $this->bcrypt->verify( $this->password, $pass ) )
            {
                return $query->row();
            }
            return FALSE;
        }
        return FALSE;
    }
}

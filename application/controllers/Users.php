<?php

class Users extends CI_Controller
{
    public function register()
    {
        $data['title'] = 'sign up';

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
        $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Confirm password', 'matches[password]');

        if($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header');
            $this->load->view('users/register',$data);
            $this->load->view('templates/footer'); 
        }
        else
        {
            $enc_password = md5($this->input->post('password'));
            $this->user_model->register($enc_password);

            //set message
            $this->session->set_flashdata('user_registered','you are now registered');

            redirect('posts');
        }
    }

    public function login()
    {

        $data['title'] = 'sign in';

        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');

        if($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header');
            $this->load->view('users/login',$data);
            $this->load->view('templates/footer');
        }
        else
        {
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));

            $user_id = $this->user_model->login($username,$password);
            
            if($user_id)
            {
                //create session
                $user_data = array(
                    'user_id' => $user_id,
                    'username' => $username,
                    'logged_in' => TRUE
                );

                $this->session->set_userdata($user_data);
                //set flash message
                $this->session->set_flashdata('user_loggedin','you have loggged in');
                redirect('posts');
            }
            else
            {
                $this->session->set_flashdata('login_failed','invalid !!!');
                redirect('users/login');
            }
        }

    }
    
    public function logout()
    {   
        //unset user data
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('username');

        $this->session->set_flashdata('user_loggedout','u are now logged out!!!');
        redirect('users/login');
    }

    //check if username exists
    public function check_username_exists($username)
    {
        $this->form_validation->set_message('check_username_exists','user already exists !!!');

        if($this->user_model->check_username_exists($username))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    //check if email already exists
    public function check_email_exists($email)
    {
        $this->form_validation->set_message('check_email_exists','email already exists !!!');

        if($this->user_model->check_email_exists($email))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
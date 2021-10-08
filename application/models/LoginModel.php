<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginModel extends CI_Model
{
    public $outputData = array('responseCode' => '404', 'type' => 'error', 'msg' => 'Model Default Output');

    public function __destruct()
    {
        exit(json_encode($this->outputData));
    }


    public function login()
    {
        $validation = array(

            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|valid_email'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            )

        );
        $this->form_validation->set_rules($validation);
        if ($this->form_validation->run()) {
            $username = $this->input->post('email');
            $password = md5($this->input->post('password'));

            $res = $this->db->where(['email' => $username, 'password' => $password])->get('users');
            if ($res->num_rows()) {
                $this->load->library('session');

                $sessionData = array(
                    'user_id' => $res->row()->id,
                    'user_name' => $res->row()->name
                );
                $this->session->set_userData($sessionData);
                $this->outputData['responseCode'] = 200;
                $this->outputData['type'] = 'success';
                $this->outputData['msg'] = 'success';
                $this->outputData['data'] = $sessionData;
                $this->outputData['url'] = BASE_URL.'admin/dashboard';
                $this->outputData['swal'] = array(
                    'icon' => 'success',
                    'title' => 'Success',
                    'type' => 'success',
                    'html' => 'Login Successfully'
                );
            } else {
                $this->outputData['responseCode'] = 400;
                $this->outputData['type'] = 'error';
                $this->outputData['msg'] = 'Invalid Username & Password';
                $this->outputData['swal'] = array(
                    'icon' => 'error',
                    'title' => 'Error',
                    'type' => 'error',
                    'html' => 'Invalid Username & Password',
                );
            }
        } else {
            $this->outputData['responseCode'] = 400;
            $this->outputData['type'] = 'error';
            $this->outputData['swal'] = array(
                'icon' => 'error',
                'title' => 'Error',
                'type' => 'error',
                'html' => $this->form_validation->error_string(),
            );
        }

        return $this->outputData;
    }
}

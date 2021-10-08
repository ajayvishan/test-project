<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SignUpModel extends CI_Model
{
    public $outputData = array('responseCode' => '404', 'type' => 'error', 'msg' => 'Model Default Output');

    
    
    public function __destruct()
    {
        exit(json_encode($this->outputData));
    }
    
    
    public function insert()
    {
        date_default_timezone_set("Asia/Kolkata");
        $validation = array(
            array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|valid_email|is_unique[users.email]'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|min_length[5]|max_length[16]'
            ),
            array(
                'field' => 'gender',
                'label' => 'Gender',
                'rules' => 'required'
            ),
            array(
                'field' => 'address',
                'label' => 'Address',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($validation);
        if ($this->form_validation->run()) {

            $formData = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password')),
                'gender' => $this->input->post('gender'),
                'address' => $this->input->post('address'),
                'created_at' => date('Y-m-d H:i:s'),
                'status' => '1',
            );
            $this->db->set($formData)->insert('users');
            if ($this->db->affected_rows() > 0) {
                $this->outputData['responseCode'] = 200;
                $this->outputData['type'] = 'success';
                $this->outputData['msg'] = 'success';
                $this->outputData['url'] = BASE_URL.'home';
                $this->outputData['swal'] = array(
                    'icon' => 'success',
                    'title' => 'Success',
                    'type' => 'success',
                    'html' => 'Register Successfully'
                );
            } else {
                $this->outputData['responseCode'] = 400;
                $this->outputData['type'] = 'error';
                $this->outputData['msg'] = 'Data not Inserted';
            }
        } else {
            $this->outputData['responseCode'] = 400;
            $this->outputData['type'] = 'error';
            // $this->outputData['msg'] = $this->form_validation->error_string();
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

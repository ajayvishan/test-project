<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SubjectsModel extends CI_Model
{
    public $outputData = array('responseCode' => '404', 'type' => 'error', 'msg' => 'Model Default Output');

    public function __destruct()
    {
        exit(json_encode($this->outputData));
    }


    public function insert()
    {
        $validation = array(

            array(
                'field' => 'subject_title',
                'label' => 'Subject Title',
                'rules' => 'required'
            ),
            array(
                'field' => 'subject_name',
                'label' => 'Subject Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'subject_description',
                'label' => 'Subject Description',
                'rules' => 'required'
            ),

        );
        $this->form_validation->set_rules($validation);
        if ($this->form_validation->run()) {

            $formData = array(
                'user_id' => $this->input->post('user_id'),
                'subject_title' => $this->input->post('subject_title'),
                'subject_name	' => $this->input->post('subject_name'),
                'subject_description' => $this->input->post('subject_description'),
                'created_at' => date("H:m:s d:m:y"),
                'status' => '1',
            );

            $this->db->set($formData)->insert('subjects');
            if ($this->db->affected_rows() > 0) {
                $this->outputData['responseCode'] = 200;
                $this->outputData['type'] = 'success';
                $this->outputData['msg'] = 'success';
                $this->outputData['data'] = 'successData';
                $this->outputData['url'] = BASE_URL.'admin/dashboard';
                $this->outputData['swal'] = array(
                    'icon' => 'success',
                    'title' => 'Success',
                    'type' => 'success',
                    'html' => 'Subject Create Successfully'
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

    // show functionality 
    public function select()
    {

        // $res = $this->db->where('status =', '0' )->get('subjects')->result();
        $res = $this->db->where('status !=', '0')->get('subjects')->result();
        if ($this->db->affected_rows() > 0) {
            return $res;
        }
        return false;


        // return $this->outputData;
    }
    
    public function show()
    {
        // $res = $this->db->where('status =', '0' )->get('subjects')->result();
        $res = $this->db->where('id-', $this->input->post("id"))->where('status', "1")->get('subjects')->result();
        if ($this->db->affected_rows() > 0) {
            return $res;
        }
        return false;


        // return $this->outputData;
    }
    // show functionality //


    // update functionality
    public function update()
    {
        $validation = array(

            array(
                'field' => 'subject_title',
                'label' => 'Subject Title',
                'rules' => 'required'
            ),
            array(
                'field' => 'subject_name',
                'label' => 'Subject Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'subject_description',
                'label' => 'Subject Description',
                'rules' => 'required'
            ),

        );
        $this->form_validation->set_rules($validation);
        if ($this->form_validation->run()) {

            $formData = array(
                'user_id' => $this->input->post('user_id'),
                'subject_title' => $this->input->post('subject_title'),
                'subject_name	' => $this->input->post('subject_name'),
                'subject_description' => $this->input->post('subject_description'),
                'updated_at' => date("H:m:s d:m:y"),
            );
            $this->db->set($formData);
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('subjects');
            if ($this->db->affected_rows() > 0) {
                $this->outputData['responseCode'] = 200;
                $this->outputData['type'] = 'success';
                $this->outputData['msg'] = 'success';
                $this->outputData['data'] = 'successData';
                $this->outputData['url'] = BASE_URL.'admin/dashboard';
                $this->outputData['swal'] = array(
                    'icon' => 'success',
                    'title' => 'Success',
                    'type' => 'success',
                    'html' => 'Subject Update Successfully'
                );
            } else {
                $this->outputData['responseCode'] = 400;
                $this->outputData['type'] = 'error';
                $this->outputData['msg'] = 'Data not Update!';
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
    // update functionality//

    // delete functionality
    public function delete($param_1)
    {
        $id = $param_1;
        // $this->db->set(['status' => '0']);
        $this->db->where('id', $id);
        $this->db->delete('subjects');

        if ($this->db->affected_rows() > 0) {
            $this->outputData['responseCode'] = 200;
            $this->outputData['type'] = 'success';
            $this->outputData['msg'] = 'Subject Deleted!';
            $this->outputData['url'] = BASE_URL.'admin/dashboard';
            $this->outputData['swal'] = array(
                'icon' => 'success',
                'title' => 'Success',
                'type' => 'success',
                'html' => 'Subject Delete Successfully'
            );
        } else {
            $this->outputData['responseCode'] = 400;
            $this->outputData['type'] = 'error';
            $this->outputData['msg'] = $this->form_validation->error_string();
        }

        return $this->outputData;
    }
    // delete functionality//
}

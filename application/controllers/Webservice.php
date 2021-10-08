<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Webservice extends CI_Controller
{

	public $outputData = array('responseCode' => '404', 'type' => 'error', 'msg' => 'Default Output');

	function __destruct()
	{
		exit(json_encode($this->outputData));
	}

	function signUp($case, $param1 = null, $param2 = null)
	{

		switch ($case) {
			case 'create':
				$this->load->model('SignUpModel', 'signUp');
				$this->outputData = $this->signUp->insert($param1, $param2);
				break;
		}
	}


	function login($case, $param1 = null, $param2 = null)
	{

		switch ($case) {
			case 'login':
				$this->load->model('LoginModel', 'login');
				$this->outputData = $this->login->login();
				break;
		}
	}



	function subject($case, $param1 = null, $param2 = null)
	{

		switch ($case) {
			case 'create':
				$this->load->model('SubjectsModel', 'subject');
				$this->outputData = $this->subject->insert();
				break;
			case 'update':
				$this->load->model('SubjectsModel', 'subject');
				$this->outputData = $this->subject->update($param1);

				break;

			case 'delete':
				$this->load->model('SubjectsModel', 'subject');
				$this->outputData = $this->subject->delete($param1);
				break;
		}
	}






	// get result

	function get_result($case, $param1 = null, $param2 = null)
	{
		switch ($case) {
			case 'subjects':
				$this->load->model('SubjectsModel', 'subject');
				$res = $this->subject->select();

				if ($res) {
					$this->outputData['responseCode'] = 200;
					$this->outputData['type'] = 'success';
					$this->outputData['msg'] = $this->load->view('admin/rows/subjects', ['res' => $res], true);
				} else {
					$this->outputData['responseCode'] = 400;
					$this->outputData['type'] = 'error';
					$this->outputData['msg'] = "<tr><td colspan='5'> Data Not Found!</td></tr>";
					// $this->outputData['error'] = "";
				}
				break;
			case 'subject-detail':
				$this->load->model('SubjectsModel', 'subject');
				$res = $this->subject->show();

				if ($res) {
					$tr = "";
					foreach($res as $data){
						$tr .= "<tr>";
						$tr .= "<th>Title</th>";
						$tr .= "<td>".$data->subject_title."</td>";
						$tr .= "</tr>";

						$tr .= "<tr>";
						$tr .= "<th>Subject</th>";
						$tr .= "<td>".$data->subject_name."</td>";
						$tr .= "</tr>";

						$tr .= "<tr>";
						$tr .= "<th>Description</th>";
						$tr .= "<td>".$data->subject_description."</td>";
						$tr .= "</tr>";
					}



					$this->outputData['responseCode'] = 200;
					$this->outputData['type'] = 'success';
					$this->outputData['result'] = $tr;
				} else {
					$this->outputData['responseCode'] = 400;
					$this->outputData['type'] = 'error';
					$this->outputData['msg'] = "<tr><td colspan='5'> Data Not Found!</td></tr>";
					// $this->outputData['error'] = "";
				}
				break;
		}
	}
	// get result//
}

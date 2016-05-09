<?php
class Reporting extends CI_Controller
{
	public $reason = '';
    public $message = '';
    public $email = '';
    public $addId = '';

    public function index()
    {
        $addId = $_POST['vehicleID'];
        $data = array('addId' => $addId);
        $this->load->view('pages/reporting',$data);
    }

    public function startReport($vehicleid){

        $addId = $vehicleid;
        $data = array('addId' => $addId);
        $this->load->view('pages/templates/header');
        $this->load->view('pages/reporting',$data);
        $this->load->view('pages/templates/footer');

    }

    public function report()
    {
    	$data['message'] = "";
            $this->load->model('database','',TRUE);
            $this->load->helper(array('form', 'url','security'));
            $this->load->library('form_validation');
            $this->load->library('session');
    

            $this->form_validation->set_rules
            (
                'reason', 
                'Reason',
                'required|callback_default_value',
                array
                (
                    'default_value'      => 'You have not provided %s.'
                )
            );

             $this->form_validation->set_rules
            (
                'message', 
                'Message',
                'required',
                array(
                    'required'    =>  'You have not provided %s'
                )                
            );

             if ($this->form_validation->run() == FALSE)
            {
                //$data['message'] = 'correct these mistakes or <a href="http://localhost/ci/ResetPassword">Reset password</a>';
                $addId = $_POST['addId'];
                $data['message'] = "";
                $data['addId'] = $addId;
                $this->load->view('pages/templates/header');
                $this->load->view('pages/reporting',$data);
                $this->load->view('pages/templates/footer');
            }

            else
            {
              	$this->reason = $_POST['reason'];
                $this->message = $_POST['message'];
                $this->email = $_POST['email'];
                $this->addId = $_POST['addId'];

                $this->db->insert('reportadd', $this);

                $this->load->view('pages/templates/header');
                $this->load->view('pages/reportSuccessful');
                $this->load->view('pages/templates/footer');
            }
       }   

       public function default_value($value){
            if($value == "select1"){
                return false;
            }
            else{
                return true;
            }
       }  
}

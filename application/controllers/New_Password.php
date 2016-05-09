<?php
class New_Password extends CI_Controller {

        public function index()
        {
            
            $this->load->view('pages/templates/header');
            $this->load->view('pages/newPassword');
            $this->load->view('pages/templates/footer');
        }

        public function newp()
        {
            $data['message'] = 'Please correct these errors...';
            $this->load->model('database','',TRUE);
            $this->load->helper(array('form', 'url','security'));
            $this->load->library('form_validation');

            $this->form_validation->set_rules
            (
                'oldPassword',
                'Old Password',
                'required|callback_check_old_password',//
                array
                (
                    'required'      => 'You have not provided %s.',
                    'check_old_password'      => 'You must enter your old password correctly.'
                )
            );

            $this->form_validation->set_rules
            (
                'password',
                'Password',
                'required|min_length[6]',//
                array
                (
                    'required'      => 'You have not provided %s.',
                    'min_length'      => 'Password must be atleast 6 characters long.'
                )
            );


            $this->form_validation->set_rules('confirmPassword', 'Password Confirmation', 'required|matches[password]');

            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('pages/templates/header');
                $this->load->view('pages/newPassword');
                $this->load->view('pages/templates/footer');
            }
            else
            {
                $this->Password = $_POST['password'];

                $this->database->set_new_password(md5($_POST['password']),($this->session->userdata['logged_in']['email']));
                //$this->database->unsetReset($this->session->userdata['logged_in']['email']);
                //added the activity to activity log
                $url = "http://www.autotraders.ga/MyProf/start";
                $activity = "Password Changed";
                $dateTime = date("Y-m-d").", ".date("h:i:sa");
                $email = $this->session->userdata['logged_in']['email'];
                $this->database->log_activity($email,$activity,$url,$dateTime);

                //$this->database->unsetReset($_COOKIE['email']);
                $this->load->view('pages/templates/header');
                $this->load->view('pages/newPasswordSet');
                $this->load->view('pages/templates/footer');
            }
        }

        public function check_old_password($value)
        {
            $this->load->model('database','',TRUE);
            return $this->database->check_old_password(md5($value),($this->session->userdata['logged_in']['email']));
        }
}
?>
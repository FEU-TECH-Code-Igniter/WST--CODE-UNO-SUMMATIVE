<?php 
    class Index extends CI_Controller{
        public function __construct(){
            parent::__construct();
            
            $this->load->database();
            $this->load->helper('url');
            $this->load->library(array('form_validation', 'session'));
            $this->load->model('User_model');
        }

        public function index(){
            
            $data['title'] = "Intro Page";
            $this->load->view('include/header', $data);
            $this->get_users();
            $this->load->view('include/footer.php'); 
        }

        public function register_user(){ 
            $data['title'] = "Registration Page";
            $this->load->view('include/header', $data);
            $this->load->view('register-view', $data);
            $this->load->view('include/footer.php');  
        }
        public function login() {
            if ($this->session->userdata('userid') ){

                $user = $this->User_model->get_userbyID( $this->session->userdata('userid'));
                $data['user'] = $user;
                $data['title'] = 'Welcome | Logged in';
                $this->load->view('include/header.php', $data);
                $this->load->view('user_view', $data);
                $this->load->view('include/footer.php');  
           }

            else {
            $data['title'] = "Login Page";
            $this->load->view('include/header', $data);
            $this->load->view('login-view', $data);
            $this->load->view('include/footer.php');  
            }
        }

        public function login_user() {

            if($this->session->userdata('userid')) {//incase account was logged in from another tab
                redirect('Index/login');
            }

            else {

                $username = $this->input->post('uname');
                $password = $this->input->post('password');
                $user = $this->User_model->get_user($username, $password);

                if($user){
                    $this->session->set_userdata('userid', $user['id']);
                    $this->session->set_userdata('uname', $username);
                    redirect('Index/login');
                }

                else{
                    $this->session->set_flashdata('error', 'Username or password is incorrect.');

                    $data['title'] = "Login Page";
    
                    $this->load->view('include/header', $data);
                    $this->load->view('login-view', $data);
                    $this->load->view('include/footer');
                }
            }
        }
        public function logout_user() {
            $this->session->sess_destroy();
            redirect('Index/login');
        }
        public function get_users(){
            $data['title'] = "User Lists";
            $data['users'] = $this->User_model->get_users();
            $this->load->view('include/header.php');
            $this->load->view('users_view', $data);
            $this->load->view('include/footer.php');   
        }

        public function save_account() {

            $this->form_validation->set_rules('fname','Firstname','required|regex_match[/^[A-Za-z]+$/]',array(
            'required'=> 'You must insert a firstname',
            'regex_match' => '*Only alphabets are accepted within the field first name.'    
        ));

            $this->form_validation->set_rules('mname','Middlename','required|regex_match[/^[A-Za-z]+$/]',array(
            'required'=> '*You must insert a middlename',
            'regex_match' => '*Only alphabets are accepted within the field middle name.'    
        ));

            $this->form_validation->set_rules('lname','Lastname','required|regex_match[/^[A-Za-z]+$/]',array(
            'required'=> '*You must insert a lastname',
            'regex_match' => '*Only alphabets are accepted within the field last name'    
        ));

            $this->form_validation->set_rules('uname', 'Username',  'required|is_unique[tblusers2.uname]|min_length[6]|regex_match[/^[A-Za-z0-9]+$/]',
            array(
            'required' => '*You must insert a username',
            'is_unique' => '*This username is already taken. Please enter another username.',
            'min_length' => '*The length of your username must be at least 6.',
            'regex_match' => 'Only alphanumeric characters are allowed within the field username.'
        ));

            $this->form_validation->set_rules('password', 'Password',  'required|min_length[8]',
            array(
            'required' => '*You must insert a password',
            'min_length' => '*The length of your password must be at least 8.',
        ));

        $this->form_validation->set_rules('cpassword', 'Confirm Password',  'required|matches[password]',
            array(
            'required' => '*You must confirm your password',
            'matches' => '*Your confirm password does not match.'
        ));

        $this->form_validation->set_rules('bday', 'Birthday', 'required',
            array(
            'required' => '*You must insert your birthday',
        ));

        $this->form_validation->set_rules('email', 'Email', 'required|regex_match[/^[A-Za-z0-9+_.-]+@[A-Za-z0-9.-]+.+[A-Za-z]$/]',
            array(
            'required' => '*You must insert an email',
            'regex_match' => '*The required format for email is [text]@[server].[domain]. Example: my@email.com'
        ));

        $this->form_validation->set_rules('connum', 'Contact Number', 'required|regex_match[/^[0-9]+$/]',
            array(
            'required' => '*You must insert a contact number',
            'regex_match' => '*Only numbers are allowed within the field contact number.' 
        ));

        if($this->form_validation->run()){
            $data = array(
                'fname' => $this->input->post('fname'),
                'mname' => $this->input->post('mname'),
                'lname' => $this->input->post('lname'),
                'uname' => $this->input->post('uname'),
                'password' => $this->input->post('password'),
                'bday' => $this->input->post('bday'),
                'email' => $this->input->post('email'),
                'connum' => $this->input->post('connum'),
            );

            $this->User_model->insert_user($data);

            $this->session->set_flashdata('success', 'User registered!');
                redirect('Index');
        }
        else {
            $this->session->set_flashdata('errorregister', validation_errors());
            $data['title'] = "Registration";
            $this->load->view('include/header', $data);
            $this->load->view('register-view');
            $this->load->view('include/footer');

        }
        }
        public function reset_password() {

            if($this->session->userdata('userid') == null) {//incase account is logged out from another tab
                redirect('Index/login');
            }

            $user = $this->User_model->get_userbyID( $this->session->userdata('userid'));

            $this->form_validation->set_rules('currentpword', 'Current Password',  'required|callback_password_match',
            array(
            'required' => '*You must insert a new password',
        ));
            $this->form_validation->set_rules('newpword', 'New Password',  'required|min_length[8]',
            array(
            'required' => '*You must insert a new password',
            'min_length' => '*The length of your new password must be at least 8.',
        ));
            $this->form_validation->set_rules('conpword', 'Confirm Password',  'required|matches[newpword]',
            array(
            'required' => '*You must confirm your password',
            'matches' => '*Your confirm new password does not match.'
        ));

        if ($this->form_validation->run()) {
            $this->User_model->reset_password($this->session->userdata('userid'),$this->input->post('currentpword'), $this->input->post('newpword') );

            $this->session->set_flashdata('successreset', 'You have succesfully changed your password');
            $this->session->unset_userdata('errorreset');
            redirect(base_url('Index/login'));
        }

        else {
            $this->session->set_flashdata('errorreset', validation_errors());
            $data['title'] = "Welcome | Login";
            $data['user'] = $user;
            $this->load->view('include/header', $data);
            $this->load->view('user_view', $data);
            $this->load->view('include/footer');
            }
        }

        public function password_match() {
            $user = $this->User_model->get_userbyID( $this->session->userdata('userid'));

            if($user['password'] == $this->input->post('currentpword')) {
                return true;
            }

            else 
            {
                $this->form_validation->set_message('password_match', '*Your inputted current password is incorrect.');
                return false;
            }

        }
    }

?>
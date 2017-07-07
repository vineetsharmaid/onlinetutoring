<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{    
    public function __construct()
    {
        parent::__construct();
        $this->load->model( array( 'home_model', 'email_model', 'common_model' ) );
        $this->load->library('commonlib');
        // used to set cookie for remember me
        $this->load->helper('cookie');
        $this->user_id = $this->session->userdata('user_id');

    }

    public function index(){
      //die('44');
      $this->load->view('home_header');
      $this->load->view('home');
      $this->load->view('home_footer');

      // echo "<pre>";
      // print_r( $this->session );
      // echo "</pre>";

      // echo "<pre>";
      // print_r( $this->input->cookie() );
      // echo "</pre>";
      
    }

    public function tutions()
    {
      $this->load->view('tution_header');
      $this->load->view('tution');
      $this->load->view('tution_footer');      
    }

    public function search_tutor()
    {
      $data['page_title'] = 'Search Tutor';
      $this->load->view('tution_header', $data);
      $this->load->view('search_tutor');
      $this->load->view('tution_footer');      
    }

    public function about_us(){

      $data['page_title'] = 'About Us';
      $this->load->view('home_header');
      $this->load->view('about_us');
      $this->load->view('tution_footer');
    
    }
    public function our_team(){

      $data['page_title'] = 'Our Team';
      $this->load->view('home_header');
      $this->load->view('our_team');
      $this->load->view('tution_footer');
    
    }
    
    /* Subscribe For NewLetter */

    public function get_subscribe_newsletter(){
      
      // get number of users exists with this email
      $user_count = $this->db->get_where( 'newsletter_subscription', array( 'email' => $_POST['email'] ) )->num_rows();
      
      if($user_count > 0){

        echo "User Already Subscribed";
        
      }else{
          $data = array(
            'email' => $_POST['email'],
            'created_at' => date('Y-m-d h:i:s') 
          );

          $this->db->insert( 'newsletter_subscription', $data);
          echo "User Subscribed successfully";
      }
      
      }



    /* function for login of student and tutor */

    public function login() {

      // recieve data from angular
      $user_data = json_decode(file_get_contents('php://input'),true);

      // if data is not recieved 
      if (empty($user_data) && empty( $this->user_id )) {

        
        // REMEMBER ME CHECK STARTS
        // get cookie value stored for remembered user
        $cookie = $this->input->cookie('pokaaforeva',true);

        if( !empty( $cookie ) ) {
          
          // get user information for whom cookie is stored
          $user = $this->db->get_where( 'users', array( 'rememberMe' => $cookie ) )->row();
          
          if ( !empty( $user ) ) { // Verified
           
            // set session of logged in user
            $this->session->set_userdata( array( 'user_id' => $user->user_id, 'role' => $user->role ) );

            // set new for the user
            $this->__set_login_cookie( $user->user_id );

            $user_type = $user->role == 1 ? 'student' : 'tutor';
            $user_type = $user->role == 3 ? 'admin' : $user_type;

            redirect( $user_type, 'refresh' );

          }

        }
        else // send to login page
        {
          $this->load->view('login/login_header');
          $this->load->view('login/login');
          $this->load->view('login/login_footer');
        }
        // REMEMBER ME CHECK ENDS
      
      } else {
        // check if is log in
        $logged_in = $this->commonlib->check_loggedin( $return = true );

        // if not logged in earlier
        if ( $logged_in == false ) {
            
          // LOGIN CHECK STARTS

          $email        = $user_data['email'];
          $password     = $user_data['password'];
          
          if ( isset( $user_data['rememberMe'] ) ) {
            
            $rememberMe   = $user_data['rememberMe'];
          }
          
          // get user detail for enetered email
          $user       = $this->db->get_where( 'users', array( 'email' => $email ) )->row();
                    
          // verify $password
          if (password_verify($password, $user->password)) { // Verified
            
            // set session of logged in user
            $this->session->set_userdata( array( 'user_id' => $user->user_id, 'role' => $user->role ) );

            // set cookie to keep user logged in if opted to remember
            if ( !empty( $user_data['rememberMe'] ) && $rememberMe == 1 ) {

              $this->__set_login_cookie( $user->user_id );
            }

            $user_type = $user->role == 1 ? 'student' : 'tutor';
            $user_type = $user->role == 3 ? 'admin' : $user_type;
            
            echo json_encode( array( 'status' => 1, 'redirect' => base_url().$user_type ) );
          }
          else // password doesn't matches  
          {
            echo json_encode( false );
          }
        } else {
          
          $this->commonlib->check_loggedin();          
        }
        
      }

    }

    public function send_chat_help(){
      
      if(isset($_POST['name']) && isset($_POST['email'])){
        $this->db->insert('chatbox_help',$_POST);
        if ($this->db->trans_status() === FALSE) { // error in query
          echo "Unable to send email.";
        } else { // query executed successfully
           /* Send Email to Chat User */
                $config       = Array(
                    'mailtype' => 'html'
                );
                $data         = array(
                    'name' => $_POST['name'],
                    'email' => $_POST['email'],
                    'phone' => $_POST['phone'],
                    'message' => $_POST['message']
                );
                $data['logo'] = base_url(). 'assets/img/logo.png';
                $data['link'] = base_url();
                $chatboxform = $this->load->view('emails/chatbox_help', $data, TRUE);
                $this->email->initialize($config);
                $this->email->from('team@rostrum.com', 'Rostrum');
                $this->email->to('rostrum123@yopmail.com');
                $this->email->subject('Leave us a message');
                $this->email->message($chatboxform);
                $this->email->send();

          echo "Email Sent Successfully";
        }
      }
    
    }

    public function send_consultation(){

      if(isset($_POST['name']) && isset($_POST['Email'])){

        if(empty($_POST['role'])){
          $_POST['role'] = 'IB courses';
        }
        if(empty($_POST['i_am_a'])){
          $_POST['i_am_a'] = 'Student'; 
        }  
        $this->db->insert('free_consultation',$_POST);
        if ($this->db->trans_status() === FALSE) { // error in query
          echo "Unable to complete request.";
        } else { // query executed successfully
           /* Send Email to Chat User */
                $config   = Array( 'mailtype' => 'html' );
                $data     = array(
                                'name'          => $_POST['name'],
                                'surname'       => $_POST['surname'],
                                'email'         => $_POST['Email'],
                                'country_code'  => $_POST['country_code'],
                                'phone'         => $_POST['phone'],
                                'role'          => $_POST['role'],
                                'i_am_a'        => $_POST['i_am_a'],
                                'country'       => $_POST['country']
                            );
                $data['logo'] = base_url(). 'assets/img/logo.png';
                $data['link'] = base_url();
                $chatboxform = $this->load->view('emails/consultation_form', $data, TRUE);
                $this->email->initialize($config);
                $this->email->from('team@rostrum.com', 'Rostrum');
                $this->email->to('rostrum123@yopmail.com');
                $this->email->subject('Consultation Form');
                $this->email->message($chatboxform);
                $this->email->send();

          echo "Email Sent Successfully";
        }
      }
    }

    public function forget_password()
    {
      $data = json_decode(file_get_contents('php://input'),true);

      // Generating Password
      $chars = "abcdefghijklmnopqrstuvwxyz0123456789!@#$%&_";
      $password = substr( str_shuffle( $chars ), 0, 8 );

      // create hash and salt of password
      $password_hash  = password_hash($password, PASSWORD_BCRYPT);

      $this->db->where( array( 'email' => $data['email'] ) );
      $this->db->update( 'users', array( 'password' => $password_hash ) );

      // send new generated password on user's email
      $status = $this->__mail_forget_password( $to = $data['email'], $from = '', $password );

      if ( $status === 1 ) {
        
        echo json_encode( array( 'status' => 1, 'data' => 'New generated password sent to email.' ) );
      } else {
        
        echo json_encode( array( 'status' => 0, 'data' => 'Unable to generate new password.' ) );
      }
      
    }


    public function logout()
    {
      
      // delete saved session of user
      $this->session->unset_userdata( array( 'user_id', 'role' ) );
      // delete saved cookies of user
      delete_cookie("pokaaforeva");

      redirect( '/login', 'refresh' );

    }



    /* function for registration of student */

    public function register()
    {
      $data = json_decode(file_get_contents('php://input'),true);

      if (empty($data)) {
        
        $this->load->view('login/login_header');
        $this->load->view('login/student_register');
        $this->load->view('login/login_footer'); 
      
      } else {
        
        // create hash and salt of password
        $password  = password_hash($data['password'], PASSWORD_BCRYPT);

        $user_data =  array(  'firstname' => $data['firstname'],
                              'lastname'  => $data['lastname'],
                              'email'     => $data['email'],
                              'password'  => $password,
                              'country'   => $data['country']['country_id'],
                              'state'     => $data['state']['state_id'],
                              'city'      => $data['city']['city_id'],
                              'phone'     => $data['phone'],
                              'role'      => $data['role'],
                      );

        $user_data['status'] = $data['role'] == 1 ? 1 : 0;

        // insert user data into database
        $reg_status = $this->home_model->register( $user_data, $user_type = 1 );
           
        $user_id = $this->db->insert_id();

        // unique registration id of user
        $reg_id = $data['role'] == 1 ? STUDENT_REG.$user_id : TUTOR_REG.$user_id;
        $notifiation_for = $data['role'] == 1 ? 'student' : 'tutor';

        $this->db->where( array( 'user_id' => $user_id ) );
        $this->db->update( 'users', array( 'reg_id' => $reg_id ) );
        
        /* Update Notifications */
        $array = array('notification_for' => $notifiation_for, 'notification_type' => 'register');

        $this->db->where($array);
        $this->db->set('count', 'count+1', FALSE);
        $this->db->set('created_at', date('Y-m-d h:i:s'));
        $this->db->update('notifications');

        if ( $reg_status == true ) {
          
          // set session of logged in user
          $this->session->set_userdata( array( 'user_id' => $user_id, 'role' => $data['role'] ) );

          $user_type = $data['role'] == 1 ? 'student' : 'tutor';
          
              /* Send Email to Registered User */
                $config       = Array(
                    'mailtype' => 'html'
                );
                $data         = array(
                    'firstname' => $data['firstname'],
                    'email' => $data['email']
                );
                $data['logo'] = base_url(). 'assets/img/logo.png';
                $data['link'] = base_url();
                $registeredform = $this->load->view('emails/registeredform', $data, TRUE);
                $this->email->initialize($config);
                $this->email->from('team@rostrum.com', 'Rostrum');
                $list = array(
                    'rostrum123@yopmail.com',
                    $data['email']
                );
                $this->email->to($list);
                $this->email->subject('Welcome to Rostrum');
                $this->email->message($registeredform);
                $this->email->send();

          echo json_encode( array( 'status' => 1, 'data' => base_url().$user_type ) );
        } else {

          echo json_encode( array( 'status' => 0, 'data' => 'Unable to register' ) );
        }
        
      }
    }


    /* function for registration of tutor */

    public function tutor_register() {

      $data = json_decode(file_get_contents('php://input'),true);

      if (empty($data)) {
        
        $this->load->view('login/login_header');
        $this->load->view('tutor_register');
        $this->load->view('login/login_footer'); 
      
      }else{

        // create hash and salt of password
        $password  = password_hash($data['password'], PASSWORD_BCRYPT);
        
        $user_data =  array(  'firstname' => $data['firstname'],
                              'lastname'  => $data['lastname'],
                              'email'     => $data['email'],
                              'password'  => $password,
                              'city'      => $data['city'],
                              'phone'     => $data['phone'],
                              'role'      => 1, // student
                      );

        // register student
        $status = $this->home_model->register( $user_data, $user_type = 1 );

        echo json_encode( $status );
        
      }
    }

    

    /* check whether email is unique in users table */

    public function unique_email() {
      $user_data = json_decode(file_get_contents('php://input'),true);

      // get number of users exists with this email
      $user_count = $this->db->get_where( 'users', array( 'email' => $user_data['email'] ) )->num_rows();

      echo json_encode( $user_count );

    }

    

    /* set cookie to keep user logged in */

    function __set_login_cookie($user_id) {

      // get user by user_id or remember key
      $user = $this->db->get( 'users', array( 'user_id' => $user_id ) )->row();

      // generate random token
      $token = rand( 111111, 555555 );

      // create string by combining token and password_hash
      $cookie = $token.'-'.$user->password.'-'.$token;

      // create hash and salt to be saved as cookie
      $cookie_hash   = password_hash($cookie, PASSWORD_BCRYPT);
      
      $this->db->where( array( 'user_id' => $user->user_id ) );
      $this->db->update( 'users', array( 'rememberMe' => $cookie_hash ) );

      $setcookie   = array(
                        'name'   => 'pokaaforeva',
                        'value'  => $cookie_hash,
                        'expire' => 86500,
                        'secure' => false
                  );

      $this->input->set_cookie($setcookie);
    }

  function __mail_forget_password( $to, $from='', $password )
  {
    $user = $this->home_model->get_user( $where = array( 'email' => $to ) );

    $message = "Your new password is ".$password;

    return $this->email_model->send_email( $to, $from, $subject="Forgot Password", $message );

  }

  public function get_tutors_list()
  {
    $this->db->select( 'users.*, usermeta.*' );
    $this->db->from( 'users' );
    $this->db->join( 'usermeta', 'users.user_id = usermeta.user_id', 'left' );
    $this->db->where( array( 'users.status' => 1, 'users.role' => 2 ) );
    $tutors = $this->db->get()->result();

    foreach ($tutors as &$tutor) {
      
      if ( empty( $tutor->profile_img ) ) {
        
        $tutor->profile_img = $tutor->gender == 1 ? 'female-default-avatar.jpg' : 'male-default-avatar.png';
      }
    }

    if ($this->db->trans_status() === FALSE) { // error in query
      
      $response = array( 'status' => 0, 'data' => array() );
    } else { // query executed successfully

      $response = array( 'status' => 1, 'data' => $tutors );
    }
    
    echo json_encode( $response );
  }

  public function get_tutor_details($tutor_id)
  {

    $tutor = $this->common_model->get_tutor_details( $tutor_id );

    echo json_encode( $tutor ); 
  }

  public function get_subject_groups()
  {
    $groups = $this->common_model->get_subject_groups();
    
    echo json_encode( $groups );
  }

  public function get_subjects($group_id='')
  {
    $group_id = $group_id == 'undefined' ? '' : $group_id;
    
    $result = $this->common_model->get_subjects($group_id);
          
    echo json_encode( $result );

  }
  public function get_tutors_subjects($subjectid){

      if ( !empty( $subjectid ) ) {
        
        $result = $this->common_model->get_alltutors_subjects($subjectid);
        echo json_encode( $result );
      } else {
        $this->get_tutors_list();
      }
      


  }

  public function save_requirement($value='')
  {
    $post_data = json_decode( file_get_contents( "php://input" ), true );
    
    $result    = $this->home_model->save_requirements( $post_data );
    
    if ( $result['status'] == 1 ) {
      /* Send Email to Chat User */
      $config       = Array(
          'mailtype' => 'html'
      );
      $data = array(
          'firstname' => substr($post_data['fullName'], 0, strpos($post_data['fullName'], ' ')),
          'email'     => $post_data['email'],
      );

      $data['logo'] = base_url(). 'assets/img/logo.png';
      $data['link'] = base_url();
      
      $registeredform = $this->load->view('emails/registeredform', $data, TRUE);
      $this->email->initialize($config);
      $this->email->from('team@rostrum.com', 'Rostrum');
      $this->email->to($post_data['email']);
      $this->email->subject('Welcome to Rostrum');
      $this->email->message($registeredform);
      $this->email->send();

    }

    echo json_encode( $result );
  }

  public function get_countries()
  {
    $countries = $this->common_model->get_countries();

    echo json_encode( $countries );
  }

  public function get_states($country_id)
  {
    $states = $this->common_model->get_states($country_id);

    echo json_encode( $states );
  }

  public function get_cities($state_id)
  {
    $cities = $this->common_model->get_cities($state_id);

    echo json_encode( $cities );
  }
 
}



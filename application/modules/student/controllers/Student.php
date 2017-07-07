<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller
{    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model( array( 'common_model', 'student_model' ) );

        
        $this->user_id  = $this->session->userdata('user_id');
        $this->role     = $this->session->userdata('role');

        if ( empty( $this->user_id ) || $this->role != 1 )
        {
          redirect( 'login', 'refresh' );
        }
        
    }


    public function index(){

      $data['user'] = $this->common_model->get_user();

      $this->load->view('student_header', $data);
      $this->load->view('student_dashboard');
      $this->load->view('student_footer');
      
    }

    public function dashboard()
    {
      $user = $this->common_model->get_user();
      
      echo json_encode( $user );

    }

    public function profile_img()
    {

      $old_profile_img = $this->common_model->get_field_by_name( $table = 'usermeta', $field='profile_img', $where = array( 'user_id' => $this->user_id ) );

      // path of profile images folder
      $path = './uploads/profile_imgs';

      // delete previous profile image
      unlink($path.'/'.$old_profile_img);

      // call to upload image function
      $upload = $this->commonlib->upload_uni( $path, $types = '*', $file_name = 'profile_image', $overide_name = 'profile_img_'.strtotime('now') );

      // if there was error while uploading
      if ( array_key_exists('error', $upload) ) {
        
        // return error response 
        $response = array( 'status' => 0, 'data' => $upload );
        echo json_encode( $response );
      } else {
        
        
        // resize profile image
        // $pro_img_response = $this->commonlib->create_pro_image( $source = $path.'/'.$upload['upload_data']['file_name'] );
        
        // create thumbnail of profile image
        // $thumb_response   = $this->commonlib->create_thumb( $source = './uploads/profile_imgs/'.$upload['upload_data']['file_name'] );

        // $this->db->where( array( 'user_id' => $this->user_id ) );
        // $this->db->update( 'usermeta', array( 'profile_img' => $upload['upload_data']['file_name'] ) );

        $result = $this->common_model->add_data( 
            $table='usermeta', 
            $data = array( 'profile_img' => $upload['upload_data']['file_name'], 'user_id' => $this->user_id ), 
            $where = array( 'user_id' => $this->user_id ) 
        );

        if ( $result ) {
          
          $response = array( 'status' => 1, 'data' => 'Profile updated successfully' );
        } else {

          $response = array( 'status' => 0, 'data' => 'Unable to update profile.' );
        }

        
        echo json_encode( $response );
      }
    
    }

    public function save_requirement()
    {
      
      $tution_requirements = json_decode(file_get_contents('php://input'),true);

      // insert student id in array
      $tution_requirements['student_id']      = $this->user_id;
      $tution_requirements['specific_tutor']  = $tution_requirements['specific_tutor']['user_id'];
      
      $this->db->insert( 'tution_requirements', $tution_requirements );

      // if information added successfully
      if ($this->db->trans_status() === FALSE) { // error in query
        
        $response = array( 'status' => 0, 'data' => 'Unable to post Requirements.' );
        echo json_encode( $response );
      } else {

        $response = array( 'status' => 1, 'data' => 'Requirements posted successfully' );
        /* Update Notifications */
        $array = array('notification_for' => 'admin', 'notification_type' => 'requirement');

        $this->db->where($array);
        $this->db->set('count', 'count+1', FALSE);
        $this->db->set('created_at', date('Y-m-d h:i:s'));
        $this->db->update('notifications');
        echo json_encode( $response );
      }

    }

    public function get_total_notification_count()
    {
        $this->db->select('*');
        $this->db->from('notification_assigned_class' );    
        $where = array('notification_for' => $this->user_id,'count >' => 0,'notification_type' => 'assigned_tutor');
        $this->db->where($where);
        $query = $this->db->get();
        $result = $query->result_array();
        $count = $query->num_rows();
        echo json_encode( array('result' => $result,'count' => $count ));
    }
    public function get_total_class_notification_count()
    {
        $this->db->select('*');
        $this->db->from('notification_assigned_class' );    
        $where = array('notification_for' => $this->user_id,'count >' => 0,'notification_type' => 'schedule_class');
        $this->db->where($where);
        $query = $this->db->get();
        $result = $query->result_array();
        $count = $query->num_rows();
        echo json_encode( array('result' => $result,'count' => $count ));
    }
    public function clear_notification()
    {   
        $data = json_decode(file_get_contents('php://input'),true);
        $this->db->where( array( 'notification_for' => $this->user_id,'notification_type' => $data['notification_type']) );
        $this->db->delete( 'notification_assigned_class');
        if ($this->db->trans_status() === FALSE) { // error in query
        
          $response = array( 'status' => 0, 'data' => 'Notification Not Cleared Successfully' );
          echo json_encode( $response );
        } else {
          $response = array( 'status' => 1, 'data' => 'Notification Cleared Successfully' );
          echo json_encode( $response );  
        }
    }

    public function checkoldpassword()
    {
      $data = json_decode(file_get_contents('php://input'),true);
      $check_pass =  $this->db->get_where('users', array('user_id' => $this->user_id  ))->row_array();
      $user_password = $check_pass['password'];
      if (password_verify($data['pass'], $user_password)) {
          echo "Matched";
      }else{
          echo "Not matched";
      }
      
    }

    public function updatenewpass(){
      
      $data = json_decode(file_get_contents('php://input'),true);
      $password_hash  = password_hash($data['new_password'], PASSWORD_BCRYPT);
      $this->db->where( array( 'user_id' => $this->user_id ) );
      $this->db->update( 'users', array( 'password' => $password_hash ) );
      if ($this->db->trans_status() === FALSE) { // error in query
        
          $response = array( 'status' => 0, 'data' => 'Password not Updated' );
          echo json_encode( $response );
        } else {
          $response = array( 'status' => 1, 'data' => 'Password Updated Successfully' );
          echo json_encode( $response );  
        }
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

    public function get_tutors_list()
    {
      $tutors = $this->common_model->get_users_list( 2, 1 );

      echo json_encode( $tutors );
    }

    public function get_student_feed($status='')
    {
      $feed = $this->student_model->get_student_feed($status);

      echo json_encode( $feed );
    }

    public function get_feed_details($feed_id)
    {
      $feed = $this->student_model->get_feed_details($feed_id);
      
      echo json_encode( $feed );
    }
    public function get_schedule_events()
    {
      $events = $this->common_model->get_schedule_events($this->user_id, $readOnly = true);

      echo json_encode( $events ); 

    }

    public function get_user_related_tutions()
    {
      $tutions = $this->common_model->get_user_related_tutions($this->user_id);

      echo json_encode( $tutions );
      
    }

    public function add_schedule_event()
    {
      $post_data = json_decode( file_get_contents( 'php://input' ), true );

      $event_data = array( 
                          'scheduled_for'   => $post_data['tutionData']['student_id'],
                          'scheduled_by'    => $this->user_id,
                          'description'     => $post_data['description'],
                          'tution_id'       => $post_data['tutionData']['tr_id'],
                          'class'           => 'bg-success-lighter',
                          'title'           => $post_data['title'],
                          // converted iso 8061 datetime format to Unix timstamp
                          'start'           => date( "U",strtotime($post_data['start']) ),
                          'end'             => date( "U",strtotime($post_data['end']) ),
                          
                    );

      $event = $this->common_model->add_data('schedules', $event_data, $where = array('schedule_id' => 'nil'));

    }

    public function delete_scheduled_event()
    {
      $schedule_id = json_decode( file_get_contents( 'php://input' ), true );

      $event = $this->common_model->delete_data('schedules', $where = array('schedule_id' => $schedule_id) );

      echo json_encode($event);
    }

    public function update_event_status()
    {
      
       $post_data = json_decode( file_get_contents( 'php://input' ), true );
       $this->db->select('*');
       $this->db->from('schedules' );    
       $where = array('schedule_id' => $post_data['schedule_id']);
       $this->db->where($where);
       $query = $this->db->get();
       $result = $query->result_array();

      if($post_data['schedule_status'] == '2'){
        $user_count = $this->db->get_where( 'notification_assigned_class', array( 'notification_for' => $result[0]['scheduled_by'], 'tution_id' => $post_data['schedule_id'],'notification_type' => 'decline_class' ) )->num_rows();
        if($user_count > 0)
        {
        }else{
          $student_data = array(
                'notification_for' => $result[0]['scheduled_by'],
                'notification_type' => 'decline_class',
                'tution_id' => $post_data['schedule_id'],
                'count'    => $user_count +1,
                'created_at' => date('Y-m-d h:i:s')

              );
           $this->db->insert('notification_assigned_class',$student_data);
        }         
      }
      //print_r($post_data);die;
      $update = array( 'schedule_status' => $post_data['schedule_status'] );

      // update status of schedule to decline
      $event = $this->common_model->add_data('schedules', $update, $where = array('schedule_id' => $post_data['schedule_id']) );

      echo json_encode($event);
    }

    public function save_stripe_customer()
    {
      // include stripe library
      require_once(APPPATH.'libraries/Stripe/init.php');

      // initialize stripe
      \Stripe\Stripe::setApiKey(STRIPE_API_KEY);

      // get token data created for card details by stripe
      $token_data = json_decode( file_get_contents( 'php://input' ), true );

      // create customer in stripe
      $stripe_cust_id = $this->__create_stripe_customer($token_data);
      
      if ( !empty($stripe_cust_id) ) {
        
        // data to be updated
        $update_data = array( 'stripe_customer_id' => $stripe_cust_id, 
                              'card_ending' => $token_data['card']['last4'],
                       );
        
        // where data has to be updated
        $where = array( 'user_id' => $this->user_id );
        
        // execute update query
        $this->common_model->add_data( 'usermeta', $update_data, $where );

        // if information added successfully
        if ($this->db->trans_status() === FALSE) { // error in query
          
          $response = array( 'status' => 0, 'data' => 'Unable to save details.' );
        } else {

          $response = array( 'status' => 1, 'data' => 'Details saved successfully' );
        }

      } else { // when customer id is not generated
          $response = array( 'status' => 0, 'data' => 'Unable to save details!' );
      }
      
      echo json_encode( $response );
      
    }

    // creates customer in stripe and returns customer id
    function __create_stripe_customer($token_data)
    {
      // get current user details
      $current_user = $this->db->get_where( 'users', array( 'user_id' => $this->user_id ) )->row();

      $user_fullname = $current_user->firstname." ".$current_user->lastname;

      // Create a Customer to use auto payments later
      $customer = \Stripe\Customer::create(array(
        "email"       => $current_user->email,
        "description" => "Student - ".$user_fullname,
        "source"      => $token_data['id'],
      ));

      return $customer->id;
    }
  
    public function check_saved_card()
    { 
      $this->db->select( 'stripe_customer_id, card_ending' );
      $this->db->where( array( 'user_id' => $this->user_id ) );
      $card_details = $this->db->get( 'usermeta' )->row();

      // if information added successfully
      if ($this->db->trans_status() === FALSE) { // error in query
        
        $response = array( 'status' => 0, 'data' => array() );
      } else {
        if ( !empty( $card_details->stripe_customer_id ) ) {
          
          $response = array( 'status' => 1, 'data' => $card_details );
        } else {
          
          $response = array( 'status' => 0, 'data' => array() );
        }
      }

      echo json_encode( $response );

    }

    /*Get All Payments & Transactions*/
   
    public function get_requested_transactions(){



      $where = array();

    if ( $transaction_id != '' ) {
      $where = array( 'transactions.transaction_id' => $transaction_id );
    }
    $this->db->select( 'schedules.*, 
      student.firstname as student_fname, student.lastname as student_lname, 
      tutor.firstname as tutor_fname, tutor.lastname as tutor_lname, 
      tution_requirements.title as tution_title, transactions.class_duration, 
      transactions.transaction_amount, transactions.transaction_response, 
      transactions.payment_at, transactions.transaction_id' 
    );
    $this->db->from( 'schedules' );
    $this->db->join( 'users as student', 'student.user_id = schedules.scheduled_for' );
    $this->db->join( 'usermeta as student_meta', 'student_meta.user_id = schedules.scheduled_for', 'left' );
    $this->db->join( 'users as tutor', 'tutor.user_id = schedules.scheduled_by' );
    $this->db->join( 'usermeta as tutor_meta', 'tutor_meta.user_id = schedules.scheduled_by', 'left' );
    $this->db->join( 'tution_requirements', 'tution_requirements.tr_id = schedules.tution_id' );
    $this->db->join( 'transactions', 'transactions.schedule_id = schedules.schedule_id' );
    $this->db->where( array('schedules.payment_status' => PAYMENT_RECIEVED,'schedules.scheduled_for' => $this->user_id) );
    $this->db->where('MONTH(transactions.payment_at)', date('m'));

    $this->db->where( $where );
      

    if ( $transaction_id != '' ) {
      
      $transactions = $this->db->get()->row();
      $transactions->payment_at = date( 'm-d-Y', strtotime( $transactions->payment_at ) );
    } else {

      $transactions = $this->db->get()->result();
      foreach ($transactions as $transaction) {
        
        $transaction->payment_at = date( 'm-d-Y', strtotime( $transaction->payment_at ) );
      }
    }

    echo json_encode($transactions);
    }




}

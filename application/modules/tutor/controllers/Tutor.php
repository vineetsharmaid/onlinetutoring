<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tutor extends CI_Controller
{    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model( array( 'common_model', 'tutor_model' ) );
        $this->load->library('commonlib');
        $this->user_id  = $this->session->userdata('user_id');
        $this->role     = $this->session->userdata('role');

        if ( empty( $this->user_id ) || $this->role != 2 )
        {
          redirect( 'login', 'refresh' );
        }
        
    }


    public function index(){

    	$data['user'] = $this->common_model->get_user();

      $this->load->view('tutor_header', $data);
      $this->load->view('tutor_dashboard');
      $this->load->view('tutor_footer');
    }

    public function dashboard()
    {
      $user = $this->common_model->get_user();
      $user->dob_iso = date('c', strtotime($user->dob));
      echo json_encode( $user );

    }

    public function get_diploma_details()
    {
      $data = $this->common_model->get_diploma_details();
      
      echo json_encode( $data );
    }

    public function get_further_information()
    {
      $data = $this->common_model->get_further_information();

      echo json_encode( $data );
    }

    public function profile_img()
    {

      $old_profile_img = $this->common_model->get_field_by_name( $table = 'usermeta', $field='profile_img', $where = array( 'user_id' => $this->user_id ) );

      // path of profile images folder
      $path = './uploads/profile_imgs';

      if ( !empty( $old_profile_img ) ) {
        
        // delete previous profile image
        unlink($path.'/'.$old_profile_img);
      }

      // call to upload image function
      $upload = $this->commonlib->upload_uni( $path, $types = '*', $file_name = 'profile_image', $overide_name = 'profile_img_'.strtotime('now') );

      // if there was error while uploading
      if ( array_key_exists('error', $upload) ) {
        
        // return error response 
        $response = array( 'status' => 0, 'data' => $upload );
        echo json_encode( $response );
      } else {
        
        $this->common_model->profile_img( $upload['upload_data']['file_name'], $old_profile_img );
        // $this->db->where( array( 'user_id' => $this->user_id ) );
        // $this->db->update( 'usermeta', array( 'profile_img' => $upload['upload_data']['file_name'] ) );

        // success response
        $response = array( 'status' => 1, 'data' => $upload );
        echo json_encode( $response );
      }
    
    }

    public function cv_upload()
    {

      $old_resume = $this->common_model->get_field_by_name( $table = 'usermeta', $field='resume', $where = array( 'user_id' => $this->user_id ) );

      // path of tutor resume folder
      $path = './uploads/resumes';
      
      if ( !empty( $old_resume ) ) {
        
        // delete previous resume
        unlink($path.'/'.$old_resume);
      }

      // call to upload image function
      $upload = $this->commonlib->upload_uni( $path, $types = '*', $file_name = 'file', $overide_name = 'resume'.strtotime('now') );

      // if there was error while uploading
      if ( array_key_exists('error', $upload) ) {
        
        // return error response 
        $response = array( 'status' => 0, 'data' => $upload );
        echo json_encode( $response );
      } else {
        
        $this->db->where( array( 'user_id' => $this->user_id ) );
        $this->db->update( 'usermeta', array( 'resume' => $upload['upload_data']['file_name'] ) );

        // success response
        $response = array( 'status' => 1, 'data' => $upload );
        echo json_encode( $response );
      }
    }

    public function save_tutor_profile()
    {

      $tutor_data = json_decode(file_get_contents('php://input'),true);

      // convert ISO-8061 date format to Y-m-d
      $dob = date('Y-m-d', strtotime($tutor_data['dob']));

      $user       = array(  'firstname' => $tutor_data['firstname'], 
                            'lastname'  => $tutor_data['lastname'], 
                            'phone'     => $tutor_data['phone']
                    );

      $user_meta  = array(  
                            'user_id'         => $this->user_id,
                            'gender'          => $tutor_data['gender'],
                            'dob'             => $dob,
                            'secondary_email' => $tutor_data['secondary_email'], 
                            'secondary_phone' => $tutor_data['secondary_phone'], 
                            'how_abt_rostrum' => $tutor_data['how_abt_rostrum'] 
                    );

      // insert or update user data
      $this->common_model->add_data($table = 'users', $data = $user, $where = array( 'user_id' => $this->user_id ) );

      // insert or update usermeta data
      $result = $this->common_model->add_data($table = 'usermeta', $data = $user_meta, $where = array( 'user_id' => $this->user_id ) );

      // if usermeta information updated successfully
      if ( $result == true ) {
        
        $response = array( 'status' => 1, 'data' => 'Information updated successfully.' );
        echo json_encode( $response );
      } else {

        $response = array( 'status' => 0, 'data' => 'Unable to update Information.' );
        echo json_encode( $response );
      }

    }


    public function save_diploma_details()
    {
      $diploma_details1 = json_decode( file_get_contents('php://input'), true );

      $ib_data      = $diploma_details1['diploma_details'];
      $ib_subjects  = $diploma_details1['ib_subjects'];

      
      $yog_arr = explode( '-', $ib_data['ib_yog'] );

      if ( count( $yog_arr ) > 1 ) {
        
        // convert ISO-8061 date format to Y-m-d
        $yog = date('Y-m-d', strtotime($ib_data['ib_yog']));
      } else {

        $yog = $yog_arr[0].'-01-01';
      }

      $ib_data['ib_yog']      = $yog;
      $ib_data['tutor_id']    = $this->user_id;
      $ib_data['ib_country']  = $ib_data['ib_country']['country_id'];

      // insert or update ib_details data
      $result = $this->common_model->add_data($table = 'tutor_details', $data = $ib_data, $where = array( 'tutor_id' => $this->user_id ) );


      // if diploma details information updated successfully
      if ( $result == true ) {
        
        foreach ($ib_subjects as $subject) {
            
            $subject['tutor_id'] = $this->user_id;

            // $result = $this->common_model->add_data($table = 'tutor_subjects', $data = $subject, $where = array( 'tutor_subject_id' => $subject['tutor_subject_id'] ) );

            if ( empty( $subject['tutor_subject_id'] ) ) {
              
              unset( $subject['tutor_subject_id'] );

              $this->db->insert( 'tutor_subjects', $subject );
            } else {

              $this->db->where( array( 'tutor_subject_id' => $subject['tutor_subject_id'] ) );
              $this->db->update( 'tutor_subjects', $subject );
            }
        
        }




        $response = array( 'status' => 1, 'data' => 'Information updated successfully.' );
        echo json_encode( $response );
      } else {

        $response = array( 'status' => 0, 'data' => 'Unable to update Information.' );
        echo json_encode( $response );
      }

    }

    public function save_further_info()
    {
      $further_info = json_decode( file_get_contents('php://input'), true );

      $yog_arr = explode( '-', $further_info['expected_univerisity_yog'] );

      if ( count( $yog_arr ) > 1 ) {
        
        // convert ISO-8061 date format to Y-m-d
        $expected_univerisity_yog = date('Y-m-d', strtotime($further_info['expected_univerisity_yog']));
      } else {

        $expected_univerisity_yog = $yog_arr[0].'-01-01';
      }
      
      $further_data  =  array(  
      'expected_univerisity_yog'  => $expected_univerisity_yog, 
      'tutor_id'                  => $this->user_id, 
      'university_attending'      => $further_info['university_attending'],
      'subject_at_university'     => $further_info['subject_at_university'],
      'different_to_ib_revision'  => $further_info['different_to_ib_revision'], 
      'favorite_ib_teacher'       => $further_info['favorite_ib_teacher'], 
      'short_description'         => $further_info['short_description'],
      'right_to_work'             => $further_info['right_to_work'],
      'teaching_country'          => $further_info['teaching_country'],
      'eligibility'               => $further_info['eligibility'],
      );

      // insert or update ib_details data
      $result = $this->common_model->add_data($table = 'tutor_details', $data = $further_data, $where = array( 'tutor_id' => $this->user_id ) );

      $this->db->where( array( 'user_id' => $this->user_id ) );
      $this->db->update( 'users', array( 'status' => 2 ) );

      // if information updated successfully
      if ( $result == true ) {
        
        $response = array( 'status' => 1, 'data' => 'Information updated successfully.' );
        echo json_encode( $response );
      } else {

        $response = array( 'status' => 0, 'data' => 'Unable to update Information.' );
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

    public function get_subject_details()
    {
      
      $ib_subjects = $this->db->get_where( 'tutor_subjects', array( 'tutor_id' => $this->user_id ) )->result();

      echo json_encode( $ib_subjects );
    }

    public function get_tutor_feed()
    {
      
      $post_data = json_decode( file_get_contents( "php://input" ), true );

      // echo "<pre>";
      // print_r( $post_data );
      // echo "</pre>";

      $feed = $this->tutor_model->get_tutor_feed( array_filter($post_data) );

      echo json_encode( $feed );
    }

    public function get_feed_details($feed_id)
    {
      $feed = $this->tutor_model->get_feed_details($feed_id);

      if ( empty( $feed->profile_img ) ) {
        
        $feed->profile_img = $feed->gender == 1 ? 'female-default-avatar.jpg' : 'male-default-avatar.png';
      }

      echo json_encode( $feed ); 
    }

    public function apply_job()
    {
      $tution_id = json_decode( file_get_contents( "php://input", true ) );

      $this->db->insert( 'tutions_applied', array( 'tution_id' => $tution_id, 'tutor_id' => $this->user_id ) );
      
      if ($this->db->trans_status() === FALSE) { // error in query
      // generate an error... or use the log_message() function to log your error
        $response = array( 'status' => 0, 'data' => 'Unable to apply on job.' );
      } else { // query executed successfully

        $response = array( 'status' => 1, 'data' => 'Job applied successfully.' );
        
      }

      echo json_encode( $response );
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
        $this->db->select('notification_assigned_class.*,schedules.scheduled_by,users.user_id');
        $this->db->from('notification_assigned_class' );
        $this->db->join( 'schedules', 'schedules.schedule_id = notification_assigned_class.tution_id');  
        $this->db->join( 'users', 'users.user_id = schedules.scheduled_by');    
        $where = array('notification_assigned_class.notification_for' => $this->user_id,'notification_assigned_class.count >' => 0,'notification_assigned_class.notification_type' => 'decline_class');
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

    public function check_user_status()
    {
    	$status = $this->db->get_where( 'users', array( 'user_id' => $this->user_id ) )->row()->status;

      echo $status;

    }

    public function get_schedule_events()
    {
      $events = $this->common_model->get_schedule_events($this->user_id);

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
                          'title'           => $post_data['title'],
                          // converted iso 8061 datetime format to Unix timstamp
                          'start'           => date( "U",strtotime($post_data['start']) ),
                          'end'             => date( "U",strtotime($post_data['end']) ),
                          
                    );

      // set where condition for update if schedule id is set
      if ( isset( $post_data['schedule_id'] ) && !empty( $post_data['schedule_id'] ) ) {
        
        $where = array( 'schedule_id' => $post_data['schedule_id'] );
      } else {
        // some false condition
        $where = array( 'schedule_id' => 'nill' );
      }

      // add or update event
      $event = $this->common_model->add_data('schedules', $event_data, $where );
      
      /* Send email to Student for scheduling class by Tutor */
      $data['student'] = $this->common_model->get_student_details($post_data['tutionData']['student_id']);
      $email_student =  $data['student'][0]->email;
                $config       = Array(
                    'mailtype' => 'html'
                );
                $data         = array(
                    'firstname' => $data['student'][0]->firstname,
                    'lastname'  => $data['student'][0]->lastname
                );
                $data['logo'] = base_url(). 'assets/img/logo.png';
                $data['link'] = base_url();
                $scheduleclass = $this->load->view('emails/scheduleclass', $data, TRUE);
                $this->email->initialize($config);
                $this->email->from('team@rostrum.com', 'Rostrum');
                $list = array(
                   $email_student,
                    'rostrum123@yopmail.com'
                        );
                $this->email->to($list);
                $this->email->subject('Schedule Class');
                $this->email->message($scheduleclass);
                $this->email->send();

         /* Update Notifications */
        $user_count = $this->db->get_where( 'notifications', array( 'notification_for' => $post_data['tutionData']['student_id'], 'notification_type' => 'schedule_class' ) )->num_rows();
        if($user_count > 0)
        {
        }else{
          $student_data = array(
                'notification_for' => $post_data['tutionData']['student_id'],
                'notification_type' => 'schedule_class',
                'tution_id' => $post_data['tutionData']['tr_id'],
                'count'    => $user_count +1,
                'created_at' => date('Y-m-d h:i:s')

              );
           $this->db->insert('notification_assigned_class',$student_data);
        }         

      echo json_encode($event);

    }

    public function delete_scheduled_event()
    {
      $post_data = json_decode( file_get_contents( 'php://input' ), true );

      $event = $this->common_model->delete_data('schedules', $where = array('schedule_id' => $post_data) );
      
      echo json_encode($event);
    }
 
    public function respond_to_request()
    {
      $post_data = json_decode( file_get_contents( 'php://input' ), true );

      $update_data = array( 
                            'tutor_response'  => $post_data['status'],
                            'assigned_to'     => $this->user_id,
                          );

      $update_data['status'] = $post_data['status'] == 1 ? $post_data['status'] : 0;

      $this->db->where( array( 'tr_id' => $post_data['tution_id'] ) );
      $this->db->update('tution_requirements', $update_data);
      
      $success_message = $post_data['status'] == 1 ? "Job accepted successfully." : "Job declined successfully.";

      if ($this->db->trans_status() === FALSE) { // error in query
      // generate an error... or use the log_message() function to log your error
        $response = array( 'status' => 0, 'data' => 'Unable to proccess your request.' );
      } else { // query executed successfully

        $response = array( 'status' => 1, 'data' => $success_message);
      }

      echo json_encode($response);
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

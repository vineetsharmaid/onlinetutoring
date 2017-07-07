<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{    
    public function __construct()
    {
        parent::__construct();
        $this->load->model( array( 'admin_model', 'email_model', 'common_model') );
        
        // used to set cookie for remember me
        $this->load->helper('cookie');

        $this->user_id  = $this->session->userdata('user_id');
        $this->role     = $this->session->userdata('role');

        if ( empty( $this->user_id ) || $this->role != 3 )
        {
          redirect( 'login', 'refresh' );
        }

    }

    public function index(){

      $this->load->view( 'admin_header' );
      $this->load->view( 'admin_dashboard' );
      $this->load->view( 'admin_footer' );
    }

    public function get_reqested_tutors()
    {
      // get tutors who have requested for account
      // $tutors = $this->db->get_where( 'users', array( 'status !=' => 0, 'role' => 2 ) )->result();

      $this->db->select( 'users.*, tutor_details.*' );
      $this->db->from( 'users' );
      $this->db->join( 'tutor_details', 'users.user_id = tutor_details.tutor_id', 'left' );
      $this->db->where( array( 'users.status !=' => 0, 'users.role' => 2 ) );
      $tutors = $this->db->get()->result();

      if ( !empty( $tutors ) ) {
          foreach ($tutors as $tutor) {
            
            switch ($tutor->status) {
              case 2:
                $tutor->status_name = 'Pending';
                break;
              
              case 1:
                $tutor->status_name = 'Approved';
                break;
              case 3:
                $tutor->status_name = 'Blocked';
                break;
            }

          }
        
      }

      if ($this->db->trans_status() === FALSE) { // error in query
        
        $response = array( 'status' => 0, 'data' => '' );
      } else { // query executed successfully

        $response = array( 'status' => 1, 'data' => $tutors );
      }
      
      echo json_encode( $response );
    }

    public function get_reqested_tutor_details( $tutor_id )
    {

      $response = $this->admin_model->get_reqested_tutor_details($tutor_id);
      
      if ( $response['status'] == 1 ) {
      
          $response['data']->dob     = date( 'm-d-Y', strtotime( $response['data']->dob ) );
          
          $response['data']->ib_yog  = date( 'Y', strtotime( $response['data']->ib_yog ) ) == '-0001' ? '' : date( 'Y', strtotime( $response['data']->ib_yog ) );

          if ( empty( $response['data']->profile_img ) ) {
            $response['data']->profile_img = $response['data']->gender == 1 ? 'female-default-avatar.jpg' : 'male-default-avatar.png';
          }

          $response['data']->expected_univerisity_yog  = date( 'Y', strtotime( $response['data']->expected_univerisity_yog ) ) == '-0001' ? '' : date( 'Y', strtotime( $response['data']->expected_univerisity_yog ) );
      }

      echo json_encode( $response );
    }


    public function get_students_list()
    {      
      // get tutors who have requested for account
      $tutors = $this->db->get_where( 'users', array( 'role' => 1 ) )->result();

      if ($this->db->trans_status() === FALSE) { // error in query
        
        $response = array( 'status' => 0, 'data' => '' );
      } else { // query executed successfully

        $response = array( 'status' => 1, 'data' => $tutors );
      }
      
      echo json_encode( $response );
    }

    public function get_student_details( $student_id )
    {
        $this->db->select( 'users.*, usermeta.*' );
        $this->db->from( 'users' );
        $this->db->join( 'usermeta', 'usermeta.user_id = users.user_id', 'left' );
        $this->db->where( array( 'users.user_id' => $student_id ) );
        $student_details = $this->db->get()->row();

        if ($this->db->trans_status() === FALSE) { // error in query
        
          $response = array( 'status' => 0, 'data' => '' );
        } else { // query executed successfully

          $response = array( 'status' => 1, 'data' => $student_details );
        }
        
        echo json_encode( $response );
    }

    /* Get Notification Count */

    public function get_total_notification_count(){

        $this->db->select('*');
        $this->db->from('notifications');    
        $this->db->where('count != ',0,FALSE);
        $query = $this->db->get();
        $result = $query->result_array();
        $count = $query->num_rows();
        echo json_encode( array('result' => $result,'count' => $count ));
    }

    public function clear_notification(){

        $data = json_decode(file_get_contents('php://input'),true);
        $update = array( 'count' => 0);
        $this->db->where( array( 'notification_for' => $data['user_type'],'notification_type' => $data['notification_type'] ) );
        $this->db->update( 'notifications', $update );
        if ($this->db->trans_status() === FALSE) { // error in query
        
          $response = array( 'status' => 0, 'data' => 'Notification Not Cleared Successfully' );
          echo json_encode( $response );
        } else {
          $response = array( 'status' => 1, 'data' => 'Notification Cleared Successfully' );
          echo json_encode( $response );  
        }

    }


    function change_status()
    {
      $data = json_decode(file_get_contents('php://input'),true);

      // update the status of user
      $this->db->where( array( 'user_id' => $data['user_id'] ) );
      $result = $this->db->update( $table = 'users', array('status' => $data['status']) );

      // if information updated successfully
      if ($this->db->trans_status() === FALSE) { // error in query
        
        $response = array( 'status' => 0, 'data' => 'Unable to update status.' );
        echo json_encode( $response );
      } else {

        $response = array( 'status' => 1, 'data' => 'Status updated successfully.' );
        /* Email For Status Update */
        $result = $this->db->get_where('users', array( 'user_id' => $data['user_id'] ) )->result_array();
        $config       = Array(
                    'mailtype' => 'html'
                );
                $data         = array(
                    'firstname' => $result[0]['firstname'],
                    'email' => $result[0]['email']
                );
                $data['logo'] = base_url(). 'assets/img/logo.png';
                $data['link'] = base_url();
                $registeredform = $this->load->view('email/account_approve', $data, TRUE);
                $this->email->initialize($config);
                $this->email->from('team@rostrum.com', 'Rostrum');
                $list = array(
                    'rostrum123@yopmail.com',
                    $result[0]['email']
                );
                $this->email->to($list);
                $this->email->subject('Account Approval');
                $this->email->message($registeredform);
                $this->email->send();
        echo json_encode( $response );
      }

    }

    public function get_requests_list($status='')
    {
      
      $requests = $this->admin_model->get_requests_list($status);
      

      if ( $requests === FALSE ) {
        
        $response = array( 'status' => 0, 'data' => array() );
      } else {
        
        $response = array( 'status' => 1, 'data' => $requests );
      }

      echo json_encode( $response );
    }

    public function get_request($request_id)
    {
      $requests = $this->admin_model->get_requests_list($request_id, $single = true);
      

      if ( $requests === FALSE ) {
        
        $response = array( 'status' => 0, 'data' => array() );
      } else {
        
        $response = array( 'status' => 1, 'data' => $requests );
      }

      echo json_encode( $response ); 
    }

    public function get_requests_count()
    {
      $response['requested']  = $this->db->get_where( 'tution_requirements', array( 'status' => 0 ) )->num_rows();
      $response['assigned']   = $this->db->get_where( 'tution_requirements', array( 'status' => 1 ) )->num_rows();
      $response['accepted']   = $this->db->get_where( 'tution_requirements', array( 'status' => 2 ) )->num_rows();
      $response['declined']  = $this->db->get_where( 'tution_requirements', array( 'status' => 3 ) )->num_rows();

      echo json_encode( $response );
    }

    public function get_subject_groups()
    { 

      $groups = $this->common_model->get_subject_groups();
      
      echo json_encode( $groups );
    }

    public function create_subject_group()
    {
      $data = json_decode(file_get_contents('php://input'),true);

      $this->db->insert( 'subject_group', $data );

      // if information updated successfully
      if ($this->db->trans_status() === FALSE) { // error in query
        
        $response = array( 'status' => 0, 'data' => 'Unable to create group.' );
        echo json_encode( $response );
      } else {

        $response = array( 'status' => 1, 'data' => 'Group created successfully.' );
        echo json_encode( $response );
      }

    }

    public function edit_subject_group()
    {
      $data = json_decode(file_get_contents('php://input'),true);

      $update = array( 'status' => $data['status'], 'group_name' => $data['group_name'] );

      $this->db->where( array( 'sGroup_id' => $data['sGroup_id'] ) );
      $this->db->update( 'subject_group', $update );

      // if information updated successfully
      if ($this->db->trans_status() === FALSE) { // error in query
        
        $response = array( 'status' => 0, 'data' => 'Unable to update group.' );
        echo json_encode( $response );
      } else {

        $response = array( 'status' => 1, 'data' => 'Group updated successfully.' );
        echo json_encode( $response );
      }
    }

    public function edit_subject()
    {
      $post_data = json_decode(file_get_contents('php://input'),true);

      $update = array( 'status' => $post_data['status'], 'subject_name' => $post_data['subject_name'] );

      $this->db->where( array( 'subject_id' => $post_data['subject_id'] ) );
      $this->db->update( 'subjects', $update );

      // if information updated successfully
      if ($this->db->trans_status() === FALSE) { // error in query
        
        $response = array( 'status' => 0, 'data' => 'Unable to update subject.' );
        echo json_encode( $response );
      } else {

        $response = array( 'status' => 1, 'data' => 'Subject updated successfully.' );
        echo json_encode( $response );
      }
    }

    public function get_group_details($group_id)
    {
      $result = $this->common_model->get_subjects($group_id);
      
      echo json_encode( $result );

    }

    public function create_subject()
    {
        $data = json_decode(file_get_contents('php://input'),true);

        $this->db->insert( 'subjects', $data );

        // if information updated successfully
        if ($this->db->trans_status() === FALSE) { // error in query
          
          $response = array( 'status' => 0, 'data' => 'Unable to add subject.' );
          echo json_encode( $response );
        } else {

          $response = array( 'status' => 1, 'data' => 'Subject added successfully.' );
          echo json_encode( $response );
        }
    }

    public function delete_action()
    {
        $data = json_decode(file_get_contents('php://input'),true);


        $this->db->where( array( $data['index_name'] => $data['index_id'] ) );
        $this->db->delete( $data['table_name'] );

        // if information updated successfully
        if ($this->db->trans_status() === FALSE) { // error in query
          
          $response = array( 'status' => 0, 'data' => 'Unable to delete.' );
          echo json_encode( $response );
        } else {

          $response = array( 'status' => 1, 'data' => 'Deleted successfully.' );
          echo json_encode( $response );
        }
    }


    public function get_feed_details($feed_id)
    {
      $feed = $this->common_model->get_feed_details($feed_id);

      echo json_encode( $feed ); 
    }


    public function get_applied_tutors($feed_id)
    {
      $tutors = $this->common_model->get_applied_tutors($feed_id);

      echo json_encode( $tutors );  
    }

    public function assign_to_tutor()
    {
      $data = json_decode( file_get_contents( "php://input" ), true );
      
      $this->db->where( array( 'tr_id' => $data['tution_id'] ) );
      $this->db->update( 'tution_requirements', array( 'status' => $data['status'], 'assigned_to' => $data['tutor_id'] ) );


      /* Email For Admin assign tutor to student */
        $this->db->select( 'tution_requirements.*, users.firstname as tutorfname,users.lastname as tutorlname, users.email as tutoremail' );
		
		$this->db->from( 'tution_requirements' );
	
		$this->db->join( 'users', 'users.user_id = tution_requirements.assigned_to' );
		
		$this->db->where( array( 'tution_requirements.tr_id' =>  $data['tution_id'] ) );
		
		$alldata = $this->db->get()->result_array();

				$config     = Array(
                    'mailtype' => 'html'
                );
                $emaildata         = array(
                    'firstname' => $alldata[0]['fullName'],
                    'tutorfname' => $alldata[0]['tutorfname'],
                    'tutorlname' => $alldata[0]['tutorlname'],
                    'tutiontitle' => $alldata[0]['title']
                );
                $emaildata['logo'] = base_url(). 'assets/img/logo.png';
                $emaildata['link'] = base_url();
                if($data['status'] == 1){
                	$emaildata['assign'] = 'Assigned';
                }else{
                	$emaildata['assign'] = 'UnAssigned';
                }
                $registeredform = $this->load->view('email/assign_tutor_to_student', $emaildata, TRUE);
                $this->email->initialize($config);
                $this->email->from('team@rostrum.com', 'Rostrum');
                $list = array(
                    'rostrum123@yopmail.com',
                    $alldata[0]['email']
                );
                $this->email->to($list);
                $this->email->subject('Tutor Assigned');
                $this->email->message($registeredform);
                $this->email->send();

                $config2     = Array(
                    'mailtype' => 'html'
                );
                $emaildata2         = array(
                    'firstname' => $alldata[0]['tutorfname'],
                    'studentfname' => $alldata[0]['fullName'],
                    'tutiontitle' => $alldata[0]['title']

                );
                $emaildata2['logo'] = base_url(). 'assets/img/logo.png';
                $emaildata2['link'] = base_url();
                if($data['status'] == 1){
                	$emaildata2['assign'] = 'Assigned';
                }else{
                	$emaildata2['assign'] = 'UnAssigned';
                }
                $registeredform = $this->load->view('email/assigned_tutor', $emaildata2, TRUE);
                $this->email->initialize($config2);
                $this->email->from('team@rostrum.com', 'Rostrum');
                $list = array(
                    'rostrum123@yopmail.com',
                    $alldata[0]['tutoremail']
                );
                $this->email->to($list);
                $this->email->subject('Student Assigned');
                $this->email->message($registeredform);
                $this->email->send();

      // if information updated successfully
      if ($this->db->trans_status() === FALSE) { // error in query
        
        $message  = $data['status'] == 1 ? 'Unable to assign tutor.' : 'Unable to unassign tutor.';
        $response = array( 'status' => 0, 'data' => $message );
        echo json_encode( $response );
      } else {

        $message  = $data['status'] == 1 ? 'Tutor assigned successfully' : 'Tutor unassigned successfully';
        $response = array( 'status' => 1, 'data' => $message );

        if($data['status'] == 1){

        /* Update Notifications */
	        $student_count = $this->db->get_where( 'notification_assigned_class', array( 'notification_for' => $alldata[0]['student_id'],'tution_id' => $data['tution_id']  ) )->num_rows();
	        $tutor_count = $this->db->get_where( 'notification_assigned_class', array( 'notification_for' => $data['tutor_id'],'tution_id' => $data['tution_id'] ) )->num_rows();
	        if($student_count > 0){
			}else{
		        $student_data = array(
		        		'notification_for' => $alldata[0]['student_id'],
		        		'notification_type' => 'assigned_tutor',
		        		'tution_id' => $data['tution_id'],
		        		'count'    => $student_count +1,
		        		'created_at' => date('Y-m-d h:i:s')

		        	);
			     $this->db->insert('notification_assigned_class',$student_data);
			}
			if($tutor_count > 0){
			}else{
				 $student_data = array(
		        		'notification_for' => $data['tutor_id'],
		        		'notification_type' => 'assigned_tutor',
		        		'tution_id' => $data['tution_id'],
		        		'count'    => $student_count +1,
		        		'created_at' => date('Y-m-d h:i:s')

		        	);
			    $this->db->insert('notification_assigned_class',$student_data);
			}        

    	}

        echo json_encode( $response );
      }

    }

    public function get_assigned_tutor($feed_id)
    {
      $tutors = $this->common_model->get_assigned_tutor($feed_id);

      echo json_encode( $tutors );
    }

    public function get_tutor_details($tutor_id)
    {
      $tutor = $this->common_model->get_tutor_details($tutor_id);
      
      echo json_encode( $tutor );
    }

    public function get_pages()
    {
      $pages = $this->db->get( 'pages' )->result();

      if ($this->db->trans_status() === FALSE) { // error in query
        
        $response = array( 'status' => 0, 'data' => array() );
      } else { // query executed successfully

        $response = array( 'status' => 1, 'data' => $pages );
      }
      
      echo json_encode( $response );
    }

    public function get_schedule_events($user_id)
    {
      $events = $this->common_model->get_schedule_events($user_id, $readOnly = true);

      echo json_encode( $events ); 
    } 

    public function get_user_related_tutions($user_id)
    {
      $tutions = $this->common_model->get_user_related_tutions($user_id);

      echo json_encode( $tutions );
    }

    public function get_user_details($user_id)
    {
      $user = $this->common_model->get_user('', $user_id);
      
      echo json_encode( $user );
    }

    public function get_subjects()
    {
      $subjects = $this->db->get_where( 'subjects' )->result();

      echo json_encode( $subjects );
    }

    public function change_tier()
    {
      $post_data = json_decode( file_get_contents( "php://input" ), true );

      $where        = array( 'tutor_id' => $post_data['user_id'] );
      $update_data  = array( 'tier' => $post_data['tier'] );

      $query_result = $this->common_model->add_data( 'tutor_details', $update_data, $where );

      if ( $query_result == 1 ) {
        
        $response = array( 'status' => 1, 'data' => "Information updated successfully." );
      } else {

        $response = array( 'status' => 0, 'data' => "Unable to update information." );
      }

      echo json_encode( $response );
    }

    public function get_transactions()
    {
      $response = $this->admin_model->get_transactions();
      
      echo json_encode( $response );
    }

    public function get_transaction_details($transaction_id)
    {
      $response = $this->admin_model->get_transactions($transaction_id); 

      echo json_encode( $response );
    }


}





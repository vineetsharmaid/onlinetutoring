<?php

class Admin_model extends CI_Model {

	function __construct() {

		parent::__construct();

	}

	public function get_requests_list($status='', $single='')
	{
      
			// filter to get single result
      if ( $single == true ) {
      	
      	$where = array( 'tution_requirements.tr_id' => $status );
      } else {
      	
				// add status filter if status is passed
	      $where = $status != 9 ? array( 'tution_requirements.status' => $status ) : array();
      }

      $this->db->select( 'users.firstname, users.lastname, 
                          usermeta.profile_img, usermeta.gender, 
                          tution_requirements.tr_id, tution_requirements.student_id,
                          tution_requirements.status, tution_requirements.title, tution_requirements.created' );
      $this->db->from( 'tution_requirements' );
      $this->db->join( 'users', 'users.user_id = tution_requirements.student_id' );
      $this->db->join( 'usermeta', 'usermeta.user_id = tution_requirements.student_id', 'left' );
      $this->db->where( $where );
      $this->db->order_by( 'tution_requirements.tr_id', 'desc' );
      
      $requests = $single == true ? $this->db->get()->row() : $this->db->get()->result();
      
      if ( $this->db->trans_status() === FALSE ) {
        
        return FALSE;
      } else {
        
        if ( $single == true ) {
        	
        	$requests->created = date( 'm-d-Y', strtotime( $requests->created ) );	
        } else {

		      foreach ($requests as &$request) 
		      {
		      	$request->created = date( 'm-d-Y', strtotime( $request->created ) );
		      }
        }

        return $requests;
      }
		
	}

  public function get_reqested_tutor_details($tutor_id)
  {
      // get tutors who have requested for account
      $this->db->select( 'users.*, usermeta.*, tutor_details.*');
      $this->db->from( 'users' );
      $this->db->join( 'usermeta', 'usermeta.user_id = users.user_id', 'left' );
      $this->db->join( 'tutor_details', 'tutor_details.tutor_id = users.user_id', 'left' );
      $this->db->where( array( 'users.user_id' => $tutor_id, 'users.status !=' => 0 ) );
      $tutor = $this->db->get()->row();

      if ($this->db->trans_status() === FALSE) { // error in query
        
        $response = array( 'status' => 0, 'data' => '' );
      } else { // query executed successfully

        $response = array( 'status' => 1, 'data' => $tutor );
      }

      return $response;
  }

  public function get_transactions( $transaction_id = '' )
  {
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
    $this->db->where( array('schedules.payment_status' => PAYMENT_RECIEVED) );
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

    if ( $this->db->trans_status() === FALSE ) {
        
      return array( 'status' => 0, 'data' => array() );
    } else {
      
      return array( 'status' => 1, 'data' => $transactions );
    }

  }


   
}

?>
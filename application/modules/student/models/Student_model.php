<?php

class Student_model extends CI_Model {

	function __construct() {

		parent::__construct();
		$this->load->model('common_model');
		$this->user_id = $this->session->userdata('user_id');

	}

	public function get_user( $where = '' )
	{
		$this->db->select( 'users.*, usermeta.*' );
		$this->db->from( 'users' );
		$this->db->join( 'usermeta', 'users.user_id = usermeta.user_id' );

		if ( empty( $where ) ) {
			
			$this->db->where( array('users.user_id' => $this->user_id) );
		} else {

			$this->db->where( $where );
		}
		
		$user = $this->db->get()->row();
		
		return !empty( $user ) ? $user : array();
		
	}

	public function get_student_feed($status='')
	{
		$where = array();
		if ( $status != '' ) {
			
			$where['tution_requirements.status'] = $status;
		}

		$this->db->select( 'tution_requirements.tr_id, tution_requirements.title, tution_requirements.description, tution_requirements.created,users.firstname as tutorfname,users.email as tutoremail' );
		$this->db->from( 'tution_requirements' );
		$this->db->join( 'users', 'users.user_id = tution_requirements.assigned_to','left' );
		$this->db->where( array( 'tution_requirements.student_id' => $this->user_id ) );
		$this->db->where( $where );
		$this->db->order_by( 'tution_requirements.tr_id', 'desc' );
		$feeds = $this->db->get()->result();
		
		if ( !empty( $feeds ) ) {
			foreach ($feeds as $feed) {
				
				$feed->date = date( 'm-d-Y', strtotime( $feed->created ) );
				$feed->time = date( 'h:i a', strtotime( $feed->created ) );
			}
		}

    if ($this->db->trans_status() === FALSE) { // error in query
		  // generate an error... or use the log_message() function to log your error
		  return array( 'status' => 0, 'data' => array() );
		} else { // query executed successfully

		  return array( 'status' => 1, 'data' => $feeds );
		}
	}

	public function get_feed_details($feed_id)
	{
		$this->db->select( 'tution_requirements.*, subjects.subject_name, tutorUser.firstname, tutorUser.lastname, tutorUser.email, studentUser.city, tutorUser.created as student_since, usermeta.profile_img, countries.name as country_name, states.name as state_name, cities.name as city_name' );
		
		$this->db->from( 'tution_requirements' );
		
		// $this->db->join( 'subject_group', 'subject_group.sGroup_id = tution_requirements.sGroup_id' );
		
		$this->db->join( 'subjects', 'subjects.subject_id = tution_requirements.subject_id' );
		
		$this->db->join( 'users as studentUser', 'studentUser.user_id = tution_requirements.student_id' );
		
		$this->db->join( 'users as tutorUser', 'tutorUser.user_id = tution_requirements.assigned_to', 'left' );
		
		$this->db->join( 'usermeta', 'usermeta.user_id = tution_requirements.student_id', 'left' );

		$this->db->join( 'countries', 'studentUser.country = countries.country_id' );
		$this->db->join( 'states', 'studentUser.state = states.state_id' );
		$this->db->join( 'cities', 'studentUser.city = cities.city_id' );
		
		$this->db->where( array( 'tution_requirements.tr_id' => $feed_id ) );
		
		$feed = $this->db->get()->row();

		if ( !empty( $feed ) ) {
			
			$feed->date = date( 'm-d-Y', strtotime( $feed->created ) );
			$feed->time = date( 'h:i a', strtotime( $feed->created ) );

			// $feed->posted_ago = $this->common_model->get_time_diff( $feed->date, date('m-d-Y') );

			// set name of level according to its value
			switch ($feed->level) {
				case '1':
					$feed->level_name = 'HL';
					break;
				
				case '2':
					$feed->level_name = 'HL';
					break;

				case '3':
					$feed->level_name = 'Ab Initio';
					break;
			}
		}

    if ($this->db->trans_status() === FALSE) { // error in query
		  // generate an error... or use the log_message() function to log your error
		  return array( 'status' => 0, 'data' => array() );
		} else { // query executed successfully

		  return array( 'status' => 1, 'data' => $feed );
		}
	}

    /*Get Payments and Transactions*/

/*     public function getRequestedTransactions(){
      $query = $this->db->get('transactions');
      return $query->result_array();

   }*/
}

?>
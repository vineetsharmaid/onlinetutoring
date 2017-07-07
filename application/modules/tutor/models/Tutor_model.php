<?php

class Tutor_model extends CI_Model {

	function __construct() {

		parent::__construct();
		$this->user_id = $this->session->userdata('user_id');

	}

	public function get_user( $where = '' )
	{
		$this->db->select( 'users.*, usermeta.*' );
		$this->db->from( 'users' );
		$this->db->join( 'usermeta', 'users.user_id = usermeta.user_id', 'left' );

		if ( empty( $where ) ) {
			
			$this->db->where( array('users.user_id' => $this->user_id) );
		} else {

			$this->db->where( $where );
		}
		
		$user = $this->db->get()->row();
		
		return !empty( $user ) ? $user : array();
		
	}


	public function get_tutor_feed($filter_data='')
	{
		$where = array();
	
		$where['tutor_subjects.tutor_id'] = $this->user_id;

		if ( isset($filter_data['tMethodID']) ) {

			$where['tution_requirements.tution_method'] = $filter_data['tMethodID'];
		}


		if ( isset($filter_data['status']) ) {
			if ( $filter_data['status'] == 4 ) {
				
				// tutions where student requested for logged in tutor
				$where['tution_requirements.specific_tutor'] = $this->user_id;
				$where['tution_requirements.status'] = 0;
				$where['tution_requirements.tutor_response'] = 0;
			} else if ( $filter_data['status'] == 1 || $filter_data['status'] == 3 ) {

				// tutions based on status
				$where['tution_requirements.assigned_to'] = $this->user_id;
				$where['tution_requirements.status'] = $filter_data['status'];
			} else {
				
				// tutions based on status
				$where['tution_requirements.status'] = $filter_data['status'];
			}
		} else {

			$where['tution_requirements.status'] = 0;
		}

		if ( !empty( $filter_data['city'] ) ) {
			
			$where['users.city'] = $filter_data['city']['city_id'];
		}

		// select required fields 
		$this->db->select( 'tution_requirements.tr_id, tution_requirements.title, tution_requirements.description, tution_requirements.created' );
		
		// fetch from main table 
		$this->db->from( 'tution_requirements' );
			
		$this->db->join( 'tutor_subjects', 'tutor_subjects.subject_id = tution_requirements.subject_id' );
		
		
		if ( !empty( $filter_data['city'] ) ) {
		
				$this->db->join( 'users', 'users.user_id = tution_requirements.student_id' );
		}

		// where based on filter applied
		$this->db->where( $where );

		// order by latest post first
		$this->db->order_by( 'tution_requirements.tr_id', 'desc' );
		
		// fetch results based on query
		$feeds = $this->db->get()->result();

		if ( !empty( $feeds ) ) {
			foreach ($feeds as $feed) {
				
				$feed->date = date( 'm-d-Y', strtotime( $feed->created ) );
				$feed->time = date( 'h:i a', strtotime( $feed->created ) );
			}
		}

		// echo $this->db->last_query();

    if ($this->db->trans_status() === FALSE) { // error in query
		  // generate an error... or use the log_message() function to log your error
		  return array( 'status' => 0, 'data' => array() );
		} else { // query executed successfully

		  return array( 'status' => 1, 'data' => $feeds );
		}

	}



	public function get_feed_details($feed_id)
	{
		$this->db->select( 'tution_requirements.*, subjects.subject_name, users.firstname, users.lastname, users.city, users.created as student_since, usermeta.profile_img,usermeta.gender, tutions_applied.tutor_id, countries.name as country_name, states.name as state_name, cities.name as city_name' );
		
		$this->db->from( 'tution_requirements' );
		
		$this->db->join( 'tutions_applied', 'tutions_applied.tution_id = tution_requirements.tr_id AND tutions_applied.tutor_id = '.$this->user_id, 'left' );
		
		$this->db->join( 'subjects', 'subjects.subject_id = tution_requirements.subject_id' );
		
		$this->db->join( 'users', 'users.user_id = tution_requirements.student_id' );
		
		$this->db->join( 'usermeta', 'usermeta.user_id = tution_requirements.student_id', 'left' );

		$this->db->join( 'countries', 'users.country = countries.country_id' );
		$this->db->join( 'states', 'users.state = states.state_id' );
		$this->db->join( 'cities', 'users.city = cities.city_id' );
		
		$this->db->where( array( 'tution_requirements.tr_id' => $feed_id ) );
		
		$feed = $this->db->get()->row();
		$feed->current_user = $this->user_id;

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



	
 
}

?>
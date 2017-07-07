<?php

class Common_model extends CI_Model {

	function __construct() {

		parent::__construct();
		$this->user_id = $this->session->userdata('user_id');

	}

	public function get_user( $where = '', $user_id = '' )
	{

		$user_id = $user_id == '' ? $this->user_id : $user_id;

		$this->db->select( 'users.*, usermeta.*, countries.name as country_name, states.name as state_name, cities.name as city_name' );
		$this->db->from( 'users' );
		$this->db->join( 'usermeta', 'users.user_id = usermeta.user_id', 'left' );
		$this->db->join( 'countries', 'users.country = countries.country_id', 'left' );
		$this->db->join( 'states', 'users.state = states.state_id', 'left' );
		$this->db->join( 'cities', 'users.city = cities.city_id', 'left' );

		if ( empty( $where ) ) {
			
			$this->db->where( array('users.user_id' => $user_id) );
		} else {

			$this->db->where( $where );
		}
		
		$user_detail = $this->db->get()->row();
		
		if ( !empty( $user_detail ) ) {

			if ( empty( $user_detail->profile_img ) ) {
	  		$user_detail->profile_img = $user_detail->gender == 1 ? 'female-default-avatar.jpg' : 'male-default-avatar.png';
	  	}
			
			// change date format
			if ( !empty( $user_detail->dob )  ) {
				
				$user_detail->dob = date( 'm-d-Y', strtotime( $user_detail->dob ) );
			}

		}

		return !empty( $user_detail ) ? $user_detail : array();
		
	}

	public function get_field_by_name( $table, $field, $where = array() )
	{

		$row = $this->db->get_where( $table, $where )->row();

		if ( !empty( $row ) ) {
			
			return $value = $row->{$field};
		} else {

			return 0;
		}
		

	}

	public function profile_img( $image, $old_image = '')
	{	
		// $path = './uploads/profile_imgs';

		// resize profile image
    // $pro_img_response = $this->commonlib->create_pro_image( $source = $path.'/'.$image );
    
    // create thumbnail of profile image
    // $thumb_response   = $this->commonlib->create_thumb( $source = './uploads/profile_imgs/'.$image );

		$this->db->where( array( 'user_id' => $this->user_id ) );
	  $this->db->update( 'usermeta', array( 'profile_img' => $image ) );
		
	}


	public function add_data($table, $data, $where )
	{
		$query = $this->db->get_where( $table, $where );

    if ( $query->num_rows() > 0 ) {
      
      $this->db->where( $where );
      $this->db->update( $table, $data );
    } else {

      $this->db->insert( $table, $data );
    }

    if ($this->db->trans_status() === FALSE) { // error in query
		  // generate an error... or use the log_message() function to log your error
		  return false;
		} else { // query executed successfully

			return true;
		}

	}

	public function delete_data($table, $where)
	{
		$this->db->where( $where );
		$this->db->delete( $table );

		if ($this->db->trans_status() === FALSE) { // error in query
		  // generate an error... or use the log_message() function to log your error
		  return false;
		} else { // query executed successfully

			return true;
		}
	}

	public function get_student_details($student_id)
	{
		$this->db->select('users.firstname,users.lastname,users.email');
		$this->db->from( 'users' );
		$this->db->where( array( 'users.user_id' => $student_id ) );
		return $this->db->get()->result();

	}

	public function get_diploma_details() {
		
		// $diploma_details = $this->db->get_where( 'tutor_details', array( 'tutor_id' => $this->user_id ) )->row();

		$this->db->select( 'tutor_details.tutor_detail_id, tutor_details.tutor_id, tutor_details.ib_yog, tutor_details.ib_country, tutor_details.ib_college, tutor_details.final_ib_score, tutor_details.extended_essay_subject, tutor_details.extended_essay_grade, tutor_details.revision_courses, tutor_details.online_private_tution, tutor_details.other_tutoring_opportunities, tutor_details.additional_subject_details' );
		$this->db->from( 'tutor_details' );
		$this->db->where( array( 'tutor_details.tutor_id' => $this->user_id ) );
		$diploma_details = $this->db->get()->row();

		if ( !empty( $diploma_details->ib_yog ) ) {
			
			$diploma_details->ib_yog = date( 'Y', strtotime( $diploma_details->ib_yog ) );

			$diploma_details->ib_yog = $diploma_details->ib_yog == '-0001' ? '' : $diploma_details->ib_yog;
		}

		return !empty( $diploma_details ) ? $diploma_details : array();
	}


	public function get_further_information() {
		
		// $diploma_details = $this->db->get_where( 'tutor_details', array( 'tutor_id' => $this->user_id ) )->row();

		$this->db->select( 'tutor_details.university_attending, tutor_details.subject_at_university, tutor_details.expected_univerisity_yog, tutor_details.different_to_ib_revision, tutor_details.favorite_ib_teacher, tutor_details.short_description, tutor_details.right_to_work, tutor_details.teaching_country, tutor_details.eligibility' );
		$this->db->from( 'tutor_details' );
		$this->db->where( array( 'tutor_details.tutor_id' => $this->user_id ) );
		$further_information = $this->db->get()->row();

		if ( !empty( $further_information->expected_univerisity_yog ) ) {
			
			$further_information->expected_univerisity_yog = date( 'Y', strtotime( $further_information->expected_univerisity_yog ) );

			$further_information->expected_univerisity_yog = $further_information->expected_univerisity_yog == '-0001' ? '' : $further_information->expected_univerisity_yog;

		}

		return !empty( $further_information ) ? $further_information : array();
	}

	public function get_subject_groups()
	{
			$this->db->select( 'subject_group.*, COUNT(subjects.subject_id) AS subject_count' );
      $this->db->from( 'subject_group' );
      $this->db->join( 'subjects', 'subjects.group_id = subject_group.sGroup_id', 'left' );
      $this->db->group_by('subject_group.sGroup_id');
      return $this->db->get()->result();
	}

	public function get_subjects($group_id = '')
	{
			if ( $group_id == '' ) {
				
				$where = array();
			} else {

				$where = array( 'group_id' => $group_id );
			}
			$this->db->select( 'subjects.*, subject_group.group_name' );
      $this->db->from( 'subjects' );
      $this->db->join( 'subject_group', 'subject_group.sGroup_id = subjects.group_id', 'left' );
      $this->db->where( $where );
      return $this->db->get()->result();
	}


	public function get_applied_tutors($feed_id)
	{
		
		$this->db->select( 'tutions_applied.*, usermeta.*, users.*' );
		$this->db->from( 'tutions_applied' );
		$this->db->join( 'usermeta', 'usermeta.user_id = tutions_applied.tutor_id', 'left' );
		$this->db->join( 'users', 'users.user_id = tutions_applied.tutor_id' );
		$this->db->where( array( 'tutions_applied.tution_id' => $feed_id ) );
		$this->db->where( array( 'users.status' => 1 ) );
		$tutors = $this->db->get()->result();

		if ($this->db->trans_status() === FALSE) { // error in query
		  // generate an error... or use the log_message() function to log your error
		  return array( 'status' => 0, 'data' => array() );
		} else { // query executed successfully

			foreach ($tutors as &$tutor) {
				
				$tutor->date = date( 'm-d-Y', strtotime( $tutor->created ) );
				$tutor->time = date( 'h:i a', strtotime( $tutor->created ) );
			}
		  return array( 'status' => 1, 'data' => $tutors );
		}	
	
	}

	public function get_assigned_tutor($feed_id)
	{
		$tutor_id = $this->db->get_where( 'tution_requirements', array( 'tr_id' => $feed_id ) )->row()->assigned_to;

		// $this->db->select( 'tutions_applied.*, usermeta.*, users.*' );
		$this->db->select( 'usermeta.*, users.*' );
		// $this->db->from( 'tutions_applied' );
		$this->db->from( 'users' );
		$this->db->join( 'usermeta', 'usermeta.user_id = users.user_id', 'left' );
		// $this->db->join( 'users', 'users.user_id = tutions_applied.tutor_id' );
		$this->db->where( array( 'users.user_id' 	=> $tutor_id ) );
		$this->db->where( array( 'users.status' 	=> 1 ) );
		$tutor = $this->db->get()->row();

		// echo $this->db->last_query();


		if ($this->db->trans_status() === FALSE) { // error in query
		  // generate an error... or use the log_message() function to log your error
		  return array( 'status' => 0, 'data' => array() );
		} else { // query executed successfully

			$tutor->date = date( 'm-d-Y', strtotime( $tutor->created ) );
			$tutor->time = date( 'h:i a', strtotime( $tutor->created ) );

		  return array( 'status' => 1, 'data' => $tutor );
		}	
	}

	public function get_users_list( $type='', $status='')
	{
		
		$where = array();

		if ( $type != '' ) {
			
			$where['role'] = $type;
		}

		if ( $status != '' ) {
			
			$where['status'] = $status;
		}

		$this->db->select( 'users.user_id, users.firstname, users.lastname' );
		$this->db->from( 'users' );
		$this->db->join( 'usermeta', 'usermeta.user_id = users.user_id' );
		$this->db->where( $where );
		$users = $this->db->get()->result();

		if ($this->db->trans_status() === FALSE) { // error in query
		  // generate an error... or use the log_message() function to log your error
		  return array( 'status' => 0, 'data' => array() );
		} else { // query executed successfully

		  return array( 'status' => 1, 'data' => $users );
		}	

		
	}

	public function get_feed_details($feed_id)
	{
		$this->db->select( 'tution_requirements.*, subjects.subject_name, users.firstname, users.lastname, users.city, users.created as student_since, usermeta.profile_img, tutions_applied.tutor_id' );
		
		$this->db->from( 'tution_requirements' );
		
		$this->db->join( 'tutions_applied', 'tutions_applied.tution_id = tution_requirements.tr_id AND tutions_applied.tutor_id = '.$this->user_id, 'left' );
		
		$this->db->join( 'subjects', 'subjects.subject_id = tution_requirements.subject_id' );
		
		$this->db->join( 'users', 'users.user_id = tution_requirements.student_id' );
		
		$this->db->join( 'usermeta', 'usermeta.user_id = tution_requirements.student_id', 'left' );
		
		$this->db->where( array( 'tution_requirements.tr_id' => $feed_id ) );
		
		$feed = $this->db->get()->row();

		if ( !empty( $feed ) ) {
			
			$feed->date = date( 'm-d-Y', strtotime( $feed->created ) );
			$feed->time = date( 'h:i a', strtotime( $feed->created ) );

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

	public function get_tutor_details($tutor_id)
	{
		$this->db->select( 'users.*, usermeta.*, tutor_details.*' );
		$this->db->from( 'users' );
		$this->db->join( 'usermeta', 'usermeta.user_id = users.user_id', 'left' );
		$this->db->join( 'tutor_details', 'tutor_details.tutor_id = users.user_id', 'left' );
		$this->db->where( array( 'users.user_id' => $tutor_id ) );
		$tutor = $this->db->get()->row();

		if ( !empty( $tutor ) ) {
			
			if ( empty( $tutor->profile_img ) ) {
	    
	      $tutor->profile_img = $tutor->gender == 1 ? 'female-default-avatar.jpg' : 'male-default-avatar.png';
	    }
		}

		if ($this->db->trans_status() === FALSE) { // error in query
      
      return array( 'status' => 0, 'data' => array() );
    } else { // query executed successfully

      return array( 'status' => 1, 'data' => $tutor );
    }

	}

	public function get_schedule_events($user_id, $readOnly='')
	{
		$this->db->select( 'schedules.*' );
		$this->db->from( 'schedules' );
		$this->db->where( array( 'scheduled_by' => $user_id ) );
		$this->db->or_where( array( 'scheduled_for' => $user_id ) );
		// $this->db->order_by( 'schedules' );
		$events = $this->db->get()->result();

		foreach ($events as &$event) {
			
			$event->start = date('c', $event->start);
			$event->end 	= date('c', $event->end);

			if ( $readOnly == true || $event->schedule_status != 0 ) {
				
				$event->readOnly = true;
			}

			switch ($event->schedule_status) {
				case 0:
					$event->class = 'bg-success-lighter';
					break;
				case 1:
					$event->class = 'bg-info-lighter';
					break;
				case 2:
					$event->class = 'bg-danger-lighter';
					break;
			}
		}

		if ($this->db->trans_status() === FALSE) { // error in query
    
      return array( 'status' => 0, 'data' => array() );
    } else { // query executed successfully

      return array( 'status' => 1, 'data' => $events );
    }

	}

	public function get_user_related_tutions($user_id)
	{

		// $where = '(tution_requirements.student_id=$user_id or tution_requirements.assigned_to = $user_id)';

		$this->db->select( 'tution_requirements.title, tution_requirements.tr_id, tution_requirements.student_id' );
		$this->db->from( 'tution_requirements' );
		$this->db->where( array( 'student_id' => $user_id ) );
		$this->db->or_where( array( 'assigned_to' => $user_id ) );
		// $this->db->order_by( 'schedules' );
		$tutions = $this->db->get()->result();

		if ($this->db->trans_status() === FALSE) { // error in query
      
	      return array( 'status' => 0, 'data' => array() );
	    } else { // query executed successfully

	      return array( 'status' => 1, 'data' => $tutions );
	    }
	}

	public function get_time_diff( $start_date, $end_date )
	{
		$first_datetime 	= new DateTime( $start_date );
		$second_datetime 	= new DateTime( $end_date );

		$interval = $first_datetime->diff($second_datetime);

		return $interval->format('%y years %m months and %d days %h Hours %i Minute %s Seconds');
	}
	public function get_alltutors_subjects($subjectId){


		$this->db->select( 'users.firstname, users.lastname, usermeta.profile_img, usermeta.gender, tutor_subjects.tutor_id' );
		$this->db->from( 'users' );
		$this->db->join( 'tutor_subjects', 'tutor_subjects.tutor_id = users.user_id' );
		$this->db->join( 'usermeta', 'usermeta.user_id = users.user_id', 'left' );
		$this->db->where( array( 'tutor_subjects.subject_id' => $subjectId, 'users.status' => 1 ) );
		$alltutors = $this->db->get()->result();


	  	if ($this->db->trans_status() === FALSE) { // error in query
		  // generate an error... or use the log_message() function to log your error
		  return array( 'status' => 0, 'data' => array() );
		} else { // query executed successfully

				if ( !empty( $alltutors ) ) {
					foreach ($alltutors as &$tutor) {
						

								if ( empty( $tutor->profile_img ) ) {
						  		$tutor->profile_img = $tutor->gender == 1 ? 'female-default-avatar.jpg' : 'male-default-avatar.png';
						  	}

						}
				}	
				  return array( 'status' => 1, 'data' => $alltutors );

		}	// ends else

	} // ends function
	
	
	public function get_countries()
	{
		$countries = $this->db->get('countries')->result();

		if ($this->db->trans_status() === FALSE) { // error in query
      
      return array( 'status' => 0, 'data' => 'Unable to fetch countries.' );
    } else { // query executed successfully

      return array( 'status' => 1, 'data' => $countries );
    }
	}

	public function get_states($country_id)
	{
		$states = $this->db->get_where( 'states', array('country_id' => $country_id) )->result();

		if ($this->db->trans_status() === FALSE) { // error in query
      
      return array( 'status' => 0, 'data' => 'Unable to fetch states.' );
    } else { // query executed successfully

      return array( 'status' => 1, 'data' => $states );
    }	
	}

	public function get_cities($state_id)
	{
		$cities = $this->db->get_where( 'cities', array('state_id' => $state_id) )->result();

		if ($this->db->trans_status() === FALSE) { // error in query
      
      return array( 'status' => 0, 'data' => 'Unable to fetch cities.' );
    } else { // query executed successfully

      return array( 'status' => 1, 'data' => $cities );
    }	
	}
   

}

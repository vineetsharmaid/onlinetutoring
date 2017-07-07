<?php

class Home_model extends CI_Model {

	function __construct() {

		parent::__construct();
		$this->user_id = $this->session->userdata('user_id');

	}

	public function register( $user_data, $user_type )
	{
		$user = $this->db->get_where( 'users', array( 'email' => $user_data['email'] ) )->num_rows();
		
		if ( $user > 0 ) {
				
			return false;
		}	else {

			$this->db->insert( 'users', $user_data );
			
			// check if data was inserted successfully
			return ($this->db->affected_rows() != 1) ? false : true;
		}

		
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

	public function save_requirements($post_data)
	{
    // create array of fullname to get firstname and lastname from it
    $fullname_arr = explode( ' ', $post_data['fullName'] );

    $random_chars    = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    // create password of random characters
    $password        = substr( str_shuffle( $random_chars ), 0, 12 );
    // create hash and salt of password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    
    $register_data['firstname'] = $fullname_arr[0];
    $register_data['lastname']  = !empty( $fullname_arr[1] ) ? $fullname_arr[1] : '';
    $register_data['email']     = $post_data['email'];
    $register_data['password']  = $hashed_password;
    $register_data['phone']     = $post_data['phone'];
    $register_data['city']   		= $post_data['address'];
    $register_data['role']      = 1; // student
    $register_data['status']    = 1; // approved
  
    $already_user = $this->db->get_where( 'users', array( 'email' => $register_data['email'] ) );
    
    if ( $already_user->num_rows() > 0 ) {
      
      $user_id = $already_user->row()->user_id;
      $message = "Thank you for your request. Login to your account to explore more.";
    } else {

      // insert user data into database
      $reg_status = $this->register( $register_data, $user_type = 1 );
                
      $user_id = $this->db->insert_id();

      // unique registration id of user
      $reg_id = $data['role'] == 1 ? STUDENT_REG.$user_id : TUTOR_REG.$user_id;

      $this->db->where( array( 'user_id' => $user_id ) );
      $this->db->update( 'users', array( 'reg_id' => $reg_id ) );

      $message = "Thank you for your request. We've created your account and details has been sent to your email, you can login to explore more.";
    }

    // insert student id in array
    $post_data['student_id']      = $user_id;
    
    // remove address from post data
    unset( $post_data['address'] );

    $this->db->insert( 'tution_requirements', $post_data );

    if ($this->db->trans_status() === FALSE) { // error in query
      
      return array( 'status' => 0, 'data' => 'Unable to complete your request.' );
    } else { // query executed successfully

      return array( 'status' => 1, 'data' => $message );
    }


	}


   
}

?>
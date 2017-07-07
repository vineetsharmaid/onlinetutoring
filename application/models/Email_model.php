<?php

class Email_model extends CI_Model {

	function __construct() {

		parent::__construct();

	}


	public function send_email( $to, $from = '', $subject, $message )
	{
		$ci = get_instance();

		$ci->load->library('email');

		$config['protocol'] 	= "smtp";
		$config['smtp_host'] 	= "ssl://smtp.gmail.com";
		$config['smtp_port'] 	= "465";
		$config['smtp_user'] 	= "dev.bizdesire@gmail.com"; 
		$config['smtp_pass'] 	= "Bizdesire@789";
		$config['charset'] 		= "utf-8";
		$config['mailtype'] 	= "html";
		$config['newline'] 		= "\r\n";

		$ci->email->initialize($config);

		if ( $from == '' ) {
			
			$ci->email->from('blablabla@gmail.com', 'Admin');
		} else{
			
			$ci->email->from($from, 'Username');
		}

		$list = array($to);

		$ci->email->to( $list );

		// $this->email->reply_to('my-email@gmail.com', 'Explendid Videos');

		$ci->email->subject( $subject );
		$ci->email->message( $message );
		
		
		if( $ci->email->send() ) {

			return 1;
		} else {

			return 0;
		}

		echo "<pre>";
		print_r( $this->email->print_debugger() );
		echo "</pre>";

	}


}

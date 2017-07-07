<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller
{    
    public function __construct()
    {
        parent::__construct();

    }

    public function get_pending_payments()
    {
    	// mark past tution classes as completed 
    	$this->__set_completed_tution_classes();

    	// get data of tution classes which are completed and payment is pending
    	$classes = $this->__get_completed_tution_classes();
    	
    	if ( !empty( $classes ) ) {
    		
                
	    	foreach ($classes as $class) {
	    		
	    		// get data needed to get payment from stripe
	    		$payment_data 	= $this->__get_payment_data( $class );

	    		// response of payment made by stripe
	    		$payment_status = $this->__make_payment_by_stripe( $payment_data );

	    		// set schedule payment status completed
	    		if ( $payment_status == 1 ) {
                    $student_email_array = array();
                    $payment_data['response'] = $payment_status;
                    $this->__make_payment_log( $payment_data, 1 );

                    //Send Email To Student For Payment
                    $this->__sendEmailToStudent($payment_data);
	    		} else { // keep schedule payment status pending
	    			
	    			$payment_data['response'] = json_encode( array_filter($payment_status) );
	    			$this->__make_payment_log( $payment_data, 0 );
	    		}

	    	} // ends foreach
    	} // ends if is not empty
    
    } // ends function get_pending_payments

    function __set_completed_tution_classes()
    {
    	// current date time unix timestamp
    	$current_Unix 	= date( 'U', strtotime(date('Y-m-d H:i:s')) );
    	
    	$where 	= 	array(	'schedules.end <' => $current_Unix, 'schedule_status' => CLASS_SCHEDULED );

    	$this->db->where( $where );
    	$this->db->update( 'schedules', array( 'schedule_status' => CLASS_COMPLETED ) );
    	
    }

    function __get_completed_tution_classes()
    {	
    
    	$where 	= 	array(	'schedules.schedule_status' => CLASS_COMPLETED,
    											'schedules.payment_status' 	=> PAYMENT_PENDING,
    							);

    	// get tutor details, schedule duration in hours for scheduled class
    	$this->db->select( 'schedules.*, (schedules.end - schedules.start)/3600 as duration, tutor_details.tier, usermeta.stripe_customer_id, usermeta.card_ending, tution_requirements.tution_method, users.firstname as student_fname,users.email as student_email, users.lastname as student_lname' );
    	
    	$this->db->from( 'schedules' );

    	// join to get tutor details for hsi rate
    	$this->db->join( 'tutor_details', 'tutor_details.tutor_id = schedules.scheduled_by' );
    	
    	// join to get student details for stripe
    	$this->db->join( 'usermeta', 'usermeta.user_id = schedules.scheduled_for', 'left' );

    	// join to get student details for stripe
    	$this->db->join( 'users', 'users.user_id = schedules.scheduled_for' );

    	// join to get tution type
    	$this->db->join( 'tution_requirements', 'tution_requirements.tr_id = schedules.tution_id' );

    	$this->db->where( $where );

    	return $this->db->get()->result();

    }

    function __get_payment_data($tution)
    {

    	if ( $tution->tier == 1 ) {
    		
    		// $35 price for tier 1 tutor and online tutions
    		// $42 price for tier 1 tutor and Face to Face and consultancy
    		$tutor_rate = $tution->tution_method == ONLINE_TUTION ? 35 : 42;
    		
    	} else { // tier 2

    		// $45 price for tier 2 tutor and online tutions
    		// $55 price for tier 2 tutor and Face to Face and consultancy
    		$tutor_rate = $tution->tution_method == ONLINE_TUTION ? 45 : 55;
    	}

    	$amount = $tution->duration * $tutor_rate;

    	$payment_data = array( 	'amount' => $amount, 
    													'stripe_customer_id' => $tution->stripe_customer_id, 
    													'description' 	=> $tution->title, 
    													'student_name' 	=> $tution->student_fname.' '.$tution->student_lname,
                                                        'student_email' => $tution->student_email,
    													'schedule_id'		=> $tution->schedule_id,
    													'duration'			=> $tution->duration,
    									);

    	return $payment_data;
    }

    function __make_payment_by_stripe( $payment_data )
    {
      require_once(APPPATH.'libraries/Stripe/init.php');
    	// sk_test_YKPDYFVNflbgxtQeIiilDA33
    	// pk_test_xCvzaNQtmFntTG0WnSmKK1NI

    	// Set your secret key: remember to change this to your live secret key in production
			// See your keys here: https://dashboard.stripe.com/account/apikeys
			\Stripe\Stripe::setApiKey("sk_test_YKPDYFVNflbgxtQeIiilDA33");
			
			$error = array();

      try {
			    // Charge the user's card:
					$charge = \Stripe\Charge::create( array(
					  "amount" 			=> $payment_data['amount']*100,
					  "currency" 		=> "gbp",
					  "description" => $payment_data['description'],
					  "metadata" 		=> array("payment_by" => $payment_data['student_name'] ),
					  "customer" 		=> $payment_data['stripe_customer_id'],
					) );

					$success = 1;

			    // success
			    return 1;
			    
			} catch(Stripe_CardError $e) {
			  $error[] = $e->getMessage();
			} catch (Stripe_InvalidRequestError $e) {
			  // Invalid parameters were supplied to Stripe's API
			  $error[] = $e->getMessage();
			} catch (Stripe_AuthenticationError $e) {
			  // Authentication with Stripe's API failed
			  $error[] = $e->getMessage();
			} catch (Stripe_ApiConnectionError $e) {
			  // Network communication with Stripe failed
			  $error[] = $e->getMessage();
			} catch (Stripe_Error $e) {
			  // Display a very generic error to the user, and maybe send
			  // yourself an email
			  $error[] = $e->getMessage();
			} catch (Exception $e) {
			  // Something else happened, completely unrelated to Stripe
			  $error[] = $e->getMessage();
			}

			if ( !isset($success) )
			{
			  return $error;
			} 
   
    }

    function __make_payment_log( $payment_data, $payment_status )
    {

    	if ( $payment_status == 1 ) {
    		// mark payment as reiceived
	    	$this->db->where( 'schedules.schedule_id', $payment_data['schedule_id'] );
	    	$this->db->update( 'schedules', array( 'payment_status' => PAYMENT_RECIEVED ) );
    	}

        $payment_data['duration'] = round($payment_data['duration'],1);
        $payment_data['amount'] = round($payment_data['amount'],1);
    	$transaction_data = array( 	'schedule_id' 					=> $payment_data['schedule_id'],
    															'class_duration' 				=> $payment_data['duration'],
    															'transaction_amount' 		=> $payment_data['amount'],
    															'transaction_response' 	=> $payment_data['response'],
    											);

    	// keep history of transactions
    	$this->db->insert( 'transactions', $transaction_data );

    }


    function __sendEmailToStudent($payment_data){
                $payment_data['duration'] = round($payment_data['duration'],1);
                $payment_data['amount'] = round($payment_data['amount'],1);
                /* Send Email to Student For Payment */
                $config       = Array(
                    'mailtype' => 'html'
                );
                $data         = array(
                    'name' => $payment_data['student_name'],
                    'class_description' => $payment_data['description'],
                    'duration' => $payment_data['duration'],
                    'amount' => $payment_data['amount']
                );
                $data['logo'] = base_url(). 'assets/img/logo.png';
                $data['link'] = base_url();
                $paymentData = $this->load->view('emails/paymentconfirm', $data, TRUE);
                $this->email->initialize($config);
                $this->email->from('team@rostrum.com', 'Rostrum');
                $this->email->to($payment_data['student_email']);
                $this->email->subject('Payment Confirmation');
                $this->email->message($paymentData);
                $this->email->send();

    }
 
}



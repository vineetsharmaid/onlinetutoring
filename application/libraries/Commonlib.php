<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Commonlib {

  function __construct()
  {
      $this->ci =& get_instance();
      $this->ci->load->database();
      // $this->ci->load->library('image_lib');
  }

  public function check_loggedin( $return = '' ) {
      
  		// check if user id is present in session
      if ( !empty( $this->ci->session->userdata('user_id') ) ) {

        // get user information of looged in user
        $user = $this->ci->db->get_where( 'users', array( 'user_id' => $this->ci->session->userdata('user_id') ) )->row();
        
        // redirect to dashboard based on usertype
        $user_type = $user->role == 1 ? 'student' : 'tutor';
        $user_type = $user->role == 3 ? 'admin' : $user_type;
        
        if ( $return == true ) {
      		return 1;
      	} else {
      			
      		redirect( $user_type, 'refresh' );
      	}

        
      } else {

      	if ( $return == true ) {
      		return 0;
      	} else {

      		redirect( 'login', 'refresh' );
      	}
      }
  }


  /* Function to upload files */
    /**
    *
    *   params
    *
    *   path: location where file has to be upoloaded
    *   type: allowed type to be uploaded
    *   file: name of the input file
    *   overide_name: upload by changing the name of the file
    *
    **/
    function upload_uni( $path, $types, $file, $overide_name = '' )
    {
        $config['upload_path']   = $path; 
        $config['allowed_types'] = $types; 
        if ( !empty( $overide_name ) ) 
        {
            $config['file_name']     = $overide_name;
        }

        $this->ci->load->library('upload', $config);

        if ( ! $this->ci->upload->do_upload($file)) 
        {
            $error = array('error' => $this->ci->upload->display_errors()); 
            return $error;
        }

        else 
        { 
            $data = array('upload_data' => $this->ci->upload->data()); 
            return $data;
        } 
    }



    function create_thumb($source)
    {

        $config['image_library']    = 'gd2';
        $config['source_image']     = $source;
        $config['create_thumb']     = TRUE;
        $config['maintain_ratio']   = TRUE;
        $config['width']            = 75;
        $config['height']           = 75;

        // $this->ci->image_lib->clear();
        // $this->ci->image_lib->initialize($config);
        $this->ci->load->library('image_lib', $config);
        if( $this->ci->image_lib->resize() )
        {
            return 1;
        }
        else
        {
             return $this->ci->image_lib->display_errors();
        }
    }

    function create_pro_image($source= './uploads/profile_imgs/profile_img_17.jpg')
    {
        $config['image_library']    = 'gd2';
        $config['source_image']     = $source;
        $config['maintain_ratio']   = false;
        $config['width']            = 400;
        $config['height']           = 400;

        // $this->ci->image_lib->initialize($config);
        $this->ci->load->library('image_lib', $config);
        if( $this->ci->image_lib->resize() )
        {
            $this->ci->image_lib->clear();
            return 1;
        }
        else
        {
            $this->ci->image_lib->clear();
            return $this->ci->image_lib->display_errors();
        }
    }


}
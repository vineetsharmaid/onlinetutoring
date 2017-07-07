<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        error_reporting(0);
        $this->load->model('Home_model');
        $this->load->library('session');
    }
    public function index()
    {
        $this->load->view('layouts/header');
        $this->load->view('home');
        $this->load->view('layouts/footer');
    }
    
    public function logout()
    {
        $this->session->unset_userdata('logged_in');
        redirect('login', 'refresh');
        
    }
    public function email()
    {
    }
    
    public function business_form()
    {
        
        $this->load->view('layouts/header');
        $this->load->view('business-form', $categorys);
        $this->load->view('layouts/footer');
    }
    
    public function getService()
    {
        
        $formid                  = file_get_contents('php://input');
        $mdata['select_service'] = $formid;
        $mdata['category']       = $this->Home_model->get_catgarylist();
        //$mdata['zipcode'] = $_POST['zipcode'];
        //redirect(base_url() . "dashboard");
        //echo $this->load->view('layouts/header');
        $result                  = $this->load->view('layouts/form/' . "fome".$formid, $mdata, true);
        //echo $this->load->view('layouts/footer');
        echo $result;
        die;
        
    }
    //get sub category
    public function getsubcategory()
    {
        $catid  = file_get_contents('php://input');
        $result = $this->Home_model->get_subcategory($catid);
        echo json_encode($result);
        die;
    }
    
    public function submitsupplierform()
    {
        
        $this->load->library('email');
        
        
        /* For Uploading the file*/
        //if(isset($_POST['files']['userfile'])){
        $config['upload_path']   = './uploads/';
        $config['allowed_types'] = 'jpeg|jpg|png|pdf|doc|docx|csv|xls';
        $config['max_size']      = 10000;
        //$config['max_width']            = 3800;
        //$config['max_height']           = 320;
        
        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload('userfile')) {
            //    $error = array('error' => $this->upload->display_errors());
            $data['upload_data']['file_name'] = '';
            //  echo "<pre>";print_r($error);echo "</pre>";die('111');
        } else {
            $data = array(
                'upload_data' => $this->upload->data()
            );
            // echo "<pre>";print_r($data['upload_data']['file_name']);echo "</pre>";die('111');
            // $this->load->view('upload_success', $data);
        }
        
        //}
        
        
        /* Code ends */
        $mdata['service_value']           = $_POST['service_value'];
        $mdata['skill_category']          = $_POST['skill_category'];
        $mdata['itsupport_workplaces']    = $_POST['itsupport_workplaces'];
        $mdata['itsupport_specification'] = $_POST['itsupport_specification'];
        $mdata['project_name']            = $_POST['project_name'];
        $mdata['project_industry']        = $_POST['project_industry'];
        $mdata['project_language']        = $_POST['project_language'];
        
        $mdata['project_desc']            = $_POST['project_desc'];
        $mdata['project_person']          = $_POST['project_person'];
        $mdata['project_time']            = $_POST['project_time'];
        $mdata['Fullname']                = $_POST['Fullname'];
        $mdata['contact']                 = $_POST['contact'];
        $mdata['service_email']           = $_POST['service_email'];
        $mdata['project13']               = $_POST['project13'];
        $mdata['address']                 = $_POST['address'];
        $mdata['zipcode']                 = $_POST['zipcode'];
        $mdata['location']                = $_POST['location'];
        $mdata['sublocation']             = $_POST['sublocation'];
        $mdata['file']                    = $data['upload_data']['file_name'];
       
        $mdata['project_type'] = '';
        //make the project type as string
        if(isset($_POST['project_type'])) {
        	$size = sizeof($_POST['project_type']);
        	foreach($_POST['project_type'] as $key => $value) {
       
        		if(intVal($size - 1) == $key ) {
        			$mdata['project_type'] .= $value;
        		}else {
        			$mdata['project_type'] .= $value . ',';
        		}
        	}
        }

        $result                           = $this->Home_model->submitsupplierform($mdata);
        $latestid                         = $this->db->insert_id();
        if ($result) {
            $this->session->set_flashdata('msg', 'Post Published Successfully');
            /*Email To Admin*/
            $config       = Array(
                'mailtype' => 'html'
            );
            $data         = array(
                'fullname' => $_POST['Fullname'],
                'email' => $_POST['service_email'],
                'latestid' => $latestids
            );
            $data['logo'] = base_url(). 'assets/layouts/layout3/img/logo-default.png';
            $data['link'] = base_url(). '/userprojects/project?email='.$mdata['service_email'].'&id='.$latestid.'';
            $supplierform = $this->load->view('emails/supplerform', $data, TRUE);
            $this->email->initialize($config);
            $this->email->from('team@tiluto.com', 'Tiluto');
            $list = array(
                'parmarth1993@yopmail.com',
                'parthibatman@yopmail.com'
            );
            $this->email->to($list);
            $this->email->subject('Post a Project');
            $this->email->message($supplierform);
            $this->email->send();
            
            redirect(base_url() . "home/thanks?email=" . $_POST['service_email'] . "&id=" . $latestid . "  ");
            
            
        } else {
            $this->session->set_flashdata('msg', 'Error Publihising Post');
            redirect(base_url() . "dashboard");
        }
        //$res = $this->userModel->registerUser($mdata);
    }
    
    
    public function thanks()
    {
        
        
        if (isset($_GET['email'])) {
            $data['email'] = $_GET['email'];
            $data['id']    = $_GET['id'];
            $result        = $this->Home_model->getuserdata($data);
            
            $result[0]['sublocationList'] = $this->Home_model->get_subcategoryList();
            $result[0]['locationList'] = $this->Home_model->get_categoryList();
            
            $this->load->view('layouts/header', $result[0]);
            $this->load->view('thankyou', $result[0]);
            $this->load->view('layouts/footer', $result[0]);
            
        } else {
            
            $this->load->view('layouts/header');
            $this->load->view('thankyou');
            $this->load->view('layouts/footer');
        }
        
    }
    
}

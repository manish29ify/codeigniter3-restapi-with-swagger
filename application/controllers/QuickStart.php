<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QuickStart extends CI_Controller {

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
	public function index(){
		$this->load->view('docs');
	}


	public function help(){
		$this->load->view('startup');
	}

	function validate_name($str){
		//this is redundant, but it's to show you how
		//the content of the fields gets automatically passed to the method
		if ($str == trim($str) && strpos($str, ' ') !== false) {
		$this->form_validation->set_message('validate_name','Space not allowed');
		return FALSE; 
		}
		else
		{
		return TRUE;
		}
	}

	public function generate_controller(){
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('controller_name', 'Controller Name', 'trim|required|callback_validate_name');
		if ($this->form_validation->run() == FALSE){
		$this->load->view('generate_controller');
		}else{
		$data= array("success_message" => "Success");
		$this->load->view('generate_controller',$data);
		if(!is_file("./application/controllers/newfile.php")){
		$txt = "<?php\n ";  
		$txt .= "echo 'something';\n" ;
		$txt .= "?>\n ";
		file_put_contents("./application/controllers/newfile.php", $txt);     
		}
		}
	}

	public function generate_check(){
		$this->load->helper('generate_helper');
		echo "Manish";
		echo get_content('Hello World');
		//    chmod("./application/controllers/somefile.php", 0600);
		// 			$file_name= "foo.php";
		// $path = "/home/sites/php.net/public_html/sandbox/" . $file_name ;
		// $path = "./application/controllers/newfile.php";
		// $user_name = "root";
		// // Set the user
		// chown($path, $user_name);
		// // Check the result
		// $stat = stat($path);
		// print_r(posix_getpwuid($stat['uid']));
	}

	
}

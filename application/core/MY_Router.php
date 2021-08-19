<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Router extends CI_Router {


public function __construct()
{
    parent::__construct();
    $segments=$this->uri->segments;
    if (file_exists(APPPATH.'config/routes.php'))
		{
			include(APPPATH.'config/routes.php');
            if($route['versioning']=== TRUE && preg_match("/^[vV]{1}[0-9.,$;]{1,2}+$/", $segments[1])){
                $this->set_class($segments[2]);
                $this->set_method($segments[3]);
            }
            
		}
}


}
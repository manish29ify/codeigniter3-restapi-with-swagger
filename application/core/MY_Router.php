<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Router extends CI_Router
{


    public function __construct()
    {
        parent::__construct();
        $segments = $this->uri->segments;
        if (file_exists(APPPATH . 'config/routes.php')) {
            include(APPPATH . 'config/routes.php');
            if ($route['versioning'] === TRUE && !empty($segments) && isset($segments[1]) && preg_match("/^[vV]{1}[0-9.,$;]{1,2}+$/", $segments[1]) == 1) {
                $this->set_class($segments[2]);
                if (isset($segments[3]) && !empty($segments[3]) && $segments[3] != "") {
                    $this->set_method($segments[3]);
                }
            } elseif ($route['versioning'] === TRUE && !empty($segments) && isset($segments[1]) && preg_match("/^[vV]{1}[0-9.,$;]{1,2}+$/", $segments[1]) == 0) {
                $data = array(
                    "status" => false,
                    "message" => "Seems like you have enabled api versioning but didn't implement method with versioning",
                    "suggestion" => "Either you can disable versioning from config/routes.php or implement method with versioning like index_v1_" . strtolower($_SERVER['REQUEST_METHOD']),
                );
                if (function_exists('http_response_code')) {
                    http_response_code(404);
                } else {
                    header("HTTP/1.1 404 Method Not Found");
                }
                echo json_encode($data);
                die;
            }
        }
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Router extends CI_Router
{

    public function __construct()
    {
        parent::__construct();
        $this->check_versioning_enabled($this->uri->segments);
    }


    // --------------------------------------------------------------------

    /**
     * check versioning enabled
     *
     * @return	void
     */
    public function check_versioning_enabled($segments)
    {
        # Check for versioning enabled by developer or not
        if (file_exists(APPPATH . 'config/routes.php')) {
            include(APPPATH . 'config/routes.php');
            if ($route['versioning'] === TRUE && !empty($segments) && isset($segments[1]) && preg_match("/^[vV]{1}[0-9.,$;]{1,2}+$/", $segments[1]) == 1) {
                if (isset($segments[2]) && !empty($segments[2]) && $segments[2] != "") {
                    $this->set_class($segments[2]);
                }
                if (isset($segments[3]) && !empty($segments[3]) && $segments[3] != "") {
                    $new_method_name = $segments[3] . "_" . strtolower($segments[1]);
                    $this->set_method($new_method_name);
                    $new_segments = $this->uri->segments;
                    $new_segments[3] = $new_method_name;
                    unset($new_segments[1]);
                    array_unshift($new_segments, NULL);
                    unset($new_segments[0]);
                    $this->uri->segments = $new_segments;
                    $this->uri->rsegments = $new_segments;
                } else {
                    $new_method_name = "index_" . strtolower($segments[1]);
                    $this->set_method($new_method_name);
                }
            }
            # Check for versioning available in URL or not
            elseif ($route['versioning'] === TRUE && !empty($segments) && isset($segments[1]) && preg_match("/^[vV]{1}[0-9.,$;]{1,2}+$/", $segments[1]) == 0) {
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
            # Check for versioning not enable by user and available in URL
            elseif ($route['versioning'] === FALSE && !empty($segments) && isset($segments[1]) && preg_match("/^[vV]{1}[0-9.,$;]{1,2}+$/", $segments[1]) == 1) {
                $data = array(
                    "status" => false,
                    "message" => "Seems like you have not enabled api versioning",
                    "suggestion" => "You can enabled versioning from config/routes.php ",
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

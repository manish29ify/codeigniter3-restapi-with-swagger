<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_content'))
{
    function get_content($var = ''){
        $link = "https://raw.githubusercontent.com/manish29ify/codeigniter3-restapi-with-swagger/generators/new_controller.php";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $link );
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($ch);
        curl_close($ch);
        return strip_tags($data);
    }   
}
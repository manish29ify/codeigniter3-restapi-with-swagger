<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
// $endPoint = "https://jsonplaceholder.typicode.com";
// if (!function_exists('call_api')) {
//     function call_api($method = 'GET', $url = "", $data = "", $var = '')
//     {
//         print_r($GLOBALS['endPoint']);
//         return "ss  " . $GLOBALS['endPoint'];
//     }
// }

class RestMethods
{
    const GET = 'GET';
    const POST = 'POST';
    const PUT = 'PUT';
    const PATCH = 'PATCH';
    const DELETE = 'DELETE';
}
if (!function_exists('CallAPI')) {
    function CallAPI($method, $url, $data = [])
    {
        $url = "https://jsonplaceholder.typicode.com/" . $url;
        switch ($method) {
            case "GET":
                return curl_get($url);
            case "POST":
                return curl_post($url, $data);
            case "PUT":
                return curl_post($url, $data);
            case "PATCH":
                return curl_post($url, $data);
            case "DELETE":
                return curl_post($url, $data);
            default:
                return curl_get($url);
        }
    }


    function curl_get($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        return json_decode($result, true);
    }

    function curl_post($url, $params)
    {
        $post_data = '';
        foreach ($params as $k => $v) {
            $post_data .= $k . '=' . $v . '&';
        }
        rtrim($post_data, '&');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        // curl_setopt($ch, CURLOPT_POST, count($post_data));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result, true);
    }

    function curl_put($url, $params)
    {
        $post_data = '';
        foreach ($params as $k => $v) {
            $post_data .= $k . '=' . $v . '&';
        }
        rtrim($post_data, '&');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        // curl_setopt($ch, CURLOPT_POST, count($post_data));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result, true);
    }


    function curl_patch($url, $params)
    {
        $post_data = '';
        foreach ($params as $k => $v) {
            $post_data .= $k . '=' . $v . '&';
        }
        rtrim($post_data, '&');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        // curl_setopt($ch, CURLOPT_POST, count($post_data));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result, true);
    }


    function curl_delete($url, $params)
    {
        $post_data = '';
        foreach ($params as $k => $v) {
            $post_data .= $k . '=' . $v . '&';
        }
        rtrim($post_data, '&');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        // curl_setopt($ch, CURLOPT_POST, count($post_data));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result, true);
    }
}

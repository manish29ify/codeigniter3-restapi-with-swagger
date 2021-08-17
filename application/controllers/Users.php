<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use chriskacerguis\RestServer\RestController;
class Users extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
    }
/**
 * @OA\Get(
 *     path="/ci_api/index.php/Users",
 *     tags={"Users"},
 *     @OA\Response(response="200", description="Success"),
 *     @OA\Response(response="404", description="Not Found"),
 * )
 */
 public function index_get()
    {
        echo "Hello Get";
    }

    /**
 * @OA\Post(
 *     path="/ci_api/index.php/Users",
 *     tags={"Users"},
 *     @OA\Response(response="200", description="Success"),
 *     @OA\Response(response="404", description="Not Found"),
 * )
 */
     public function index_post()
    {
         // Users from a data store e.g. database
        $users = [
            ['id' => 0, 'name' => 'John', 'email' => 'john@example.com'],
            ['id' => 1, 'name' => 'Jim', 'email' => 'jim@example.com'],
        ];

        $id = $this->get( 'id' );

        if ( $id === null )
        {
            // Check if the users data store contains users
            if ( $users )
            {
                // Set the response and exit
                $this->response( $users, 200 );
            }
            else
            {
                // Set the response and exit
                $this->response( [
                    'status' => false,
                    'message' => 'No users were found'
                ], 404 );
            }
        }
        else
        {
            if ( array_key_exists( $id, $users ) )
            {
                $this->response( $users[$id], 200 );
            }
            else
            {
                $this->response( [
                    'status' => false,
                    'message' => 'No such user found'
                ], 404 );
            }
        }
    }
         public function index_put()
    {
        echo "Hello put";
    }
         public function index_delete()
    {
        echo "Hello delete";
    }
         public function index_patch()
    {
        echo "Hello patch";
    }
}

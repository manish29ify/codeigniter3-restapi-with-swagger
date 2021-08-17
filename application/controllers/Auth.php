<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Auth extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
    }
/**
 * @OA\Get(
 *     path="/Auth/{username}",
 *     tags={"Auth"},
 *   @OA\Parameter(name="username",
 *     in="path",
 *     required=true,
 *     @OA\Schema(type="string")
 *   ),
 *     @OA\Response(response="200", description="Success"),
 *     @OA\Response(response="401", description="Unauthorized"),
 *     @OA\Response(response="404", description="Not Found"),
 *     security={{"api_key": {}}}
 * )
*/
 public function index_get($username="Mai")
    {
        //requestBody={"$ref": "#/components/requestBodies/Pet"},
        // echo "Hello Get";
          $this->response( [
                    'status' => true,
                    'data' => $username,
                    'headers' => $this->input->request_headers(),
                    'message' => 'No such user found'
                ], RestController::HTTP_OK );
    }

    /**
 * @OA\Post(
 *     path="/Auth",
 *     tags={"Auth"},
 *     @OA\RequestBody(
 *         description="Client side search object",
 *         required=true,
 *     ),
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
                // $this->response( $users, 200 );
                $this->response( [
                    'status' => false,
                    'data' => $users,
                    'message' => 'Success'
                ], 200 );
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
} 


<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Auth extends RestController
{

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
    public function index_get($username = "Mai")
    {
        $this->response([
            'status' => true,
            'data' => $username,
            'headers' => $this->input->request_headers(),
            'message' => 'No such user found'
        ], RestController::HTTP_OK);
    }

    /**
     * @OA\Get(
     *     path="/Auth/v1/{username}",
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
    public function index_v1_get($username = "Mai")
    {
        $this->response([
            'status' => true,
            'data' => $username,
            'message' => 'index_v1_get found'
        ], RestController::HTTP_OK);
    }

    /**
     * @OA\Get(
     *     path="/Auth/v2/{username}",
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
    public function index_v2_get($username = "Mai")
    {
        $this->response([
            'status' => true,
            'data' => $username,
            'message' => 'index_v2_get found'
        ], RestController::HTTP_OK);
    }

    /**
     * @OA\Post(
     *     path="/Auth/{id}/{ver}",
     *     tags={"Auth"},
     *     summary="Create list of users with given input array",
     *     operationId="createUsersWithListInput",
     *     @OA\Parameter(name="id",in="path",required=true, @OA\Schema(type="string")),
     *     @OA\Parameter(name="ver",in="path",required=false, @OA\Schema(type="string")),
     *     @OA\Parameter(name="vol",in="header",required=false, @OA\Schema(type="string")),
     *     @OA\Response(response="200", description="Success"),
     *     @OA\Response(response="404", description="Not Found"),
     *     @OA\RequestBody(required=true, @OA\JsonContent(ref="#/components/schemas/Auth")
     * )
     * )
     */
    public function index_post()
    {

        $this->load->model("AuthModel");
        $result = $this->AuthModel->login($this->post());
        if ($result != 0) {
            $this->response([
                'status' => true,
                'message' => 'Login Success'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Login Unsuccess'
            ], RestController::HTTP_OK);
        }
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Auth extends RestController
{

    function __construct()
    {
        parent::__construct();
    }


    /**
     * @OA\Post(
     *     path="/v1/Auth/{username}",
     *     tags={"Auth"},
     *   @OA\Parameter(name="username",
     *     in="path",
     *     required=true,
     *     @OA\Schema(type="string")
     *   ),
     *    @OA\Response(response="200", description="Success"),
     *    @OA\Response(response="401", description="Unauthorized"),
     *    @OA\Response(response="404", description="Not Found"),
     *    @OA\RequestBody(
     *      required=true,
     *      @OA\MediaType(mediaType="application/json",
     *       @OA\Schema(
     *          @OA\Property(property="email",description="Login Email.",type="string"),
     *          @OA\Property(property="password",description="Login Password.",type="string"),
     *        ),
     *       ),
     *      ),
     *    security={{"api_key": {}}},
     * )
     */
    public function index_v1_post($username = "Mai")
    {
        $this->response([
            'status' => true,
            'data' => $username,
            'get' => $this->post(),
            'message' => 'index_v1_get found'
        ], RestController::HTTP_OK);
    }
}

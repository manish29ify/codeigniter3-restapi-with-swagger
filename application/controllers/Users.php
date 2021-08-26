<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends RestController
{

    /**
     * @OA\Tag(
     *     name="Users",
     *     description="Users APIs",
     * )
     * 
     * Get    200,400,404,422
     * Post   200,201,202,400,404,422
     * Put    200,202,204,400,404,422
     * Patch  200,204,400,404,422
     * Delete 200,204,400,404,422
     * 
     * 200  OK
     * 201  Created
     * 202  Accepted
     * 204  No Content
     * 400  Bad Request
     * 401  Unauthorized
     * 404  Not Found
     * 422  Unprocessable Entity
     */


    /**
     * @OA\Get(
     *     path="/users",
     *     tags={"Users"},
     *     deprecated=false,
     *     summary="Get Logged in user details",
     *     description="This can only be done by the logged in user.",
     *     operationId="",
     *     @OA\Parameter(name="username",in="query",required=true,@OA\Schema(type="string")),
     *     @OA\Parameter(name="password",in="query",required=false,@OA\Schema(type="string",)),
     *     @OA\Response(response="200", description="Success"),
     *     @OA\Response(response=400, description="Invalid username/password supplied"),
     *     @OA\Response(response="401", description="Unauthorized"),
     *     @OA\Response(response="404", description="Not Found"),
     *     @OA\Response(response="422", description="Unprocessable Entity"),
     *     security={{"api_key": {}}}
     * )
     */
    // 200,400,404,422
    public function index_get()
    {
        $this->response([
            'status' => true,
            'headers' => $this->input->request_headers(),
            'message' => $this->request->method . ' Method Called'
        ], RestController::HTTP_OK);
    }


    /**
     * @OA\Post(
     *     path="/users",
     *     tags={"Users"},
     *     deprecated=false,
     *     summary="Create user",
     *     description="This can only be done by the logged in user.",
     *     operationId="",
     *     @OA\Response(response="200", description="Success"),
     *     @OA\Response(response="201", description="Created"),
     *     @OA\Response(response="202", description="Accepted"),
     *     @OA\Response(response=400, description="Invalid username/password supplied"),
     *     @OA\Response(response="401", description="Unauthorized"),
     *     @OA\Response(response="404", description="Not Found"),
     *     @OA\Response(response="422", description="Unprocessable Entity"),
     *     @OA\RequestBody(description="Create user object",required=true,
     *         @OA\JsonContent(ref="#/components/schemas/User")),
     *     @OA\RequestBody(required=true,@OA\MediaType(
     *     mediaType="application/json",@OA\Schema(
     *      @OA\Property(property="email",description="Email address.",type="string"),
     *      ),
     *      ),
     *     ),
     *     security={{"api_key": {}}}
     * )
     */
    //200,201,202,400,404,422
    public function index_post()
    {
        $this->response([
            'status' => true,
            'headers' => $this->input->request_headers(),
            'message' => 'No such user found'
        ], RestController::HTTP_OK);
    }

    /**
     * @OA\Put(
     *     path="/users",
     *     tags={"Users"},
     *     deprecated=false,
     *     summary="Update Full Data",
     *     description="This can only be done by the logged in user.",
     *     operationId="",
     *     @OA\Response(
     *         response=200,description="successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/User"),
     *     ),
     *     @OA\Response(response="202", description="Accepted"),
     *     @OA\Response(response="204", description="No Content"),
     *     @OA\Response(response=400, description="Invalid username/password supplied"),
     *     @OA\Response(response="401", description="Unauthorized"),
     *     @OA\Response(response="404", description="Not Found"),
     *     @OA\Response(response="422", description="Unprocessable Entity"),
     *     @OA\RequestBody(@OA\JsonContent(
     *     @OA\Property(property="email",description="Email address.",type="string"),
     *     @OA\Property(property="pass",description="Password.",type="string"),
     *     ),
     *     ),
     *     security={{"api_key": {}}}
     * )
     */
    // 200,202,204,400,404,422
    public function index_put()
    {
    }




    /**
     * @OA\Patch(
     *     path="/users/{username}",
     *     tags={"Users"},
     *     deprecated=false,
     *     summary="Update User Small Data",
     *     description="This can only be done by the logged in user.",
     *     operationId="",
     *     @OA\Parameter(name="username",in="path",required=true,@OA\Schema(type="string")),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/User")),
     *         @OA\XmlContent(type="array",@OA\Items(ref="#/components/schemas/User")),
     *     ),
     *     @OA\Response(response="204", description="No Content"),
     *     @OA\Response(response=400, description="Invalid username/password supplied"),
     *     @OA\Response(response="401", description="Unauthorized"),
     *     @OA\Response(response="404", description="Not Found"),
     *     @OA\Response(response="422", description="Unprocessable Entity"),
     *     security={{"api_key": {}}}
     * )
     */
    // 200,204,400,404,422
    public function index_patch()
    {
    }


    /**
     * @OA\Delete(
     *     path="/users/{username}",
     *     tags={"Users"},
     *     deprecated=false,
     *     summary="Delete User",
     *     description="This can only be done by the logged in user.",
     *     operationId="",
     *     @OA\Parameter(name="username",in="path",required=true,@OA\Schema(type="string"),
     *         description="The name that needs to be deleted"),
     *     @OA\Response(response="200", description="Success"),
     *     @OA\Response(response="204", description="No Content"),
     *     @OA\Response(response=400, description="Invalid username/password supplied"),
     *     @OA\Response(response="401", description="Unauthorized"),
     *     @OA\Response(response="404", description="Not Found"),
     *     @OA\Response(response="422", description="Unprocessable Entity"),
     *     security={{"api_key": {}}}
     * )
     */
    // 200,204,400,404,422
    public function index_delete()
    {
    }



    /**
     * @OA\Post(
     *     path="/users/urlEncodedForm",
     *     tags={"Users"},
     *     deprecated=false,
     *     summary="Delete User",
     *     description="This can only be done by the logged in user.",
     *     operationId="",
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input"
     *     ),
     *     security={
     *         {"petstore_auth": {"write:pets", "read:pets"}}
     *     },
     *     @OA\RequestBody(
     *         description="Input data format",
     *         @OA\MediaType(
     *             mediaType="application/x-www-form-urlencoded",
     *             @OA\Schema(
     *                 type="object",
     *                 @OA\Property(
     *                     property="name",
     *                     description="Updated name of the pet",
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     property="status",
     *                     description="Updated status of the pet",
     *                     type="string"
     *                 )
     *             )
     *         )
     *     )
     * )
     */
    public function urlEncodedForm_post()
    {
    }



    /**
     * @OA\Post(
     *  path="/users/uploadfile",
     *     tags={"Users"},
     *     deprecated=false,
     *     summary="Delete User",
     *     description="This can only be done by the logged in user.",
     *     operationId="",
     *     @OA\RequestBody(required=true,
     *      @OA\MediaType(mediaType="multipart/form-data",
     *          @OA\Schema(@OA\Property(description="Binary content of file",
     *            property="image",type="string",format="binary"),
     *              required={"image"}
     *          )
     *      )
     *  ),
     *  @OA\Response(
     *      response=200, description="Success",
     *      @OA\Schema(type="string")
     *  ),
     * security={{"api_key": {}}}
     * )
     */
    public function uploadfile_post()
    {
        print_r($_FILES);
    }
}

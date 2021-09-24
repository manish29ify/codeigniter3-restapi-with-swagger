<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Misc extends RestController
{

    /**
     * @OA\Tag(
     *     name="Misc",
     *     description="Misc APIs",
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
     * @OA\Post(
     *  path="/v1/misc/single",
     *     tags={"Misc"},
     *     deprecated=false,
     *     summary="Single File Upload Example",
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
    public function single_v1_post()
    {
        print_r($_FILES);
    }


    /**
     * @OA\Post(
     *  path="/v1/misc/multiple",
     *     tags={"Misc"},
     *     deprecated=false,
     *     summary="Miltiple File Upload Example",
     *     description="This can only be done by the logged in user.",
     *     operationId="",
     *     @OA\RequestBody(
     *       @OA\MediaType(mediaType="multipart/form-data",@OA\Schema(type="object",
     *          @OA\Property(property="images[]",type="array",@OA\Items(type="string",format="binary")),
     *           ),
     *       )
     *    ),
     *    @OA\Response(
     *      response=200, description="Success",
     *      @OA\Schema(type="string")
     *  ),
     * security={{"api_key": {}}}
     * )
     */
    public function multiple_v1_post()
    {
        print_r($_FILES);
    }


    public function index_v1_get()
    {
        $this->load->helper("rest_helper");
        $dd = CallAPI(RestMethods::GET, "users");
        echo $dd;
    }





    /**
     * @OA\Post(
     *     path="/v1/misc/urlEncodedForm",
     *     tags={"Misc"},
     *     deprecated=false,
     *     summary="URL Encoded Form Example",
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
     *            mediaType="application/x-www-form-urlencoded",
     *            @OA\Schema(type="object",
     *             @OA\Property(property="name",description="Name",type="string"),
     *             @OA\Property(property="status",description="Status",type="string")
     *             )
     *         )
     *     )
     * )
     */
    public function urlEncodedForm_v1_post()
    {
        print_r($this->post());
    }



    /**
     * @OA\Post(
     *  path="/v1/misc/multipartFormWithFile",
     *     tags={"Misc"},
     *     deprecated=false,
     *     summary="Single File Upload Example",
     *     description="This can only be done by the logged in user.",
     *     operationId="",
     *     @OA\RequestBody(required=true,
     *      @OA\MediaType(mediaType="multipart/form-data",
     *        @OA\Schema(
     *          @OA\Property(property="name",type="string"),
     *          @OA\Property(property="surname",type="string"),
     *          @OA\Property(property="age",type="string"),
     *          @OA\Property(property="mobile",type="string"),
     *          @OA\Property(property="image",type="string",format="binary"),
     *          required={"name","surname","image"}
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
    public function multipartFormWithFile_v1_post()
    {
        print_r($_FILES);
        print_r($this->post());
    }
}

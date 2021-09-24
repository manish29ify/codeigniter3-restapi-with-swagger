<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SilentController extends RestController
{

    /**
     * @OA\Tag(
     *     name="Silent",
     *     description="Silent APIs, it doesn`t contain controller name we can call it directly via      method name",
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
     *     path="/v1/userByID/{id}",
     *     tags={"Silent"},
     *     deprecated=false,
     *     summary="Get all users list",
     *     description="This can only be done by the logged in user.",
     *     operationId="",
     *     @OA\Parameter(name="id",in="path",required=false,@OA\Schema(type="string")),
     *     @OA\Response(response=400, description="Invalid username/password supplied"),
     *     @OA\Response(response="401", description="Unauthorized"),
     *     @OA\Response(response="404", description="Not Found"),
     *     @OA\Response(response="422", description="Unprocessable Entity"),
     *     @OA\Response(response=200,description="Success",
     *     @OA\JsonContent(
     *       @OA\Property(property="status", type="boolean"),
     *       @OA\Property(property="message", type="string"),
     *       @OA\Property(property="data", ref="#/components/schemas/User")
     *        )
     *     ),
     *     security={{"api_key": {}}}
     * )
     */
    // 200,400,404,422
    public function userByID_v1_get($id = 0)
    {
        $url = "users/" . $id;
        $this->load->helper("rest_helper");
        $res = CallAPI(RestMethods::GET, $url);
        if ($res) {
            $data = $this->get('id') ? [$res] : $res;
            $this->response([
                'status' => true,
                'message' => " records found.",
                'data' => $data
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => "Data Not Found"
            ], RestController::HTTP_INTERNAL_ERROR);
        }
    }


    /**
     * @OA\Get(
     *     path="/v1/users",
     *     tags={"Silent"},
     *     deprecated=false,
     *     summary="Get all users list",
     *     description="This can only be done by the logged in user.",
     *     operationId="",
     *     @OA\Response(response=400, description="Invalid username/password supplied"),
     *     @OA\Response(response="401", description="Unauthorized"),
     *     @OA\Response(response="404", description="Not Found"),
     *     @OA\Response(response="422", description="Unprocessable Entity"),
     *     @OA\Response(response=200,description="Success",
     *     @OA\JsonContent(
     *       @OA\Property(property="status", type="boolean"),
     *       @OA\Property(property="message", type="string"),
     *       @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/User"))
     *        )
     *     ),
     *     security={{"api_key": {}}}
     * )
     */
    // 200,400,404,422
    public function users_v1_get()
    {
        $this->load->helper("rest_helper");
        $res = CallAPI(RestMethods::GET, "users/");
        if ($res) {
            $data = $this->get('id') ? [$res] : $res;
            $this->response([
                'status' => true,
                'message' => " records found.",
                'data' => $data
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => "Data Not Found"
            ], RestController::HTTP_INTERNAL_ERROR);
        }
    }
}

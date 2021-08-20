<?php

/**
 * @license Apache 2.0
 */

namespace Auth;

/**
 * Class User
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="Auth model",
 *     description="Auth model",
 * )
 */
class Auth
{
    /**
     * @OA\Property(
     *     description="Username",
     *     title="Username",
     * )
     *
     * @var string
     */
    private $username;

    /**
     * @OA\Property(format="int64", description="Password", title="Password", maximum=255)
     * @var string
     */
    private $password;
}

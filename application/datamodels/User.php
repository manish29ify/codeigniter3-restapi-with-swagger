


<?php

/**
 * @OA\Schema(
 *     title="User model",
 *     description="User model",
 * )
 */

class User
{
    /**
     * @OA\Property(format="int64",description="User ID",title="User ID")
     * @var integer
     */
    public $id; //int

    /**
     * @OA\Property(property="name",description="Post Title", title="Title")
     * @var string
     */
    public $name; //String

    /**
     * @OA\Property(property="username",description="Post Title", title="Title")
     * @var string
     */
    public $username; //String

    /**
     * @OA\Property(property="email",description="Post Title", title="Title")
     * @var string
     */
    public $email; //String

    /**
     * @OA\Property(property="address", type="object", ref="#/components/schemas/Address")
     * @var string
     */
    public $address; //Address

    /**
     * @OA\Property(property="phone",description="Post Title", title="Title")
     * @var string
     */
    public $phone; //String

    /**
     * @OA\Property(property="website",description="Post Title", title="Title")
     * @var string
     */
    public $website; //String

    /**
     * @OA\Property(property="company", type="object", ref="#/components/schemas/Company")
     * @var object
     */
    public $company; //Company

}

/**
 * @OA\Schema(
 *     title="Geo model",
 *     description="Geo model",
 * )
 */
class Geo
{
    /**
     * @OA\Property(property="lat",description="Post Title", title="Title")
     * @var string
     */
    public $lat; //String

    /**
     * @OA\Property(property="String",description="Post Title", title="Title")
     * @var string
     */
    public $lng; //String

}

/**
 * @OA\Schema(
 *     title="Address model",
 *     description="Address model",
 * )
 */
class Address
{
    /**
     * @OA\Property(property="street",description="Post Title", title="Title")
     * @var string
     */
    public $street; //String

    /**
     * @OA\Property(property="suite",description="Post Title", title="Title")
     * @var string
     */
    public $suite; //Date

    /**
     * @OA\Property(property="city",description="Post Title", title="Title")
     * @var string
     */
    public $city; //String

    /**
     * @OA\Property(property="zipcode",description="Post Title", title="Title")
     * @var string
     */
    public $zipcode; //String

    /**
     * @OA\Property(property="geo", type="object", ref="#/components/schemas/Geo")
     * @var object
     */
    public $geo; //Geo

}

/**
 * @OA\Schema(
 *     title="Company model",
 *     description="Company model",
 * )
 */
class Company
{
    /**
     * @OA\Property(property="name",description="Post Title", title="Title")
     * @var string
     */
    public $name; //String

    /**
     * @OA\Property(property="catchPhrase",description="Post Title", title="Title")
     * @var string
     */
    public $catchPhrase; //String

    /**
     * @OA\Property(property="bs",description="Post Title", title="Title")
     * @var string
     */
    public $bs; //String

}

<?php

/**
 * @OA\Schema(
 *     title="Post model",
 *     description="Post model",
 * )
 */
class Post
{
    /**
     * @OA\Property(format="int64",description="User ID",title="User ID")
     * @var integer
     */
    private $userId;

    /**
     * @OA\Property(format="int64",description="ID",title="ID")
     * @var integer
     */
    private $id;

    /**
     * @OA\Property(description="Post Title", title="Title")
     * @var string
     */
    private $title;

    /**
     * @OA\Property(description="Post Body",title="Body")
     * @var string
     */
    private $body;
}

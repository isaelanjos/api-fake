<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 * @package App
 * This class it's only example to filter properties when execute actions with database interactions or proxy transitions
 */
class Post extends Model
{
    protected $fillable = array(
        'userId',
        'title',
        'body',
        'comments'
    );
}

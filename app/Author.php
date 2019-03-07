<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Author
 * @package App
 * This class it's only example to filter properties when execute actions with database interactions or proxy transitions
 */
class Author extends Model
{
    protected $fillable = array(
        'name',
        'username',
        'email',
        'address',
        'phone',
        'website',
        'company'
    );
}

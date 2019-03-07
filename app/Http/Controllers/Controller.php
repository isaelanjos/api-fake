<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function index()
    {
        return "Hi, i am index page :)";
    }

    public function helloWorld()
    {
        return "Hello World";
    }

    public function appVersionNumber()
    {
        return API_VERSION_NUMBER;
    }
}

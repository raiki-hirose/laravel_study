<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return "Hello world, ".date("Y/m/j(D) Ah:i:s");
    }
}

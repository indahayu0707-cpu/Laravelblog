<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class UserController extends Controllers
{
    public function index()
    {
        return 'Daftar User';
    }
    public function show($id)
    {
        return 'Detail id user'.$id;
    }
}
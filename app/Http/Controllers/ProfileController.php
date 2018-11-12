<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return 'Hello';
    }

    public function showID($id)
    {
        return $id;
    }

    public function list()
    {
        // 使用 view
        return view('test');
    }
}

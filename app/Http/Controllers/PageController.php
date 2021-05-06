<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){

        $item=User::all();
        return view('includes.navbar',compact('item'));

    }
}

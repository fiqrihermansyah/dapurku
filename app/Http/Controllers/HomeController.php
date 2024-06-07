<?php

namespace App\Http\Controllers;
use App\Models\Resep;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard(){
        $reseps = Resep::all();
        return view('home/dashboard',compact('reseps'));
    }

    public function detailmenu(){
        return view('home/detailmenu');
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

  public function __construct(){
    return $this->middleware('web');
  }

  public function dashboard(){
    
    return view('layouts.main');
  }

  public function noPermission(){
    return redirect()->back();
  }
}

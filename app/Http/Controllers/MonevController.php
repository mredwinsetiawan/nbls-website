<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Research;
use Auth;
use App\Monev;

class MonevController extends Controller
{

  public function index($id)
  {
    $research = Research::find($id);
    
    return view('researches.monevs')
    ->withResearch($research);
  }

  public function advisorindex($id)
  {
    $research = Research::find($id);

    return view('monevs.advisorindex')
    ->withResearch($research);
  }

  public function store(Request $request, $id)
  {
    $research = Research::find($id);

    $monev = new Monev;
    $monev->title = $request->title;
    if ($request->hasFile('monev_url')) {
      $file = $request->file('monev_url');
      $filename = time() . '.' . $file->getClientOriginalExtension();
      $location = public_path('file/research/monev');
      $file->move($location , $filename);

      $monev->monev_url = $filename;
    }

    $monev->description = $request->description;
    $monev->author_id = Auth::user()->id;
    $monev->research_id = $research->id;

    $monev->save();

    return redirect()->back();
  }

  public function monev()
  {
    $monevs = Monev::all();

    return view('monevs.index')
    ->withMonevs($monevs);
  }

  public function approveMonev($id)
  {
    $monev = Monev::find($id);
    $monev->approved = true;
    $monev->save();

    return redirect()->back();
  }

  public function unapproveMonev($id)
  {
    $monev = Monev::find($id);
    $monev->approved = false;
    $monev->save();

    return redirect()->back();
  }
}

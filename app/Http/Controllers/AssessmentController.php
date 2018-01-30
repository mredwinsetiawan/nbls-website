<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Research;
use App\Assessment;
use Auth;

class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $researches = Research::where('reviewer_id', Auth::id())->get();

      return view('assessments.list')->withResearches($researches);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
      $assessment = Assessment::find($id);
      $assessment->clarity = $request->clarity;
      $assessment->quality = $request->quality;
      $assessment->feasible = $request->feasible;
      $assessment->outcome = $request->outcome;
      $assessment->research_id = $request->research_id;
      $assessment->author = Auth::id();

      $assessment->save();
      $research = Research::find($assessment->research->id);
      $research->granted = true;
      $research->save();

      return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $research = Research::find($id);
      $assessment = Assessment::find($research->assessment->id);

      return view('assessments.index')->withResearch($research)->withAssessment($assessment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

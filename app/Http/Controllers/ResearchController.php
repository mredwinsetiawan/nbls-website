<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Research;
use Auth;
use App\User;
use App\Comment;
use App\Assessment;
use Storage;
class ResearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function all()
     {
       $researches = Research::all();

       return view('researches.allresearch')
       ->withResearches($researches);
     }


     public function index()
     {
       // $researches = Research::where('author', Auth::id())->get();
       $researches = Research::where('granted', false)->get();
       $reviewers = User::where('role_id', '3')->get();

       return view('researches.index')
       ->withResearches($researches)
       ->withReviewers($reviewers);
     }

     public function administrator()
     {
       // $researches = Research::where('author', Auth::id())->get();
       $researches = Research::where('approved', true)->get();

       return view('researches.administratorresearch')
       ->withResearches($researches);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $custom_date_format = date("Y-m-d", strtotime($request->date));
      $research = new Research;
      $research->title = $request->title;
      if ($request->hasFile('file')) {
        $file = $request->file('file');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $location = public_path('file/research/');
        $file->move($location , $filename);

        $research->file = $filename;
      }

      $research->cost = $request->cost;
      $research->date = $custom_date_format;
      $research->abstract = $request->abstract;
      $research->author_id = Auth::id();
      $research->reviewer_id = 3;

      $research->save();


      $assessment = new Assessment;
      // $assessment->clarity = $request->clarity;
      // $assessment->quality = $request->quality;
      // $assessment->feasible = $request->feasible;
      // $assessment->outcome = $request->outcome;
      $assessment->research_id = $research->id;
      $assessment->author = Auth::id();

      $assessment->save();

      return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, User $user)
    {
      // $research = Research::find($id);
      // if (Auth::user()->id == $research->user_id) {
      //   $author = User::find($research->author);
      //   $comments = Comment::where('research_id', $id)->orderBy('created_at', 'desc')->get();
      //   $comment_id = Comment::where('author', $id)->get();
      //
      //   return view('researches.show')
      //   ->withResearch($research)
      //   ->withAuthor($author)
      //   ->withComments($comments);
      // }
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
      $custom_date_format = date("Y-m-d", strtotime($request->date));
      $research = Research::find($id);
      $research->title = $request->title;
      if ($request->hasFile('file')) {
        if ($research->file != null) {
          unlink('file/research/'.$research->file);
        }
        $file = $request->file('file');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $location = public_path('file/research/');
        $file->move($location , $filename);

        $research->file = $filename;
      }

      $research->cost = $request->cost;
      $research->date = $custom_date_format;
      $research->abstract = $request->abstract;
      $research->author_id = Auth::id();

      $research->save();

      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $research = Research::find($id);

      if ($research->file != null) {
        unlink('file/research/'.$research->file);
      }

      $research->delete();

      return redirect()->back();
    }

    public function me(){
      $researches = Research::where('author_id', Auth::id())->get();
      $users = User::all();

      return view('researches.me')
      ->withResearches($researches)
      ->withUsers($users);
    }

    public function advisor(){
      $researches = Research::all();
      $users = User::all();

      return view('researches.advisor')
      ->withResearches($researches)
      ->withUsers($users);
    }

    public function addmember($id){
      $research = Research::find($id);
      $users = User::all();

      return view('researches.addmember')
      ->withResearch($research)
      ->withUsers($users);
    }

    public function addingmember(Request $request, $id){
      $research = Research::find($id);
      $user_id = $request->user_id;

      $research->members()->attach($user_id);

      return redirect()->back();
    }

    public function removemember(Request $request, $id){
      $research = Research::find($id);
      $user_id = $request->user_id;

      $research->members()->detach($user_id);

      return redirect()->back();
    }

    public function detail($id, Research $research)
    {
      // $this->authorize('owner', $research);
      $research = Research::find($id);
      $comments = Comment::where('research_id', $id)->orderBy('created_at', 'desc')->get();
      $comment_id = Comment::where('author', $id)->get();

      return view('researches.show')
      ->withResearch($research)
      ->withComments($comments);

    }

    public function advisordetail($id, Research $research)
    {
      $research = Research::find($id);
      $author = User::find($research->author);
      $comments = Comment::where('research_id', $id)->orderBy('created_at', 'desc')->get();
      $comment_id = Comment::where('author', $id)->get();

      return view('researches.advisorshow')
      ->withResearch($research)
      ->withAuthor($author)
      ->withComments($comments);

    }

    public function administratordetail($id, Research $research)
    {
      $research = Research::find($id);
      $author = User::find($research->author);
      $comments = Comment::where('research_id', $id)->orderBy('created_at', 'desc')->get();
      $comment_id = Comment::where('author', $id)->get();

      return view('researches.advisorshow')
      ->withResearch($research)
      ->withAuthor($author)
      ->withComments($comments);

    }

    public function selectReviewer(Request $request, $id){

      $research = Research::find($id);

      $research->reviewer_id = $request->reviewer_id;

      $research->save();

      return redirect()->back();
    }

    public function advisorSeeMember($id)
    {
      $research = Research::find($id);
      $users = User::all();

      return view('monevs.advisorseemember')
      ->withResearch($research)
      ->withUsers($users);
    }

    public function approveResearch($id)
    {
      $research = Research::find($id);
      $research->approved = true;
      $research->save();

      return redirect()->back();
    }

    public function unapproveResearch($id)
    {
      $research = Research::find($id);
      $research->approved = false;
      $research->save();

      return redirect()->back();
    }

}

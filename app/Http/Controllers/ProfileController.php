<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Research;
use App\User;
use App\Comment;
use Image;

class ProfileController extends Controller
{

  public function index(){
    $user = Auth::user();

    return view('profile.index')->withUser($user);

  }

  public function edit(){
    $user = Auth::user();

    return view('profile.edit')->withUser($user);

  }

  public function update(Request $request){
    $user = Auth::user();

    $user->name = $request->name;
    $user->email = $user->email;
    $user->nip = $request->nip;
    $user->pob = $request->pob;
    $user->dob = $request->dob;
    $user->gender = $request->gender;
    $user->married = $request->married;
    $user->religion = $request->religion;
    $user->golongan = $request->golongan;
    $user->pt = $request->pt;
    $user->pt_address = $request->pt_address;
    $user->pt_telephone = $request->pt_telephone;
    $user->address = $request->address;
    $user->telephone = $request->telephone;

    $user->save();

    return redirect()->route('me');
  }

  public function dashboard(){
    $research = Research::where('author', Auth::id())->first();
    $author = User::find($research->author);
    $comments = Comment::where('research_id', $research->id)->get();
    $comment_id = Comment::where('author', $research->author)->get();


    return view('profile.dashboard')
    ->withResearch($research)
    ->withAuthor($author);
  }

  public function changeImage(Request $request){
    $user = Auth::user();
    if($request->hasFile('image')){
      if ($user->image != null) {
        unlink('images/'.$user->image);
      }
      $image = $request->file('image');
      $filename = time() . '.' . $image->getClientOriginalName();
      $path = public_path('images/'.$filename);
      Image::make($image->getRealPath())->save($path);
      $user->image = $filename;
    }

    $user->save();

    return redirect()->back();
  }

  public function changePassword(Request $request)
  {
    $user = User::find(Auth::user()->id);

    $user->password = bcrypt($request->password);
    $user->save();

    return redirect()->back();
  }
}

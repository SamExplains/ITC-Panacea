<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Forum;
use Illuminate\Http\Request;
use Faker\Generator as Faker;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
//      return view('forum.home');
      return redirect()->route('forum.mild');
    }

    public function mild() {
      $total_mild_posts = Forum::all()->where('severity', '=', 'mild');
      return view('forum.mild', ['mild' => $total_mild_posts]);
    }

    public function moderate() {
      $total_moderate_posts = Forum::all()->where('severity', '=', 'moderate');
      return view('forum.moderate', ['moderate' => $total_moderate_posts]);
    }

    public function severe() {
      $total_severe_posts = Forum::all()->where('severity', '=', 'severe');
      return view('forum.severe', ['severe' => $total_severe_posts]);
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
    public function store(Request $request)
    {
        //
    }

  /**
   * Display the specified resource.
   *
   * @param  int $id
   * @param Faker $faker
   * @return \Illuminate\Http\Response
   */
    public function show($id, Faker $faker)
    {
        //
      $forum_details = Forum::findOrFail($id);
      $forum_details->increment('views');
      $forum_comments = Comment::where('forum_id', '=', $id)->get();
      return view('forum.detailed', ['forum_item' => $forum_details,'comments' => $forum_comments, 'faker' => $faker]);
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
   * @param  int $id
   * @param Request $request
   * @return \Illuminate\Http\Response
   */
    public function destroy($id, Request $request)
    {
      Forum::destroy($request->get('id'));
      Comment::where('forum_id', '=', $request->get('id'))->delete();
      return response()->json(['You Sent' => $request->all() ]);
    }
}

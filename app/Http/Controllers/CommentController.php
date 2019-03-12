<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Forum;
use App\PhysicianRecord;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

      $f = Forum::find($request->get('forumId'));
      $f->increment('comments');

      $store = new Comment();
      $store->forum_id = $request->forumId;
      $store->user_id = $request->uid;
      $store->user_name = $request->name;
      $store->user_account_type = $request->utype;
      $store->user_photo = $request->uphoto;
      $store->user_response = $request->replyForm;
      $store->physician_evaluation_score = 0;
      $store->save();
//      return response('Got it 👍');
//      return response()->json(['success', $request->get('replyForm'), 'user' => $request->get('user')] );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
      $f_found = Forum::where('id', '=', $id)->first();
      $f_found->increment('evaluation_score', $request->get('_score'));
      $c_found = Comment::where('id', '=', $request->get('cid'))->first();
      $c_found->increment('physician_evaluation_score', $request->get('_score'));

      /* Insert physician record */
      $p_record = new PhysicianRecord();
      $p_record->forum_id = $id;
      $p_record->comment_id = $request->get('cid');
      $p_record->physician_user_id = $request->get('puid');
      $p_record->physician_evaluation_score = $request->get('_score');
      $p_record->save();
      return response(['Updated']);
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\EventMember;
use App\Profile;
use Auth;


class EventMembersController extends Controller
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
        echo "string";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new EventMember();
        $model->member_id = $request->get('user_id');
        $model->event_id = $request->get('event_id');
        $model->jumlah = $request->get('qty');
        $harga = $request->get('harga') * $request->get('qty');
        $model->harga = $harga;
        $model->save();
         $data =  DB::select("SELECT *, em.harga as total, e.id as event_id FROM events e INNER JOIN event_has_member em on e.id=em.event_id INNER JOIN members m on em.member_id=m.id WHERE m.id =  ".$request->get('user_id')
        );
        return view('member.keranjang', compact('data'));
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $currentuserid = Auth::user()->id;
        $member = Profile::whereuser_id($currentuserid)->firstOrFail();
        $member_id = $member->id;
        $datas = DB::table('event_has_member')->where('event_id', '=', $id)->where('member_id', '=', $member_id)->delete();
        $data =  DB::select("SELECT *, em.harga as total, e.id as event_id FROM events e INNER JOIN event_has_member em on e.id=em.event_id INNER JOIN members m on em.member_id=m.id WHERE m.id =  ".$member_id);
        return view('member.keranjang', compact('data'));
    }
}

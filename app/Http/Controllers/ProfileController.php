<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Profile;

class ProfileController extends Controller
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
         $Model = new Profile();
        $user = $request->get('user_id');
        $nama = $request->get('nama');
        $file = $request->file('foto');
        $filename = $file->getClientOriginalName();
        if(strlen($user) == 1){
            $no_member = "00".$user.substr($nama, 0,1);
        }
        else if(strlen($user) == 2){
            $no_member = "0".$user.substr($nama, 0,1);
        }
        else{
            $no_member = $user.substr($nama, 0,1);
        }
        $Model->no_member = $no_member;
        $Model->name_member = $nama;
        $Model->alamat_member= $request->get('alamat');
        $Model->notelp_member = $request->get('no_telp');
        $Model->nokpt_member = $request->get('no_ktp');
        $Model->user_id = $user;
        $Model->foto = $filename;
        $Model->email = $request->get('email');
        $Model->save();


        $extention = $file->getClientOriginalExtension();
        $path = $file->getRealPath();
        $size = $file->getSize();
        $directory = 'image/members/'.$no_member.'/';
        $file->move($directory, $filename);
        return redirect('/');
        
        
      
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
        //
    }
}

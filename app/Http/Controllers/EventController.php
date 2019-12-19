<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('admin.event.index');

        $events = DB::table('events')->get();
        return view('admin.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Event();
        $model->nama_event = $request->get('nama');
        $model->keterangan_event = $request->get('keterangan');
        $model->alamat_event = $request->get('alamat');
        $model->tangggal_event_mulai= $request->get('mulai');
        $model->tangggal_event_akhir = $request->get('akhir');
        $model->stock = $request->get('stock');
        $model->harga = $request->get('harga');
        
        $file = $request->file('poster');
        $filename = $file->getClientOriginalName();
        $model->poster= $filename;
        
        $model->save();


        $extention = $file->getClientOriginalExtension();
        $path = $file->getRealPath();
        $size = $file->getSize();
        $lastid =$model->id;
        $directory = 'image/event/'.$lastid.'/';
        
        
        $file->move($directory, $filename);
        return redirect('event');               
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Model = Event::whereId($id)->firstOrFail();
        $detail =  DB::select( "SELECT * , em.harga as total, em.created_at as tanggal, m.id as id_member FROM events e INNER JOIN event_has_member em on e.id=em.event_id INNER JOIN members m on em.member_id=m.id WHERE e.id = ".$id);

        return view('admin.event.show',['event'=>$Model], compact('detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Model = Event::whereId($id)->firstOrFail();
        return view('admin.event.edit',['event'=>$Model]);
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
        $model = Event::whereId($id)->firstOrFail();       
        if($request->file('poster') !== null){
            $model->nama_event = $request->get('nama');
            $model->keterangan_event = $request->get('keterangan');
            $model->alamat_event = $request->get('alamat');
            $model->tangggal_event_mulai= $request->get('mulai');
            $model->tangggal_event_akhir = $request->get('akhir');
            $model->stock = $request->get('stock');
            $model->harga = $request->get('harga');            
            $file = $request->file('poster');
            $filename = $file->getClientOriginalName();
            $model->poster= $filename;            
            $model->save();
            $extention = $file->getClientOriginalExtension();
            $path = $file->getRealPath();
            $size = $file->getSize();
            $lastid =$model->id;
            $directory = 'image/event/'.$lastid.'/';                    
            $file->move($directory, $filename);
        }
        else{
            $model->nama_event = $request->get('nama');
            $model->keterangan_event = $request->get('keterangan');
            $model->alamat_event = $request->get('alamat');
            $model->tangggal_event_mulai= $request->get('mulai');
            $model->tangggal_event_akhir = $request->get('akhir');
            $model->stock = $request->get('stock');
            $model->harga = $request->get('harga');           
            $model->save();

        }
        return redirect('event');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Event::whereId($id)->firstOrFail();
        $data->delete();
        return redirect('event');
    }
}

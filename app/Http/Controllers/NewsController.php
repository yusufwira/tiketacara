<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\News;
use App\KategoriBerita;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $news = DB::select("SELECT n.nama_news,n.id,n.created_at,s.name,kb.nama_kat FROM news n INNER JOIN users s on n.user_id=s.id INNER JOIN kategori_berita kb on n.kategori_id = kb.id");
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = DB::table('kategori_berita')->get();
        return view('admin.news.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Model = new News();
        $Model->nama_news = $request->get('judul');
        $Model->keterangan_news = $request->get('keterangan');
        $Model->user_id = $request->get('idusers');
        $Model->kategori_id = $request->get('kat_id');
        $file = $request->file('poster');
        $filename = $file->getClientOriginalName();
        $Model->poster= $filename;
        $Model->save();
        $extention = $file->getClientOriginalExtension();
        $path = $file->getRealPath();
        $size = $file->getSize();
        $lastid =$Model->id;
        $directory = 'image/news/'.$lastid.'/';
        $file->move($directory, $filename);
        return redirect('news');
     
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
        $kategori = DB::table('kategori_berita')->get();
        $Model = News::whereId($id)->firstOrFail();
        return view('admin.news.edit',['news'=>$Model],  compact('kategori'));
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
        $Model = News::whereId($id)->firstOrFail();
        $Model->nama_news = $request->get('judul');
        $Model->keterangan_news = $request->get('keterangan');
        $Model->user_id = $request->get('idusers');
        $Model->kategori_id = $request->get('kat_id');
        $Model->save();
        return redirect('news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DB::select();
        $data->delete();
        return redirect('news');
    }
}

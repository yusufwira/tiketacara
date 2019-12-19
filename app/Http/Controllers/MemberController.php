<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Jumbotron;
use App\Event;
use App\News;
use App\Profile;
use Auth;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jumbotron = DB::table('Jumbotron')->get();
        $event = DB::table('events')->get();
        return view('welcome', compact('jumbotron'), compact('event'));

    }
    public function listEvent()
    {
        $event = DB::table('events')->get();
         return view('member.listevent', compact('event'));

    }

    public function listNews()
    {
        $news = DB::table('news')->join('kategori_berita', 'news.kategori_id', '=', 'kategori_berita.id')->select('news.*', 'kategori_berita.nama_kat')->get();
         return view('member.listnews', compact('news'));
    }

    public function detailevent($id)
    {
        $Model = Event::whereId($id)->firstOrFail();
        $currentuserid = Auth::user()->id;
        $member = Profile::whereuser_id($currentuserid)->firstOrFail();
        $angka = $Model->harga;
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.'); 
        $Model->harga = $hasil_rupiah;       
        $Model->user_id = $member->id;
        return view('member.detailevent',['event'=>$Model],['coba'=>$angka]);
        
    
    }

    public function detailnews($id)
    {
        $Model = News::whereId($id)->firstOrFail();       
        return view('member.detailnews',['news'=>$Model]);        
    }

     public function inputprofile()
    {        
        return view('member.profile');        
    }

    public function keranjang()
    {
        $currentuserid = Auth::user()->id;
        $member = Profile::whereuser_id($currentuserid)->firstOrFail();
        $member_id = $member->id;
        $data =  DB::select("SELECT *, em.harga as total, e.id as event_id FROM events e INNER JOIN event_has_member em on e.id=em.event_id INNER JOIN members m on em.member_id=m.id WHERE m.id =  ".$member_id);
        return view('member.keranjang', compact('data'));    
    }

   
}

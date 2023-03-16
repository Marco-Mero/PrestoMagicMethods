<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function welcome(){

        //La query del video era da rivedere, per questo differisce in questo modo.

        $announcements = Announcement::where('is_accepted', true)->orderBy('created_at','DESC')->take(8)->get();

        return view('welcome',compact('announcements'));
    }
    
    public function categoryShow(Category $category){
        return view('category.show',compact('category'));
    }
    

    public function searchAnnouncement(Request $request)
    {
        $announcements = Announcement::search($request->searched)->where('is_accepted', true)->paginate(10);

        return view('announcement.index', compact('announcements'));

    }

    // TODO trmaun  rotta home del revisore, patch rifiuta e accetta annuncio

    public function test(){
        $announcements = Announcement::where('is_accepted', true)->orderBy('created_at','DESC')->take(6)->get();
        return view('test', compact('announcements'));
    }

    //funzione per settare la lingua
    public function setLanguage($lang)
    {
        session()->put('locale', $lang);
        return redirect()->back();
    }
}

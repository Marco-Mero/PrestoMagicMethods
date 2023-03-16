<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\BecomeRevisor;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index()
    {
        $announcement_to_check = Announcement::where('is_accepted', null)->first();
        return view('revisor.index', compact('announcement_to_check'));
    }

    public function acceptAnnouncement (Announcement $announcement)
    {
        $announcement->setAccepted (true);
        return redirect()->back()->with('message', 'Hai accettato l\'annuncio');
    }

    public function rejectAnnouncement (Announcement $announcement )
    {
        // dd($announcement);

        $toreview =$announcement;
        $toreview->update(['is_accepted'=>false]); 
        $toreview->update(['revisor_id'=>Auth::user()->id]);  
        return redirect()->back()->with('message', 'Hai rifiutato l\'annuncio');
    }

    // La funzione si occupa di ottenere l'ultima revisione effettuata e annullarla.
    //TODO relazione 1 a n revisore annuncio.
    public function undoLastRevision()
    {
        $announcement= Announcement::where('revisor_id',Auth::user()->id)->orderBy('created_at','DESC')->first();
        if($announcement){
            $announcement->update(['is_accepted'=>null]); 
            $announcement->update(['revisor_id'=>null]);   
            return redirect()->back()->with('message', 'Hai annullato l\'ultima revisione');    
        }else
        return redirect()->back()->with('error', 'Non hai ancora effettuato revisioni!');
    }

    public function becomeRevisor(){
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->back()->with('message', 'Il tuo ruolo di revisore sarà convalidato al piu Presto!');
    }
    public function makeRevisor(User $user)
    {
        Artisan::call ('presto:makeUserRevisor',["email"=> $user->email]);
        return redirect()->route('home')->with('message','L\'utente è ora revisore.');
    }
}




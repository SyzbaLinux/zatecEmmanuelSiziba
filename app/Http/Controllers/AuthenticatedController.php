<?php

namespace App\Http\Controllers;

use App\Models\FavouriteAlbum;
use App\Models\FavouriteArtist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;
use Barryvanveen\Lastfm\Lastfm;

class AuthenticatedController extends Controller
{
    public static function dashboard(Lastfm $lastfm)
    {

        $favArtists = FavouriteArtist::where('user_id',auth()->user()->id)->get();
        $favAlbums  = FavouriteAlbum::where('user_id',auth()->user()->id)->get();

        return Inertia::render('Dashboard',[
            'artists' => $favArtists,
            'albums'  => $favAlbums,
        ]);
     }
}

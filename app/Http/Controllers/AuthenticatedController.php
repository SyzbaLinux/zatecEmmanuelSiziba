<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;
use Barryvanveen\Lastfm\Lastfm;

class AuthenticatedController extends Controller
{
    public static function dashboard(Lastfm $lastfm)
    {

        return Inertia::render('Dashboard',[

        ]);
     }


     public function search(Request $request)
     {

     }
}

<?php

namespace App\Http\Controllers;

use App\Models\FavouriteAlbum;
use App\Models\FavouriteArtist;
use Illuminate\Http\Request;
use Inertia\Inertia;
use GuzzleHttp\Client;

class PagesController extends Controller
{
    public function index()
    {
        return Inertia::render('Welcome' );
    }

    public function artists(Request $request)
    {

        if(!$request->search){

            return Inertia::render('Artists');

        }else{

            $client = new Client();

            $key    = env('LASTFM_API_KEY');
            $search = $request->search;

            $response = $client->request('GET', "http://ws.audioscrobbler.com/2.0/?method=artist.search&artist={$search}&api_key={$key}&format=json&limit=300");
            $data = json_decode($response->getBody()->getContents(), true);


            return Inertia::render('Artists',[
                'search'  => $search,
                 'artists' => $data['results']['artistmatches']['artist']
            ]);
        }


    }

    public function albums(Request $request)
    {

        if(!$request->search){

            return Inertia::render('Albums');

        }else{

            $client = new Client();

            $key    = env('LASTFM_API_KEY');
            $search = $request->search;


            $response = $client->request('GET', "https://ws.audioscrobbler.com/2.0/?method=album.search&api_key={$key}&album={$search}&format=json&limit=300");
            $data = json_decode($response->getBody()->getContents(),true);

            return Inertia::render('Albums',[
                'search'  => $search,
                'albums' => $data['results']['albummatches']['album']
            ]);
        }

    }

    public function artistLike(Request $request){
        //check if the user already liked this and remove the like

        $check = FavouriteArtist::where('user_id',auth()->user()->id)
                                ->where('artist_name',$request->name)
                                ->first();
        if($check){
            //remove from list
            $check->delete();
            return back()->with('message',[
                'type'           => 'success',
                'description'    => 'artist removed from favourites',
                'title'          => 'Removed Successfully',
            ]);

        }else{

            //Add artist to favourites
            $favourite = new FavouriteArtist();

            $favourite->user_id     = auth()->user()->id;
            $favourite->artist_name = $request->name;
            $favourite->url         = $request->url;
            $favourite->mbid        = $request->mbid;
            $favourite->image       = $request->image[3]['#text']; //index 3 for large quality
            $favourite->save();

            return back()->with('message',[
                'type'           => 'success',
                'description'    => 'artist added to favourites',
                'title'          => 'Added successfully',
            ]);
        }

    }

    public function albumLike(Request $request){

        //check if the user already liked this and remove the like

        $check = FavouriteAlbum::where('user_id',auth()->user()->id)
            ->where('album_name',$request->name)
            ->first();

        if($check){
            //remove from list
            $check->delete();
            return back()->with('message',[
                'type'           => 'success',
                'description'    => 'Album  removed from favourites',
                'title'          => 'Removed Successfully',
            ]);

        }else{

            //Add artist to favourites
            $favourite = new FavouriteAlbum();

            $favourite->user_id     = auth()->user()->id;
            $favourite->album_name  = $request->name;
            $favourite->url         = $request->url;
            $favourite->mbid        = $request->mbid;
            $favourite->image       = $request->image[3]['#text']; //index 3 for large quality
            $favourite->save();

            return back()->with('message',[
                'type'           => 'success',
                'description'    => 'Album added to favourites',
                'title'          => 'Added successfully',
            ]);
        }
    }
}

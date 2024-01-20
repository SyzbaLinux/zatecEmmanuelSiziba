<?php

namespace App\Http\Controllers;

use App\Models\FavouriteAlbum;
use App\Models\FavouriteArtist;
use Barryvanveen\Lastfm\Lastfm;
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

//        $response = $client->request('GET', "http://ws.audioscrobbler.com/2.0/?method=artist.search&artist={$search}&api_key={$key}&format=json");
//
//        $data = json_decode($response->getBody()->getContents(), true);


            $data = [

                [
                    "name"         => "Adriana Calcanhotto",
                    "listeners"   => "368702",
                    "mbid"        => "bd4d397a-849a-48bf-be24-52eec87feeee",
                    "url"         => "https://www.last.fm/music/Adriana+Calcanhotto",
                    "streamable"  => "0",
                    "image"       =>
                        [
                            [
                                "#text" =>"https://lastfm.freetls.fastly.net/i/u/64s/2a96cbd8b46e442fc41c2b86b821562f.png",
                                "size"  => "medium"
                            ]
                        ]
                ]
            ];

            return Inertia::render('Artists',[
                'search'  => $search,
                'artists' => $data
                //'artists' => $data['results']['artistmatches']['artist']
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

//        $response = $client->request('GET', "http://ws.audioscrobbler.com/2.0/?method=artist.search&artist={$search}&api_key={$key}&format=json");
//
//        $data = json_decode($response->getBody()->getContents(), true);


            $data = [

                [
                    "name"         => "Adriana Calcanhotto",
                    "listeners"   => "368702",
                    "mbid"        => "bd4d397a-849a-48bf-be24-52eec87feeee",
                    "url"         => "https://www.last.fm/music/Adriana+Calcanhotto",
                    "streamable"  => "0",
                    "image"       =>
                        [
                            [
                                "#text" =>"https://lastfm.freetls.fastly.net/i/u/64s/2a96cbd8b46e442fc41c2b86b821562f.png",
                                "size"  => "medium"
                            ]
                        ]
                ]
            ];

            return Inertia::render('Albums',[
                'search'  => $search,
                'albums' => $data
                //'artists' => $data['results']['artistmatches']['artist']
            ]);
        }

    }



    public function artistLike($id){


        //check if the user already liked this and remove the like

        $check = FavouriteArtist::where('user_id',auth()->user()->id)
                                ->where('artist_id',$id)
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

            $favourite->user_id   = auth()->user()->id;
            $favourite->artist_id = $id;
            $favourite->save();

            return back()->with('message',[
                'type'           => 'success',
                'description'    => 'artist added to favourites',
                'title'          => 'Added successfully',
            ]);
        }

    }


    public function albumLike($id){
        //check if the user already liked this and remove the like

        $check = FavouriteAlbum::where('user_id',auth()->user()->id)
            ->where('artist_id',$id)
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

            $favourite->user_id   = auth()->user()->id;
            $favourite->artist_id = $id;
            $favourite->save();

            return back()->with('message',[
                'type'           => 'success',
                'description'    => 'Album added to favourites',
                'title'          => 'Added successfully',
            ]);
        }
    }
}

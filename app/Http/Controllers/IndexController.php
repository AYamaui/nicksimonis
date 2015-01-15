<?php

namespace App\Http\Controllers;

class IndexController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        
    }

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index() {
        $data['series'] = \App\Serie::all();
        return view('index', $data);
    }
    
    public function photos($id){
        $data['serie'] = \App\Serie::findOrFail($id);
        $data['photos'] = $data['serie']->photos;
        return view('photos',$data);
    }

}

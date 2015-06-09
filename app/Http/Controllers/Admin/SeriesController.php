<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\phpFlickr;
use App\Http\Controllers\Controller;
use App\Serie;
use Illuminate\Auth\Guard;
use Illuminate\Http\Request;

class SeriesController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function getIndex() {
        $data['series'] = Serie::with('photos')->get();
        return view('admin.series.index', $data);
    }
    
    public function getDelete($id){
        Serie::deleteSerie($id);
        return redirect('admin/series')->with('message','The serie was succesfully removed');
    }

    public function getPullflickr($type, Guard $auth) {
        $permissions = "read";
        $user = $auth->user();
        $f = new phpFlickr(env('API_KEY'), env('API_SECRET'));
        if ($user->flickr_token == "") {
            $f->auth($permissions, false);
        } else {
            $f->setToken($user->flickr_token);
        }
        Serie::storeFromFlickr($f, $type);
        return redirect('admin/series')->with('message', 'Series was succesfully pulled from flickr.');
    }

    public function getSavetoken(Request $request, Guard $auth) {
        $token = $request->input('frob');
        $f = new phpFlickr(env('API_KEY'), env('API_SECRET'));
        $response = $f->auth_getToken($token);
        $user = $auth->user();
        $user->flickr_token = $response['token']['_content'];
        $user->save();
        return redirect('admin/series')->with('message', 'Account connected to flickr. Pull series again');
    }

}

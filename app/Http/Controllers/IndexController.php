<?php

namespace App\Http\Controllers;

use App\Configuration;
use App\Http\Requests\ContactRequest;
use App\Serie;

class IndexController extends Controller {

    public function __construct() {
        
    }

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index() {
        $data['series'] = Serie::all();
        if ($data['series']->count() > 0) {
            $data['series']->first()->checkUpdate();
        }
        $data['social_links'] = Configuration::getSocialLinks();
        return view('index', $data);
    }

    public function contact(ContactRequest $request) {
        $data = $request->sanitize();
        $data['messageString'] = $request->get('message');
        \Mail::send('emails.contact', $data, function($message) {
            $message->to(Configuration::get('admin_email'), '')
                    ->subject('New message in nicksimonis.co');
        });
        return \Response::json(['message' => 'Thanks for your message.']);
    }

}

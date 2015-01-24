<?php

namespace App\Http\Controllers;

use \App\Http\Requests\ContactRequest;

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
        $data['series']->each(function($serie) {
            $serie->checkUpdate();
        });
        $data['social_links'] = \App\Configuration::getSocialLinks();
        return view('index', $data);
    }

    public function contact(ContactRequest $request) {
        $data = $request->sanitize();
        $data['messageString'] = $request->get('message');
        \Mail::send('emails.contact', $data, function($message) {
            $message->to(\App\Configuration::get('admin_email'), '')
                    ->subject('New message in nicksimonis.co');
        });
        return \Response::json(['message' => 'Thanks for your message.']);
    }

}

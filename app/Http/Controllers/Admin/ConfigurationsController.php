<?php

namespace App\Http\Controllers\Admin;

use App\Configuration;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfigurationsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex()
    {
        $data['configurations'] = Configuration::all();

        return view('admin.configurations.index', $data);
    }

    public function postIndex(Request $request)
    {
        Configuration::updateMany($request->except(['_token']));

        return redirect('admin/configurations')->with('message', 'The configuration was sucessfully updated');
    }

}

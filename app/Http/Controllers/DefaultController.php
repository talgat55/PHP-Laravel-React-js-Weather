<?php

namespace App\Http\Controllers;


class DefaultController extends Controller
{
    /**
     * Home page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('index');
    }

}

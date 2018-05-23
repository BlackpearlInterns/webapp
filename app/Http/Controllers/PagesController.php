<?php

namespace Sprint\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome to Sprint!';
        return view('pages.index')->with('title', $title);
    }
    public function about(){
        $title = 'About Us';
        return view('pages.about')->with('title', $title);
    }
    public function form(){
        $title = 'Laravel Form With Google Sheets API';
        return view('pages.form')->with('title', $title);
    }
}

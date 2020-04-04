<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ViewComposingController;

class HomePageController extends ViewComposingController
{
    public function getHomePage(){
        $this->viewData['meta_title'] = 'Home Page';

//dd('ABC');
        return $this->buildTempalte('home');
        //return \view('index');

    }
}

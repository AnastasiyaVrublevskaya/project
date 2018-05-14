<?php

namespace App\Http\Controllers;
use App\Parse\GoogleNews;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getNews(){
		$obj = new GoogleNews;
		$obj->getParse();
    }
}

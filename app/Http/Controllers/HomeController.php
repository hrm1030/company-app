<?php

namespace App\Http\Controllers;

use illuminate\http\Request;
use App\Models\Item;

class HomeController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('pages.home')->with([
            'items' => $items
        ]);
    }
}

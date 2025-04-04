<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Models\Part;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showHomeView():View
    {
        // パーツ情報を全権取得
        $parts = Part::with(['reviews'])->get();



        return view('app/home',compact('parts'));
    }
}

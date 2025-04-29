<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PartController extends Controller
{
    public function showPartsView() :View
    {
        return view('admin/home');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Part;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PartController extends Controller
{
    public function showPartsView() :View
    {
        $parts = Part::with(['maker','category'])->get();

        return view('admin/parts',compact('parts'));
    }

    public function showPartView(string $part_id):View
    {
        $part = Part::with(['maker','category'])
                ->findOrFail($part_id);

        return view('admin/part',compact('part'));
    }
}

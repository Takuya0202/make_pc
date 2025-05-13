<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MakerRequest;
use App\Models\Maker;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MakerController extends Controller
{
    // 一覧
    public function showMakersView():View
    {
        $makers = Maker::withCount(['parts'])->get();

        return view('admin/makers/index',compact('makers'));
    }

    // 登録ビュー
    public function showCreateView()
    {
        return view('admin/makers/create');
    }

    // 作成
    public function create(MakerRequest $request):RedirectResponse
    {
        Maker::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.part.create');
    }

    // 削除のビュー
    public function deleteMakerView(string $maker_id):View
    {
        $maker = Maker::findOrFail($maker_id);

        return view('admin/makers/delete',compact('maker'));
    }

    // 削除
    public function delete(string $maker_id):RedirectResponse
    {
        $maker = Maker::findOrFail($maker_id);
        $maker->delete();

        return redirect()->route('admin.makers.index');
    }
}

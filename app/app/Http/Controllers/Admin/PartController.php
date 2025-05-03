<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateAndUpdatePartRequest;
use App\Models\Category;
use App\Models\Maker;
use App\Models\Part;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PartController extends Controller
{
    // パーツ一覧
    public function showPartsView() :View
    {
        $parts = Part::with(['maker','category'])->get();

        return view('admin/part/index',compact('parts'));
    }

    // パーツ詳細
    public function showPartView(string $part_id):View
    {
        $part = Part::with(['maker','category'])
                ->findOrFail($part_id);

        return view('admin/part/show',compact('part'));
    }

    // パーツ作成画面
    public function createPartView():View
    {
        $makers = Maker::all();
        $categories = Category::all();

        return view('admin/part/create',compact(
            'makers',
            'categories'
        ));
    }

    // パーツ作成
    public function create(CreateAndUpdatePartRequest $request):RedirectResponse
    {
        // パーツ作成
        $part = Part::create([
            'name' => $request->name,
            'detail' => $request->detail,
            'price' => $request->price,
            'url' => $request->url,
            'category_id' => $request->category_id,
            'maker_id' => $request->maker_id,
            // imageはnullの場合、no-imageをセット
            'image' => $request->hasFile('image') ? $request->file('image')->store('parts' , 'public') : 'images/no-image.png'
        ]);

        return redirect()->route('admin.parts');
    }

    // パーツ編集画面
    public function editPartView(string $part_id):View
    {
        $part = Part::with(['maker','category'])
                ->findOrFail($part_id);
        $makers = Maker::all();
        $categories = Category::all();

        return view('admin/part/edit',compact(
            'part',
            'makers',
            'categories'
        ));
    }

    // パーツ更新
    public function update(string $part_id,CreateAndUpdatePartRequest $request):RedirectResponse
    {
        // 更新するパーツを取得
        $part = Part::findOrFail($part_id);
        // リクエストを連想配列にする
        $data = $request->validated();
        // 画像を更新またはそのままにする。
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('parts','public');
        } else {
            $data['image'] = $part->image;
        }
        // 更新
        $part->update($data);

        return redirect()->route('admin.part' , ['part_id' => $part_id]);
    }

    // 削除確認ページ
    public function deletePartView(string $part_id):View
    {
        $part = Part::findOrFail($part_id);

        return view('admin/part/delete',compact('part'));
    }

    // 削除
    public function delete(string $part_id):RedirectResponse
    {
        $part = Part::findOrfail($part_id);
        $part->delete();

        return redirect()->route('admin.parts');
    }
}

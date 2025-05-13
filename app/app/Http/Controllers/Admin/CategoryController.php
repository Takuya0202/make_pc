<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // 一覧ページ
    public function showCategoriesView():View
    {
        // これで各カテゴリにparts_countが付与され、何件結びついているか取得できる
        $categories = Category::withCount(['parts'])->get();

        return view('admin/categories/index',compact('categories'));
    }


    // 作成ページのビュー
    public function showCreateView():View
    {
        return view('admin/categories/create');
    }

    // 作成
    public function create(CategoryRequest $request):RedirectResponse
    {
        Category::create([
            'name' => $request->name
        ]);

        return redirect()->route('admin.categories.index');
    }

    // 削除ビュー
    public function deleteCategoryView(string $category_id):View
    {
        $category = Category::findOrFail($category_id);

        return view('admin/categories/delete' , compact('category'));
    }

    // 削除
    public function delete(string $category_id):RedirectResponse
    {
        $category = Category::findOrFail($category_id);
        $category->delete();

        return redirect()->route('admin.categories.index');
    }
}

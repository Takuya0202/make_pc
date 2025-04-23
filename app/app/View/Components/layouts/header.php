<?php

namespace App\View\Components\layouts;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class header extends Component
{
    /**
     * Create a new component instance.
     */

    // userにユーザー情報を入れる
    public $user;
    // 検索フォームのカテゴリー取得
    public $categories;

    public function __construct()
    {
        $this->user = Auth::user();
        $this->categories = Category::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layouts.header');
    }
}

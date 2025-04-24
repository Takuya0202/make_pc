<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Http\Requests\Application\AddPartToListRequest;
use App\Http\Requests\Application\PcListRequest;
use App\Models\Part;
use App\Models\PcList;
use App\Models\PcListPart;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PcListController extends Controller
{
    public function showPcListsView():View
    {
        $user_id = Auth::user()->id;
        // user情報に結びついている全てのlistを取得する
        $pcLists = PcList::with(['parts'])
                ->where('user_id',$user_id)
                ->get();
        // ユーザの一つ目のセットを取得する
        $targetPcList = PcList::with(['parts.category','parts.maker'])
                ->where('user_id',$user_id)
                ->first();
        // 金額の合計を計算
        $totalPrice = $targetPcList->parts->reduce(function(int $carry,Part $part){
            // carryは初期値0の値を収納する変数。
            return $carry + ( $part->price * $part->pivot->quantity);
        },0);


        return view('app/pcList',compact('pcLists','targetPcList','totalPrice'));
    }

    public function showPcListView(string $pc_list_id):View
    {
        $user_id = Auth::user()->id;

        $pcLists = PcList::with(['parts'])
        ->where('user_id',$user_id)
        ->get();
        // ログインしているユーザの特定のリストを取得.pcListという変数だとbladeで上書きされるので注意する
        $targetPcList = PcList::with(['parts.category','parts.maker'])
                ->where('id',$pc_list_id)
                ->where('user_id',$user_id)
                ->first();
        // 金額の合計を計算
        $totalPrice = $targetPcList->parts->reduce(function(int $carry,Part $part){
            // carryは初期値0の値を収納する変数。
            return $carry + ( $part->price * $part->pivot->quantity);
        },0);
        // ビューは全体と共有
        return view('app/pcList',compact('pcLists','targetPcList','totalPrice'));
    }

    public function createList(PcListRequest $request):RedirectResponse
    {
        $pcList = PcList::create([
            'name' => $request->name,
            'user_id' => Auth::user()->id,
            // priceはpclist内のパーツの合計金額なので0でセット
            'price' => 0
        ]);

        return redirect()->route('app.lists');
    }

    public function addPartToList(AddPartToListRequest $request):RedirectResponse
    {
        //ユーザidを取得
        $user_id = Auth::user()->id;
        // 追加するリストを取得。　ユーザidを含めないとセキュリティに問題あるかも
        $targetList = PcList::with(['parts'])
                    ->where('id',$request->pc_list_id)
                    ->where('user_id',$user_id)
                    ->firstOrFail();
        // すでにpartを登録している場合は数を更新し、存在しない場合は新規追加
        $isExist = $targetList->parts()->where('part_id',$request->part_id)->first();
        // モデル経由じゃないのでfillableは不要
        if ($isExist) {
            // 数量を更新。既存の量に追加分を追加
            $targetList->parts()->updateExistingPivot($request->part_id,[
                'quantity' => $isExist->pivot->quantity + $request->quantity
            ]);
        } else {
            $targetList->parts()->attach($request->part_id,['quantity' => $request->quantity]);
        }

        return redirect()->route('app.detail',['part_id' => $request->part_id])
        ->with('success', $targetList->name . 'に追加しました');
    }

    public function updateQuantity(Request $request,string $pc_list_id)
    {
        $quantity = $request->quantity;
        $targetList = PcList::with(['parts'])
                    ->where('id',$pc_list_id)
                    ->where('user_id',Auth::user()->id)
                    ->get();
        // 数量を変更
        $targetList->parts()->
    }
}

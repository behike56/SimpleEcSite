<?php

namespace App\Http\Controllers\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Illuminate\Session\Store;
//use Illuminate\Support\Facades\Session;
use Session;

use App\Cart;
use App\Items;

class CartController extends Controller
{
    /**
     * セッションに追加後、元のページに戻る
     * @param Request $request
     * @var array $cartBox ２次元配列、セッションへ保存する
     * @var array $form 配列、商品情報
     * @retrun 元来たページへ戻る
     **/
    public function addItem(Request $request){

        if (!isset($_SESSION['cartBox'])) {
            $_SESSION['cartBox'] = [];
        }

        $cartInfo = [
            'cartId' => $request->id,
            'cartQuantity' => $request->quantity];

        $_SESSION['cartBox'][] = $cartInfo;

        //dd($_SESSION['cartBox']);

        Session::put('cartBox');
        Session::all();

        $a = Session::get('cartBox');
        var_dump($a);

        // $form = Items::all();
        // return redirect()->intended('/')-> with(['form' => $form]);
    }

    /**
     * 買い物カゴの中身を表示
     * @param Request $request
     * @var array $displayItems ２次元配列、セッションから取り出し入れる
     * @var array $talbeOfItems　配列、商品情報
     * @retrun view('cart/cart')
     * @return array 
     **/
    public function displayCart(Request $request)
    {
        $displayItems = Session::get('id');

        var_dump($displayItems);

        // foreach($displayItems as $item){
        //     $increment = 0;

        //     $b = Items::find($item['cartBox'][$increment] ->cartId);
        //     dd($b);
        //     $increment++;
        // }

        //return view('cart.cart',['displayItems' => $displayItems]);

    }

    /**
     * 追加したアイテムの削除
     * @param Request $request
     * @param int $quantity
     * @var array $orderItem
     * @var int $orderQuantity
     * @retrun
     **/
    public function deleteItem(Request $request, $itemId)
    {

    }

    /**
     * 買い物カゴをリセット（セッションのクリア）
     * @param Request $request
     * @var 
     * @retrun
     **/
    public function resetCart(Request $request)
    {
        Session::flush();

        $form = Items::all();
        return redirect()->intended('/')-> with(['form' => $form]);
    }

    /**
     * 合計点数を表示
     * @param Request $request
     * @var 
     * @retrun
     **/
    public function shoTotalQuantity(Request $request)
    {

    }

    /**
     * 合計金額を表示
     * @param Request $request
     * @var 
     * @retrun
     **/
    public function showTotalPrice(Request $request)
    {
  
    }
}

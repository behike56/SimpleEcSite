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

        $id = $request->id;
        $qty = $request->quantity;

        // var_dump($id);
        // var_dump($qty);

        $cartInfo = [
            'cartId' => $id,
            'cartQuantity' => $qty];

        $sessCart = Session::get('cartBox');
        $sessCart[] = $cartInfo;
        Session::put('cartBox', $sessCart);

        $form = Items::all();
        return redirect()->intended('/')-> with(['form' => $form]);
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
        $displayItems = Session::get('cartBox');
        $countBox = count($displayItems);

        $totalQty = 0;
        $totalPriceNoTax = 0;
        $carts=[];

        for($i=0; $i<$countBox; $i++){
            $id = $displayItems[$i]['cartId'];
            $qty = $displayItems[$i]['cartQuantity'];

            $item = Items::find($id);

            $carts[] = [
                'id' => $id,
                'name' => $item->items_name,
                'desc' => $item->descriptions,
                'qtity' => $qty,
                'price' => $item->price];

            $totalQty += $qty;
            $addPrice = $qty * $item->price;
            $totalPriceNoTax += $addPrice;
        }

        var_dump($carts);

        if($carts==[]){
            return view('cart.emptyCart');
        }

        if($carts!=[]){
        return view('cart.cart',
                    ['carts' => $carts,
                     'countBox' => $countBox,
                     'totalQty' => $totalQty,
                     'totalPriceNoTax' => $totalPriceNoTax]);
        }
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
        Session::forget('cartBox');

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

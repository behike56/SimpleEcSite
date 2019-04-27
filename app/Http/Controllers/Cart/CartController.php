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
        // var_dump($displayItems[0]['cartId']);
        // var_dump($displayItems[0]['cartQuantity']);
        // $test[] =['a'=>1,'b'=>2, 'c'=>3];
        // $test[] =['d'=>4,'e'=>5, 'f'=>6];

        // var_dump($test);

        $tableItems = Items::all();

        $countBox = count($displayItems);

        $totalQty = 0;

        $totalPriceNoTax = 0;

        for($i=0; $i<$countBox; $i++){
            $id = $displayItems[$i]['cartId'];
            $qty = $displayItems[$i]['cartQuantity'];

            // var_dump($displayItems[0]);
            // var_dump($id);
            // var_dump($qty);

            $item = Items::find($id);

            //var_dump($item);

            $carts[] = [
                'id' => $id,
                'name' => $item->items_name,
                'desc' => $item->descriptions,
                'qtity' => $qty,
                'price' => $item->price];

            $totalQty += $qty;
            $totalPriceNoTax += $item->price;

        }
        return view('cart.cart',['carts' => $carts, 'countBox' => $countBox, 'totalQty' => $totalQty, 'totalPriceNoTax' => $totalPriceNoTax]);
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

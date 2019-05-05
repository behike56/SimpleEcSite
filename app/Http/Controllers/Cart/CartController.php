<?php
namespace App\Http\Controllers\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

use App\Cart;
use App\Items;

class CartController extends Controller
{
    /**
     * セッションに追加後、元のページに戻る
     * @param Request $request 
     * @var array $cartInfo セッションへ保存する配列
     * @var array $sessCart $idと$qty含めてセッションへ保存する
     * @var array $form 配列、商品情報
     * @retrun string 実行時のページ
     * @return array 連想配列。商品テーブル
     **/
    public function addItem(Request $request)
    {
        if (!isset($_SESSION['cartBox'])) {
            $_SESSION['cartBox'] = [];
        }

        $id = $request->id;
        $qty = $request->quantity;
        $cartInfo = [
            'cartId' => $id,
            'cartQuantity' => $qty];

        $sessCart = Session::get('cartBox');
        $sessCart[] = $cartInfo;
        Session::put('cartBox', $sessCart);

        $form = Items::all();
        return redirect()->intended('/')->with(['form' => $form]);
    }

    /**
     * 買い物カゴの中身を表示
     * @param Request $request セッションを取り出す
     * @var array $displayItems ２次元配列、表示させる商品情報idとqty
     * @var $totalQty カートに入っている商品の数
     * @var $totalPriceNoTax 合計金額（税別）
     * @var $carts カートページに表示する全情報
     * @return string カートが空の時のページのview
     * @retrun string カートページのview
     * @return array 連想配列。表示する情報
     **/
    public function displayCart(Request $request)
    {
        $displayItems = Session::get('cartBox');
        $countBox = count($displayItems);

        $totalQty = 0;
        $totalPriceNoTax = 0;
        $carts = [];

        for ($i = 0; $i < $countBox; $i++) {
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

        if ($carts == []) {
            return view('cart.emptyCart');
        }

        if ($carts != []) {
            return view('cart.cart',
                        ['carts' => $carts,
                         'countBox' => $countBox,
                         'totalQty' => $totalQty,
                         'totalPriceNoTax' => $totalPriceNoTax]);
        }
    }

    /**
     * 買い物カゴをリセット（セッションのクリア）
     * @param Request $request
     * @var array $form トップページ用の全ての商品情報
     * @retrun string リセット後はトップページへ
     * @return array 連想配列。商品テーブル
     **/
    public function resetCart(Request $request)
    {
        Session::forget('cartBox');

        $form = Items::all();
        return redirect()->intended('/')->with(['form' => $form]);
    }
}


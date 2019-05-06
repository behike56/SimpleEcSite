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
     * [cartBox => [$sessCart[$cartInfo]]]
     * @param Request $request
     * @var array $cartInfo $idと$qty
     * @var array|array $sessCart
     * @var array $form
     * @retrun string view-file name
     * @return array items table
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
     * @param Request $request
     * @var array|array $displayItem
     * @var string $totalQt
     * @var string $totalPriceNoTax
     * @var array $carts
     * @return string view-file name
     * @retrun string view-file name
     * @return array|array $carts|string other
     **/
    public function displayCart(Request $request)
    {
        $displayItems = Session::get('cartBox');
        $countBox = count($displayItems);

        $totalQty = '';
        $totalPriceNoTax = '';
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
            return view('cart.cart')->with(
                ['carts' => $carts,
                 'countBox' => $countBox,
                 'totalQty' => $totalQty,
                 'totalPriceNoTax' => $totalPriceNoTax]);
        }
    }

    /**
     * 買い物カゴをリセット（セッションのクリア）
     * @param Request $request
     * @var array $form
     * @retrun string redirect->intended
     * @return array items table
     * @table items
     **/
    public function resetCart(Request $request)
    {
        Session::forget('cartBox');

        $form = Items::all();
        return redirect()->intended('/')->with(['form' => $form]);
    }
}


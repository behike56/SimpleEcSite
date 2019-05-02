<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Session;

use App\Items;
use App\Users;
use App\Orders;

use App\Http\Controllers\Cart\CartController;

class PaymentController extends Controller
{
    /**
     * 発送方法の選択
     * 発送先住所の選択
     * @param Request $request
     * @var array $form 商品情報
     * @return view('items.itemlist')
     * @return array $form
     * @table 
     **/
    public function shipping(Request $request)
    {
        $users = Auth::user();

        return view('payment.shipping', ['users' => $users]);
    }

    /**
     * 発送情報をセッションへ保存
     * loginしているユーザーの情報が必要
     * @var $orderName
     * @var $orderEmail
     * @var $orderPhoneNumber
     * @var $orderAddress
     * @var $delivery
     * @return view('items.itemlist')
     * @table customers, items
     **/
    public function addShipping(Request $request)
    {
        if(!isset($_SESSION['shipping'])){
            $_SESSION['shipping']=[];
        }

        $orders = $request->all();

        if($orders['address']=='OTHER'){
            $address = $orders['addressTwo'];
        } 

        if($orders['address']!='OTHER'){
            $address = $orders['address'];
        }

        $shipping = $orders['shipping'];

        $shippingInfo = [
            'address' => $address,
            'shipping' => $shipping];

        $sessShipping = Session::get('shipping');
        $sessShipping[] = $shippingInfo;
        Session::put('shipping', $sessShipping);

        return view('payment.settlement');
    }

    /**
     * 支払い情報をセッションへ保存
     * 確認ページに表示するデータを準備
     * @var $totalPrice
     * @var $payMethod
     * @return view('items.itemlist')
     **/
    public function addSettlement(Request $request)
    {
        if(!isset($_SESSION['settlement'])){
            $_SESSION['settlement']=[];
        }

        $orders = $request->all();
        $payMethod = $orders['payMethod'];
        $settlementInfo = ['payMethod' => $payMethod];
        $sessSettlement = Session::get('settlement');
        $sessSettlement[] = $settlementInfo;
        Session::put('settlement', $sessSettlement);


        $displayItems = Session::get('cartBox');
        $countBox = count($displayItems);

        $totalQty = 0;
        $totalPriceNoTax = 0;

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

        $taxRate = 0.08;
        $tax = $totalPriceNoTax * $taxRate;

        $sessShipping = Session::get('shipping');

        var_dump($sessShipping);
        $shipping = $sessShipping['0']['shipping'];
        $address = $sessShipping['0']['address'];
        $shippingFee = 300;
        $payMethod = $sessSettlement['0']['payMethod'];

        return view('payment.confirmation',
                    ['carts' => $carts,
                     'countBox' => $countBox,
                     'totalQty' => $totalQty,
                     'totalPriceNoTax' => $totalPriceNoTax,
                     'tax' => $tax,
                     'shipping' => $shipping,
                     'shippingFee' => $shippingFee,
                     'address' => $address,
                     'payMethod' => $payMethod]);
    }

    /**
     * 発送の選択をリセット（セッションのクリア）
     * @param Request $request
     * @var 
     * @retrun
     **/
    public function resetShipping(Request $request)
    {
        Session::forget('shipping');

        return redirect()->intended('/');;
    }

    /**
     * 支払いの選択をリセット（セッションのクリア）
     * @param Request $request
     * @var 
     * @retrun
     **/
    public function resetSettlement(Request $request)
    {
        Session::forget('settlementInfo');

        return redirect()->intended('/');
    }

    /**
     * 発送と支払いの選択をリセット（セッションのクリア）
     * @param Request $request
     * @retrun redirect()
     **/
    public function reset(Request $request)
    {
        Session::forget('shipping');
        Session::forget('settlement');

        return redirect()->intended('/cart');
    }


    /**
     * サンクスページ
     * @var 
     * @return view('items.itemlist')
     **/
    public function thanks()
    {


        return view('payment.thanks');
    }

    // /**
    //  * 注文の実行
    //  * 1. store data to DB.
    //  * 2. send an e-mail.
    //  * 3. reset the session with three keys.
    //  * @param Request $request
    //  * @var array $form 商品情報
    //  * @return view('items.itemlist')
    //  * @return array $form
    //  * @table 
    //  **/
    // public function orderExecution(Request $request)
    // {
    //     $orderItems = Session::get('cartBox');

    //     $countBox = count($displayItems);
    //     $orderItems = '';

    //     for($i=0; $i<$countBox; $i++){
    //         $id = $displayItems[$i]['cartId'];
    //         $qty = $displayItems[$i]['cartQuantity'];
    //         $orderItems += $id.'&&&'.$qty.'_';
    //     }

    //     $orderShipping = Session::get('shipping');
    //     $orderSettlement = Session::get('settlement');



    // $customers = Customers::all();

    // $orderName = $customers->name;
    // $orderEmail = $customers->email;
    // $orderPhoneNumber = $customers->phoneNumber;
    // $orderAddress = $customer->address;
    // $delivery = $request->delivery;

    // $shippingInfo = [
    //     'orderName' => $orderName,
    //     'orderEmail' => $orderEmail,
    //     'orderPhoneNumber' => $orderPhoneNumber,
    //     'orderAddress' => $orderAddress,
    //     'delivery' => $delivery
    // ];

    // $sessOrders = Session::get('shipping');
    // $sessOrders[] = $shippingInfo;
    // Session::put('shipping', $sessOrders); 


    //     //セッションの注文情報をDBへ保存する
    //     $orders = new Orders;
    //     $orderInfo = $request->all();

    //     $orders->fill([
    //         'items_name' => $form['items_name'],
    //     ]);

    //     $orders->save();

    //     //注文完了メールを送信する

    //     //セッション（カート、オーダー）をリセットする
    // }

    // /**
    //  * 支払い方法の選択
    //  * 支払い合計金額の確認
    //  * @param Request $request
    //  * @var array $form 商品情報
    //  * @return view('items.itemlist')
    //  * @return array $form
    //  * @table 
    //  **/
    // public function settlement(Request $request)
    // {
    //     //customerテーブルから住所を参照する

    //     //
    //     $form = Items::all();
    //     return view('payment.dettlement', ['form' => $form]);
    // }
}

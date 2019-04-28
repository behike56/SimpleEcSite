<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items;
use App\Customers;
use App\Orders;

class PaymentController extends Controller
{
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

        $orders = $request->all();

        if(!isset($_SESSION['shipping'])){
            $_SESSION['shipping']=[];
        }

        $customers = Customers::all();

        $orderName = $customers->name;
        $orderEmail = $customers->email;
        $orderPhoneNumber = $customers->phoneNumber;
        $orderAddress = $customer->address;
        $delivery = $request->delivery;

        $shippingInfo = [
            'orderName' => $orderName,
            'orderEmail' => $orderEmail,
            'orderPhoneNumber' => $orderPhoneNumber,
            'orderAddress' => $orderAddress,
            'delivery' => $delivery
        ];

        $sessOrders = Session::get('shipping');
        $sessOrders[] = $shippingInfo;
        Session::put('shipping', $sessOrders);
    }

    /**
     * 支払い情報をセッションへ保存
     * @var $totalPrice
     * @var $payMethod
     * @return view('items.itemlist')
     **/
    public function addSettlement(Request $request)
    {

        $orders = $request->all();

        if(!isset($_SESSION['settlement'])){
            $_SESSION['settlement']=[];
        }

        $totalPrice = $request->totalPrice;
        $payMethod = $request->payMethod;

        $sessOrders = Session::get('settlement');
        $sessOrders[] = $settlementInfo;
        Session::put('settlement', $sessOrders);
    }

    /**
     * 注文の実行
     * 1. store data to DB.
     * 2. send an e-mail.
     * 3. reset the session with three keys.
     * @param Request $request
     * @var array $form 商品情報
     * @return view('items.itemlist')
     * @return array $form
     * @table 
     **/
    public function orderExecution(Request $request)
    {
        $orderItems = Session::get('cartBox');

        $countBox = count($displayItems);
        $orderItems = '';

        for($i=0; $i<$countBox; $i++){
            $id = $displayItems[$i]['cartId'];
            $qty = $displayItems[$i]['cartQuantity'];
            $orderItems + = $id.'&&&'.$qty.'_';
        }

        $orderShipping = Session::get('shipping');
        $orderSettlement = Session::get('settlement');





        //セッションの注文情報をDBへ保存する
        $orders = new Orders;
        $orderInfo = $request->all();

        $orders->fill([
            'items_name' => $form['items_name'],
        ]);

        $orders->save();

        //注文完了メールを送信する

        //セッション（カート、オーダー）をリセットする
    }

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
        //customerテーブルから住所を参照する
        $customers = Customers::all();
        $orderName = $cutomers->name;
        $orderAdress = $customers->address;

        //
        $form = Items::all();
        return view('payment.shipping', ['form' => $form]);
    }

    /**
     * 支払い方法の選択
     * 支払い合計金額の確認
     * @param Request $request
     * @var array $form 商品情報
     * @return view('items.itemlist')
     * @return array $form
     * @table 
     **/
    public function settlement(Request $request)
    {
        //customerテーブルから住所を参照する

        //
        $form = Items::all();
        return view('payment.dettlement', ['form' => $form]);
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
}

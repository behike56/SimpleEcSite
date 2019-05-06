<?php
namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use App\Mail\ThanksMail;

use App\Items;
use App\Users;
use App\Orders;


/**
 *改修予定：重複する機能あり
 **/
class PaymentController extends Controller
{
    /**
     * 発送方法の選択
     * 発送先住所の選択
     * @param Request $request
     * @var array $users
     * @return string view-file name
     * @return array $users
     * @table users
     **/
    public function shipping(Request $request)
    {
        $users = Auth::user();
        return view('payment.shipping')->with(['users' => $users]);
    }

    /**
     * 発送情報をセッションへ保存
     * @var string $address
     * @var string $shipping
     * @var array $shippingInfo
     * @return string view-file name
     * @table items
     **/
    public function addShipping(Request $request)
    {
        if(!isset($_SESSION['shipping'])){
            $_SESSION['shipping'] = [];
        }

        $orders = $request->all();

        if($orders['address'] == 'OTHER'){
            $address = $orders['addressTwo'];
        } 

        if($orders['address'] != 'OTHER'){
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
     * 1. 支払い情報をセッションへ保存
     * 2. 確認ページに表示するデータを準備
     * @param Request $request
     * @var string $payMethod
     * @var array $settlementInfo
     * @var string $tax
     * @var 
     * @return view('items.itemlist')
     **/
    public function addSettlement(Request $request)
    {
        if(!isset($_SESSION['settlement'])){
            $_SESSION['settlement'] = [];
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

        $shipping = $sessShipping['0']['shipping'];
        $address = $sessShipping['0']['address'];
        $shippingFee = 300;
        $payMethod = $sessSettlement['0']['payMethod'];

        return view('payment.confirmation')
            ->with(['carts' => $carts,
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
     * 注文の実行
     * 1. 注文テーブルへ保存
     * 2. 保存後セッションを削除
     * 3. サンクスページへ遷移
     * @param Request $request
     * @var string $orderItems 商品名と個数の連結
     * @var integer $orderPhoneNumber
     * @var string $orderName, $orderEmail, $orderAddress, $totalPrice, $delivery, $payMethod
     * @return string view-file name
     * @table users
     **/
    public function orderExecution(Request $request)
    {
        $users = Auth::user();
        $orderName = $users->name;
        $orderEmail = $users->email;
        $orderPhoneNumber = $users->phoneNumber;
        $orderAddress = $users->address;

        $forms = $request->all();
        $cartItems = Session::get('cartBox');
        $countBox = count($cartItems);

        $orderItems = '';

        for($i=0; $i<$countBox; $i++){
            $name = $forms['itemName'.$i];
            $qtity = $forms['itemQtity'.$i];

            $item = '#'.$name.'&&&'.$qtity.'_';
            $orderItems .= $item;
        }

        $totalPrice = $forms['totalPrice'];
        $delivery = $forms['shipping'];
        $payMethod = $forms['payMethod'];

        $orders = new Orders;
        $orders->fill([
            'orderName' => $orderName,
            'orderEmail' => $orderEmail,
            'orderPhoneNumber' => $orderPhoneNumber,
            'orderAddress' => $orderAddress,
            'orderItems' => $orderItems,
            'totalPrice' => $totalPrice,
            'delivery' => $delivery,
            'payMethod' => $payMethod
        ]);

        $orders->save();

        Session::forget('cartBox');
        Session::forget('shipping');
        Session::forget('settlement');

        return view('payment.thanks');
    }

    /**
     * 発送の選択をリセット（セッションのクリア）
     * @param Request $request
     * @retrun string redirect->intended
     **/
    public function resetShipping(Request $request)
    {
        Session::forget('shipping');
        return redirect()->intended('/');;
    }

    /**
     * 支払いの選択をリセット（セッションのクリア）
     * @param Request $request
     * @retrun string redirect->intended
     **/
    public function resetSettlement(Request $request)
    {
        Session::forget('settlementInfo');
        return redirect()->intended('/');
    }

    /**
     * 発送と支払いの選択をリセット（セッションのクリア）
     * @param Request $request
     * @retrun  string redirect->intended
     **/
    public function resetOrder(Request $request)
    {
        Session::forget('shipping');
        Session::forget('settlement');

        return redirect()->intended('/');
    }
}


<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class CheckOutController extends Controller
{
    public function showCheckOut(){
        $cart = session('Cart');
        return view('Cakebaker.check-out',compact('cart'));
    }

    public function createOrder(CustomerRequest $request)
    {
        $customer = new  Customer();
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->address = $request->address;

        $customer->save();



        $order = new Order();
        $order->customer_id = $customer->id;
        $order->note = $request->note;
        $order->save();
        // $order->sub_total = $request->sub_total;
        $order_id = $order->id;
        $oldCart = session('Cart') ? session('Cart') : null;
        $cart = new Cart($oldCart);

        foreach ($cart->products as $item)
        {
            $product_id = $item['productInfo']->id;
            $quantity = $item['qty'];
            $price = $item['productInfo']->price;
            DB::table('order_details')->insert([
                'order_id' => $order_id,
                'product_id'=>$product_id,
                'quantity' => $quantity,
                'price_each' => $price,
                'total' => $price*$quantity,
            ]);
            // DB::table('order')->insert([
            //     'sub_total'=>
            // ])
        }
        session()->forget('Cart');
        return redirect()->route('home')->with('add','Đặt Hàng Thành Công.!!!');

        }



}

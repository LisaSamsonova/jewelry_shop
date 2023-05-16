<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Order;

class OrdersController extends Controller
{
    public function Feeling(){
        $orders = DB::table('zakazs')
        ->join('buyers', 'zakazs.buyer_id', '=', 'buyers.id')
        ->join('products', 'zakazs.product_id', '=', 'products.id')
        ->select('buyers.name as buyer', 'products.title as product', 'zakazs.amount', 'zakazs.total_price', 'zakazs.created_at', 'zakazs.id')
        ->get();
        $type = 'orders';
        return view('table', compact('orders', 'type'));
    }

    public function CreateOrder(){

        $buyers = DB::table('buyers')->get();
        $products = DB::table('products')->get();

        return view('order_form', compact('buyers', 'products'));
    }

    public function SaveOrder(Request $request){
        
        $buyer = $request->input('buyer');
        $product = $request->input('product');
        $amount = $request->input('amount');
        $id = $request->input('id');

        if($id){
            $order = Order::find($id);
            $order->amount = $amount;
            $order->buyer_id = $buyer;
            $order->product_id = $product;
            $order->save();
        }
        else{
            $order = DB::table('zakazs')->where('buyer_id', $buyer)->where('product_id', $product)->where('amount', $amount)->first();

            if(!$order){
                $order = new Order();
                $order->buyer_id = $buyer;
                $order->product_id = $product;
                $order->amount = $amount;
                $product_price = DB::table('products')->where('id', $product)->value('price');
                $order->total_price = $amount * $product_price;
                $order->save();
            }
        }

        return redirect()->route('orders');
    }

    public function UpdateOrder($id){

        $order = DB::table('zakazs')->where('id', $id)->first();
        $amount = $order->amount;
        $buyers = DB::table('buyers')->get();
        $products = DB::table('products')->get();

        return view('order_form', compact('id', 'amount', 'buyers', 'products'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Buyer;
use App\Models\Type;
use App\Models\Product;
use App\Models\Order;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function Create(Request $request){

        $previousUrl = $request->headers->get('referer');
        $type = rtrim(substr($previousUrl, strrpos($previousUrl, '/') + 1), '/');

        switch($type){
            case 'buyers':
                return view('buyer_form');
                break;
            case 'products':
                $controller = app()->make(ProductsController::class);
                $result = $controller->CreateProduct();
                return $result;
                break;
            case 'types':
                return view('type_form');
                break;
            case 'orders':
                $controller = app()->make(OrdersController::class);
                $result = $controller->CreateOrder();
                return $result;
                break;
            default:
                return redirect()->route('orders');
        }
    }

    public function Save(Request $request){

        $type = $request->input('type');

        switch($type){
            case 'buyers':
                $controller = app()->make(BuyersController::class);
                $result = $controller->SaveBuyer($request);
                return $result;
                break;
            case 'products':
                $controller = app()->make(ProductsController::class);
                $result = $controller->SaveProduct($request);
                return $result;
                break;
            case 'types':
                $controller = app()->make(TypesController::class);
                $result = $controller->SaveType($request);
                return $result;
                break;
            case 'orders':
                $controller = app()->make(OrdersController::class);
                $result = $controller->SaveOrder($request);
                return $result;
                break;
            default:
                return redirect()->route('orders');
        }
    }

    public function Delete(Request $request){
        
        $previousUrl = $request->headers->get('referer');
        $type = rtrim(substr($previousUrl, strrpos($previousUrl, '/') + 1), '/');
        $id = $request->input('id');

        switch($type){
            case 'buyers':
                $buyer = DB::table('buyers')->where('id', $id);
                $buyer->delete();
                return redirect()->route('buyers');
                break;
            case 'products':
                $product = DB::table('products')->where('id', $id);
                $product->delete();
                return redirect()->route('products');
                break;
            case 'orders':
                $order = DB::table('zakazs')->where('id', $id);
                $order->delete();
                return redirect()->route('orders');
                break;
            case 'types':
                $type = DB::table('types')->where('id', $id);
                $type->delete();
                return redirect()->route('types');
                break;
            default:
                return redirect()->route('orders');
        }
    }

    public function Update(Request $request){

        $previousUrl = $request->headers->get('referer');
        $type = rtrim(substr($previousUrl, strrpos($previousUrl, '/') + 1), '/');
        $id = $request->input('id');

        switch($type){
            case 'buyers':
                $controller = app()->make(BuyersController::class);
                $result = $controller->UpdateBuyer($id);
                return $result;
                break;
            case 'products':
                $controller = app()->make(ProductsController::class);
                $result = $controller->UpdateProduct($id);
                return $result;
                break;
            case 'types':
                $controller = app()->make(TypesController::class);
                $result = $controller->UpdateType($id);
                return $result;
                break;
            case 'orders':
                $controller = app()->make(OrdersController::class);
                $result = $controller->UpdateOrder($id);
                return $result;
                break;
            default:
                return redirect()->route('orders');
        }
    }
}
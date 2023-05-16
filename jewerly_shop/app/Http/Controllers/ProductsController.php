<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function Feeling(){
        $products = DB::table('products')
        ->join('types', 'products.type_id', '=', 'types.id')
        ->select('products.title', 'products.price', 'products.discription', 'types.title as type', 'products.id')
        ->get();
        $type = 'products';
        return view('table', compact('products', 'type'));
    }

    public function CreateProduct(){

        $types = DB::table('types')->get();

        return view('product_form', compact('types'));
    }

    public function SaveProduct(Request $request){

        $title = $request->input('title');
        $price = $request->input('price');
        $description = $request->input('discription');
        $type = $request->input('tipe');
        $id = $request->input('id');

        if($id){
            $product = Product::find($id);
            $product->title = $title;
            $product->price = $price;
            $product->discription = $description;
            $product->type_id = $type;
            $product->save();
        }
        else{
            $product = DB::table('products')->where('title', $title)->where('type_id', $type)->first();

            if(!$product){
                $product = new Product();
                $product->title = $title;
                $product->price = $price;
                $product->discription = $description;
                $product->type_id = $type;
                $product->save();
            }
        }

        return redirect()->route('products');
    }

    public function UpdateProduct($id){

        $product = DB::table('products')->where('id', $id)->first();
        $types = DB::table('types')->get();
        $title = $product->title;
        $description = $product->discription;
        $price = $product->price;

        return view('product_form', compact('title', 'id', 'description', 'price', 'types'));
    }

    public function Discount(Request $request){

        $discount = $request->get('discount');
        $products = Product::all();

        foreach ($products as $product) {
            $product->price -= $product->price * $discount / 100;
            $product->save();
        }

        return redirect()->route('products');
    }
}

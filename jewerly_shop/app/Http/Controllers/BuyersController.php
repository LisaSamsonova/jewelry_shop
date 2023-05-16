<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Buyer;

class BuyersController extends Controller
{
    public function Feeling(Request $request){

        $buyers = DB::table('buyers')->get();
        $type = 'buyers';
        
        return view('table', compact('buyers', 'type'));
    }

    public function SaveBuyer(Request $request){
        
        $phone = $request->input('phone');
        $name = $request->input('name');
        $id = $request->input('id');

        if($id){
            $buyer = Buyer::find($id);

            $buyer->name = $name;
            $buyer->phone = $phone;
            $buyer->save();
        }
        else{
            $buyer = DB::table('buyers')->where('name', $name)->first();

            if(!$buyer){
                $buyer = new Buyer();
                $buyer->name = $name;
                $buyer->phone = $phone;
                $buyer->save();
            }
        }

        return redirect()->route('buyers');
    }

    public function UpdateBuyer($id){

        $buyer = DB::table('buyers')->where('id', $id)->first();
        $name = $buyer->name;
        $phone = $buyer->phone;

        return view('buyer_form', compact('name', 'id', 'phone'));
    }
}

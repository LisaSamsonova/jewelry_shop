<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Type;

class TypesController extends Controller
{
    public function Feeling (Request $request){

        $types = DB::table('types')->get();
        $type = 'types';
        return view('table', compact('types', 'type'));
    }

    public function UpdateType($id){

        $type = DB::table('types')->where('id', $id)->first();
        $title = $type->title;

        return view('type_form', compact('title', 'id'));
    }

    public function SaveType(Request $request){

        $title = $request->input('title');
        $id = $request->input('id');

        if($id){
            $type = Type::find($id);
            $type->title = $title;
            $type->save();
        }
        else{

            $type = DB::table('types')->where('title', $title)->first();

            if(!$type){
                $type = new Type();
                $type->title = $title;
                $type->save();
            }
        }

        return redirect()->route('types');
    }
}

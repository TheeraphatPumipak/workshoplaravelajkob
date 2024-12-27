<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function Pest\Laravel\json;

class customercontroller extends Controller
{
    public function list()
    {
        return response()->json(['customer' => 'Customer List']);
    }
    public function detail($id) {
        return response()->json(['customer' =>'customer detail']);
    }
    public function create(Request $request){
        return  response()->json(['customer'=>'customer create'.$request->name]);
    }
    public function update(Request $request ,$id ){
        return response()->json(['customer'=>'customer update'.$id.' '.$request->name]);
    }
    public function delete($id){
        return response()->json(['customer'=>'customer Delete'.$id]);
    }
}

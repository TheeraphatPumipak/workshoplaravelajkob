<?php

namespace App\Http\Controllers;

use App\models\Product;
use App\models\ProductType;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list()
    {
        try {
            $products = Product::all();
            return view('product.list', compact('products'));
        } catch (\Exception $e) {
            return response()->json(['errors' => $e->getMessage()], 500);
        }
    }
    public function form()
    {   $productTypes=ProductType::all();
        return view('product.form',compact('productTypes'));
    }
    public function sort()
    {
        $sort = "desc";
        $products = Product::orderBy('price', $sort)->get();

        return view('product.list', compact('products', 'sort'));
    }
    public function priceMoreThan()
    {
        $price = 400;
        $products = Product::where('price', '>', $price)->get();
        return view('product.list', compact('products'));
    }
    public function priceBetween()
    {
        $priceFrom = 800;
        $priceTo = 1000;
        $products = Product::whereBetween('price', [$priceFrom, $priceTo])->get();
        return view('product.list', compact('products'));
    }
    public function priceLessThan()
    {
        $price = 800;
        $products = Product::where('price', '<', $price)->get();
        return view('product.list', compact('products'));
    }
    public function priceNotBetween() {
        $priceFrom = 500;
        $priceTo = 1000;
        $products = Product:: whereNotBetween('price', [$priceFrom, $priceTo])->get();
        
        return view('product.list', compact('products'));
    }
    public function save(Request $request)
    {
        try {
            $Product = new Product();
            $Product->name = $request->name;
            $Product->price = $request->price;
            $Product->qty = $request->qty;
            $Product->detail = $request->detail;
            $Product->product_type_id = $request->type;
            $Product->save();
            return redirect('/product/list');
        } catch (\Exception $e) {
            return response()->json(['errors' => $e->getMessage()], 500);
        }
    }
    public function search(Request $request)
    {
        $keyword = $request->keyword;
        if (strlen($keyword) > 0) {
            $products = Product::where('name', 'like', '%' . $keyword . '%')->get();
        } else {
            $products = Product::all();
        }
        return view('product.list', compact('products', 'keyword'));
    }
    public function edit($id)
    {
        try {
            $productTypes=ProductType::orderBy('name','asc')->get();
            $product = Product::find($id);
            return view('product.form', compact('product','productTypes'));
        } catch (\Exception $e) {
            return response()->json(['errors' => $e->getMessage()], 500);
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $product = Product::find($id);
            $product->update($request->all());

            return redirect('/product/list');
        } catch (\Exception $e) {
            return response()->json(['errors' => $e->getMessage()], 500);
        }
    }
    public function remove($id)
    {
        try {
            $product = Product::find($id);
            $product->delete();
            return redirect()->back();
        } catch (\Exception $e) {
            return response()->json(['errors' => $e->getMessage()], 500);
        }
    }
    public function priceMaxMinCountAvg(){
        $priceMax=Product::max('price');
        $priceMin=Product::min('price');
        $pricecount=Product::count();
        $priceAvg=Product::avg('price');
        return view('product.max-min-count-avg',compact('priceMax','priceMin','pricecount','priceAvg'));
    } 
    public function productTypeList(){
        
        $productTypes=ProductType::orderBy('name','asc')->get();
        return view('product.product-type-list',compact('productTypes'));
    }
    public function listByProductType($productTypeId){

        $productType=ProductType::orderBy('name','asc')->find($productTypeId);
        return view('product.list-by-product-type',compact('productType'));
    }
}

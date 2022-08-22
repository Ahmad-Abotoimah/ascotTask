<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\VariationsOptions;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProductCreatedMail;
use App\Services\CreateProduct;

class ProductController extends Controller
{

    public function addProduct(Request $request){
         $validator = Validator::make($request->all(),[
                'image' => 'required',
                'name' => 'required',
                'price' => 'required|numeric',
                'cost' => 'required|numeric',
                'shipping' => 'required',
                'size_box' => 'required',
          ]);
        if($validator->fails()) {

            return response()->json(['error'=>$validator->errors()], 401);
         }
        else{
        $file = $request->image;
        $new_file = time() . $file->getClientOriginalName();
        $file->move('assets/products', $new_file);
        $pathOf = '../../assets/products' . $new_file;
        $product = new Product();
        $product->name = $request->name;
        $product->price =  $request->price;
        $product->cost =  $request->cost;
        $product->tax =   ($request->price-$request->cost)*0.02;
        $product->image = 'pathOf' ;
        $product->shipping = $request->shipping;
        $product->size_box =  $request-> size_box;
        $product->save();
        Mail::to(auth()->user()->email)->send(new ProductCreatedMail($request));
        return 'the product is added successfully';

        }

    }
    public function addOptions(Request $request){

         $validator = Validator::make($request->all(),[
                'colors' => 'required',
                'sizes' => 'required',
                'modals' => 'required',
                'product_id' => 'required',
          ]);
           if($validator->fails()) {

            return response()->json(['error'=>$validator->errors()], 401);
         }
        $options = new VariationsOptions();
        $options->colors = $request->colors;
        $options->sizes =  $request->sizes;
        $options->modals =  $request->modals;
        $options->product_id = $request->product_id;
        $options->save();
        return 'the options is added successfully for product of ID:'.$request->product_id;
    }
}

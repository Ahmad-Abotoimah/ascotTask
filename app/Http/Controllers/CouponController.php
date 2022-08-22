<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Validator;

class CouponController extends Controller
{
     public function addCoupon(Request $request){

         $validator = Validator::make($request->all(),[
                'percentage' => 'required',
                'dateEnded' => 'required',
          ]);
           if($validator->fails()) {

            return response()->json(['error'=>$validator->errors()], 401);
         }
        $coupon = new Coupon();
        $coupon->dateEnded = $request->dateEnded;
        $coupon->percentage =  $request->percentage;
        $coupon->save();
        return 'the coupon is added successfully';
    }
}

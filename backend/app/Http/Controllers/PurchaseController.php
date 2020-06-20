<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PurchaseController extends Controller
{
    public function index(){
        $purchases = Purchase::with('offering')
                        ->get();
        return response()->json(compact('purchases'), 200);
    }
    public function store(Request $request){
        $data = $request->all();

        $validator = Validator::make($data,[
                'offeringID'    => 'required|exists:offerings,id',
                'customerName'  => 'required',
                'quantity'      => 'required|numeric|min:1'
            ]
        );

        if($validator->passes()) {
            $purchase = new Purchase($data);
            if($purchase->save()){
                return response()->json(compact('purchase'));
            }

        }

        return response()->json($validator->errors()->all());
    }
}

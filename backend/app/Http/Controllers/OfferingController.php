<?php

namespace App\Http\Controllers;

use App\Models\Offering;
use Illuminate\Http\Response;

class OfferingController extends Controller
{
    public function index(){
        $offerings = Offering::all();
        return response()->json(compact('offerings'), 200);
    }
}

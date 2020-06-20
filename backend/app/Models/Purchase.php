<?php

namespace App\Models;

use App\Models\Offering;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
    	'offeringID',
        'customerName',
        'quantity'
    ];

    public function offering(){
        return $this->belongsTo(Offering::class, 'offeringID');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        "userid",
        "productid",
        "name",
        "address",
        "quantity",
        "recipient_email",
        "price",
        "status",
        "publish"
    ];

    public function myuser(){
        return $this->belongsTo(User::class, 'userid');
    }

    public function myproduct(){
        return $this->belongsTo(Product::class, 'productid');
    }
}

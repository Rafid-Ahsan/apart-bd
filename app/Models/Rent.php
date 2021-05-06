<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Apartment;
use App\Models\user;

class Rent extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'seller_id',
        'buyer_id',
        'property_id'
    ];

    public function users() {
        return $this->belongsTo(User::class);
    }

    public function apartments() {
        return $this->belongsTo(Apartment::class);
    }

    public function seller_info($seller_id) {
        return User::where('id', $seller_id)->first();
    }

    public function buyer_info($buyer_id) {
        return User::where('id', $buyer_id)->first();
    }
}

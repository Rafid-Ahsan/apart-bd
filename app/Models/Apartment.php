<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'house_number',
        'house_image',
        'road',
        'area',
        'thana',
        'disctrict',
        'division',
        'zip_code',
        'rent',
        'description'
    ];

    public function users() {
        return $this->belongsTo(User::class);
    }

    public function setFilenamesAttributes($value) {
        $this->attributes['house_image'] = json_encode($value);
    }
}

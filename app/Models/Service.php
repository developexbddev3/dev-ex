<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'short_description',
        'long_description',
        'feature_list',
        'prices',
        'status',
        'image',
    ];

    protected $casts = [
        'feature_list' => 'array',
        'prices' => 'array',
    ];

    public function packages() {
        return $this->hasMany(Package::class);
    }
}

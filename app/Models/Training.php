<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'thumbmail',
        'price',
        'short_description',
        'description',
        'status'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}

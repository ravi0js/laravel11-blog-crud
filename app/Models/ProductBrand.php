<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductBrand extends Model
{
    use HasFactory;

    protected $table = 'product_brands';

    protected $fillable = [
        'brand_name',
        'brand_icon',
        'banner',
        'background_color',
        'tagline',
        'description',
        'status',
        'added_by',
    ];

    /**
     * Relationship with User (Assuming 'added_by' is a foreign key for users table)
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'added_by');
    }
}

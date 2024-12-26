<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Define the table name if it's not the default 'products'
    protected $table = 'products';

    // Specify the fields that can be mass-assigned
    protected $fillable = [
        'name',
        'description',
        'price',
        'image', // Add the image field for storing the path
    ];

    // If you're using timestamps, this will automatically manage the created_at and updated_at fields.
    public $timestamps = true;

    // Optional: Define any relationships with other models if needed
    // For example, if a product belongs to a category:
    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }
}

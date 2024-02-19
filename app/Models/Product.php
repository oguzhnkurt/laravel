<?php

// app/Models/Product.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'price',
        // Diğer gerekli sütunlar
    ];

    // Eğer ilişkili bir kategori tablonuz varsa, ilişkiyi tanımlayabilirsiniz
    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }
}

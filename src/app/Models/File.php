<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    public $incrementing = true;

    protected $fillable = [
        'id',
        'status',
        'name',
    ];

    protected $guarded = [];

    /**
     * Get the product
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

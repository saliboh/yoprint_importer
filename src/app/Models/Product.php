<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[] $fillable
     */
    protected $guarded =[];

    protected $fillable = [
        'id',
        'product_title',
        'product_description',
        'style',
        'available_sizes',
        'brand_logo_image',
        'thumbnail_image',
        'color_swatch_image',
        'product_image',
        'spec_sheet',
        'price_text',
        'suggested_price',
        'category_name',
        'subcategory_name',
        'color_name',
        'color_square_image',
        'color_product_image',
        'color_product_image_thumbnail',
        'size',
        'quantity',
        'piece_weight',
        'piece_price',
        'dozens_price',
        'case_price',
        'price_group',
        'case_size',
        'sanmar_mainframe_color',
        'mill',
        'product_status',
        'companion_styles',
        'msrp',
        'map_pricing',
        'front_model_image_url',
        'front_flat_image',
        'back_flat_image',
        'product_measurements',
        'pms_color',
        'gtin',
    ];
}

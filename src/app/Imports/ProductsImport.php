<?php

namespace App\Imports;

use App\Models\File;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Events\AfterImport;
use Maatwebsite\Excel\Events\BeforeImport;

class ProductsImport implements
    ToModel,
    WithHeadingRow,
    WithCustomCsvSettings,
    WithUpserts,
    ShouldQueue,
    WithChunkReading,
    WithEvents
{
    public $file;

    public function __construct(File $file) {
        $this->file = $file;
    }

    public function getCsvSettings(): array
    {
        return [
            'input_encoding' => 'UTF-8',
        ];
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    /**
     * @return string|array
     */
    public function uniqueBy()
    {
        return 'id';
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $file = File::where('id', $this->file->id)->first();
        $file->status = 'processing';
        $file->save();

        return new Product([
            'id' =>  utf8_encode($row['unique_key']),
            'file_id' => $this->file->id,
            'product_title' => mb_convert_encoding($row['product_title'], 'UTF-8', 'UTF-8'),
            'product_description' => mb_convert_encoding($row['product_description'], 'UTF-8', 'UTF-8'),
            'style' => utf8_encode($row['style']),
            'available_sizes' => utf8_encode($row['available_sizes']),
            'brand_logo_image' => utf8_encode($row['brand_logo_image']),
            'thumbnail_image' => utf8_encode($row['thumbnail_image']),
            'color_swatch_image' => utf8_encode($row['color_swatch_image']),
            'product_image' => utf8_encode($row['product_image']),
            'spec_sheet' => utf8_encode($row['spec_sheet']),
            'price_text' => utf8_encode($row['price_text']),
            'suggested_price' => utf8_encode($row['suggested_price']),
            'category_name' => utf8_encode($row['category_name']),
            'subcategory_name' => utf8_encode($row['subcategory_name']),
            'color_name' => utf8_encode($row['color_name']),
            'color_square_image' => utf8_encode($row['color_square_image']),
            'color_product_image' => utf8_encode($row['color_product_image']),
            'color_product_image_thumbnail' => utf8_encode($row['color_product_image_thumbnail']),
            'size' => utf8_encode($row['size']),
            'quantity' => utf8_encode($row['qty']),
            'piece_weight' => utf8_encode($row['piece_weight']),
            'piece_price' => utf8_encode($row['piece_price']),
            'dozens_price' => utf8_encode($row['dozens_price']),
            'case_price' =>utf8_encode( $row['case_price']),
            'price_group' => utf8_encode($row['price_group']),
            'case_size' => utf8_encode($row['case_size']),
            'inventory_key' => utf8_encode($row['inventory_key']),
            'size_index' => utf8_encode($row['size_index']),
            'sanmar_mainframe_color' => utf8_encode($row['sanmar_mainframe_color']),
            'mill' => utf8_encode($row['mill']),
            'product_status' => utf8_encode($row['product_status']),
            'companion_styles' => utf8_encode($row['companion_styles']),
            'msrp' => utf8_encode($row['msrp']),
            'map_pricing' => utf8_encode($row['map_pricing']),
            'front_model_image_url' => utf8_encode($row['front_model_image_url']),
            'back_model_image' => utf8_encode($row['back_model_image']),
            'front_flat_image' => utf8_encode($row['front_flat_image']),
            'back_flat_image' => utf8_encode($row['back_flat_image']),
            'product_measurements' => utf8_encode($row['product_measurements']),
            'pms_color' => utf8_encode($row['pms_color']),
            'gtin' => utf8_encode($row['gtin']),
        ]);
    }

    public function registerEvents(): array
    {
        return [
            AfterImport::class => function (AfterImport $event) {
                $product = Product::orderBy('created_at', 'desc')->first();
                $file = File::where('id', $product->file_id)->first();
                $file->status = 'completed';
                $file->save();
            },
        ];
    }
}

<?php

namespace App\Models;

use App\Traits\ModelHelperTrait;
use Illuminate\Database\Eloquent\Model;

class ProductPhoto extends Model
{
    use ModelHelperTrait;

    protected $table = 'product_photos';

    protected $fillable = ['product_id', 'file_id', 'sort'];

    public static function rules()
    {
        return [
            'product_id' => 'integer|nullable',
            'file_id' => 'integer|nullable',
            'sort' => 'integer|nullable',
            'created_at' => 'date|nullable',
            'updated_at' => 'date|nullable',
        ];
    }
}

<?php

namespace App\Models;

use App\Traits\ModelHelperTrait;
use Illuminate\Database\Eloquent\Model;

class ProductTranslate extends Model
{
    use ModelHelperTrait;

    protected $table = 'product_translates';

    protected $fillable = ['product_id', 'name', 'description', 'characteristics', 'lang', 'created_at', 'updated_at'];

    protected $casts = [
        'characteristics' => 'json'
    ];

    public static function rules()
    {
        return [
            'product_id' => 'integer|nullable',
            'nane' => 'string|required',
            'description' => 'string|nullable',
            'characteristics' => 'string|nullable',
            'lang' => 'integer|nullable',
            'created_at' => 'datetime|nullable',
            'updated_at' => 'datetime|nullable',

        ];
    }
}

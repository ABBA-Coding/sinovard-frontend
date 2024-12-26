<?php

namespace App\Models;

use App\Helpers\Helper;
use App\Traits\ModelHelperTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Lang;

class Product extends Model
{
    use ModelHelperTrait;

    protected $table = 'products';

    protected $fillable = ['name', 'ref_id', 'file_id', 'category_id', 'vendor_code', 'price', 'quantity', 'slug', 'status', 'top', 'created_at', 'updated_at'];

    protected $with = ['translate', 'category'];

    public static function rules()
    {
        return [
            'file_id' => 'integer|nullable',
            'category_id' => 'integer|nullable',
            'created_at' => 'date|nullable',
            'updated_at' => 'date|nullable',
        ];
    }

    public function translate(): HasOne
    {
        return $this->hasOne(ProductTranslate::class, 'product_id')->where('lang', Helper::getLangId(Lang::getLocale()))->withDefault();
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function photos(): HasMany
    {
        return $this->hasMany(ProductPhoto::class, 'product_id');
    }

    public function setCategoryIdAttribute($value)
    {
        if ((int)$value !== 0) {
            $this->attributes['category_id'] = $value;
        } else {
            $this->attributes['category_id'] = null;
        }
    }

    public function setQuantityAttribute($value)
    {
        $this->attributes['quantity'] = $value ?? 0;
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = $value ?? 0;
    }
}

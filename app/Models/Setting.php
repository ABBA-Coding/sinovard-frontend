<?php

namespace App\Models;

use App\Traits\ModelHelperTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Filemanager\Entities\Files;

class Setting extends Model
{
    use ModelHelperTrait;

    protected $table = 'settings';

    protected $fillable = ['show_price', 'phone', 'phone2', 'meta_title', 'meta_description', 'meta_keywords', 'meta_tags',
        'address', 'email', 'email2', 'fax', 'instagram', 'twitter', 'vk', 'facebook', 'telegram',
        'linkedin', 'youtube', 'map_iframe', 'map_link', 'created_at', 'updated_at', 'banner_id'];

    protected $casts = [
        'meta_title' => 'json',
        'meta_description' => 'json',
        'meta_keywords' => 'json',
        'address' => 'json',
    ];

    protected $appends = ['phones'];

    public static function rules()
    {
        return [
            'meta_title' => 'array|nullable',
            'meta_description' => 'array|nullable',
            'meta_keywords' => 'array|nullable',
            'meta_tags' => 'string|nullable',
            'address' => 'array|nullable',
            'fax' => 'string|nullable',
            'phone' => 'string|nullable',
            'email' => 'string|nullable',
            'instagram' => 'string|nullable',
            'twitter' => 'string|nullable',
            'vk' => 'string|nullable',
            'facebook' => 'string|nullable',
            'telegram' => 'string|nullable',
            'linkedin' => 'string|nullable',
            'youtube' => 'string|nullable',
            'map_iframe' => 'string|nullable',
            'map_link' => 'string|nullable',
            'created_at' => 'date|nullable',
            'updated_at' => 'date|nullable',

        ];
    }

    public function getPhonesAttribute()
    {
        if (!empty($this->attributes['phone'])) {
            return explode(',', $this->attributes['phone']);
        }

        return [];
    }

    public function setShowPriceAttribute($value)
    {
        if (is_string($value)) {
            if ($value === 'on') {
                $this->attributes['show_price'] = 1;
            } else {
                $this->attributes['show_price'] = 0;
            }
        } else {
            $this->attributes['show_price'] = $value;
        }
    }

    public function banner(): BelongsTo
    {
        return $this->belongsTo(Files::class);
    }
}

<?php

namespace App\Models;

use App\Helpers\Helper;
use App\Traits\ModelHelperTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Lang;

class Post extends Model
{
    use ModelHelperTrait;

    const TYPE_POST = 1;
    const TYPE_STOCK = 2;

    protected $table = 'posts';

    protected $fillable = ['created_at', 'file_id', 'published_at', 'slug', 'type', 'status', 'updated_at'];

    protected $dates = ['published_at'];

    protected $with = ['translate'];

    public static function rules()
    {
        return [
            'file_id' => 'integer|nullable',
            'published_at' => 'date|nullable',
            'slug' => 'string|nullable',
            'status' => 'nullable',
            'type' => 'integer|nullable',
            'created_at' => 'date|nullable',
            'updated_at' => 'date|nullable',
        ];
    }

    public function setPublishedAtAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['published_at'] = \DateTime::createFromFormat('d.m.Y', $value);
        } else {
            $this->attributes['published_at'] = Carbon::now();
        }
    }

    public function translate(): HasOne
    {
        return $this->hasOne(PostTranslate::class, 'post_id')->where('lang', Helper::getLangId(Lang::getLocale()))->withDefault();
    }
}

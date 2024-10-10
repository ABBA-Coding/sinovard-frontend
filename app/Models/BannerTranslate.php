<?php

namespace App\Models;

use App\Traits\ModelHelperTrait;
use Illuminate\Database\Eloquent\Model;

class BannerTranslate extends Model
{
    use ModelHelperTrait;

    protected $table = 'banner_translates';

    protected $fillable = ['banner_id', 'title', 'description', 'link', 'lang', 'created_at', 'updated_at'];

    public static function rules()
    {
        return [
            'banner_id' => 'integer|nullable',
            'title' => 'string|nullable',
            'description' => 'string|nullable',
            'link' => 'string|nullable',
            'lang' => 'integer|nullable',
            'created_at' => 'datetime|nullable',
            'updated_at' => 'datetime|nullable',

        ];
    }
}

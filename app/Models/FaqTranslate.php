<?php

namespace App\Models;

use App\Traits\ModelHelperTrait;
use Illuminate\Database\Eloquent\Model;

class FaqTranslate extends Model
{
    use ModelHelperTrait;

    protected $table = 'faq_translates';

    protected $fillable = ['faq_id', 'title', 'description', 'lang', 'created_at', 'updated_at'];

    public static function rules()
    {
        return [
            'post_id' => 'integer|nullable',
            'title' => 'string|required',
            'description' => 'string|nullable',
            'lang' => 'integer|nullable',
            'created_at' => 'datetime|nullable',
            'updated_at' => 'datetime|nullable',

        ];
    }
}

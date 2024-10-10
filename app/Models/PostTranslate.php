<?php

namespace App\Models;

use App\Traits\ModelHelperTrait;
use Illuminate\Database\Eloquent\Model;

class PostTranslate extends Model
{
    use ModelHelperTrait;

    protected $table = 'post_translates';

    protected $fillable = ['post_id', 'title', 'description', 'content', 'lang', 'created_at', 'updated_at'];

    public static function rules()
    {
        return [
            'post_id' => 'integer|nullable',
            'title' => 'string|required',
            'description' => 'string|nullable',
            'content' => 'string|nullable',
            'lang' => 'integer|nullable',
            'created_at' => 'datetime|nullable',
            'updated_at' => 'datetime|nullable',

        ];
    }
}

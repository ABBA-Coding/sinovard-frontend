<?php

namespace App\Models;

use App\Traits\ModelHelperTrait;
use Illuminate\Database\Eloquent\Model;

class ReviewTranslate extends Model
{
    use ModelHelperTrait;

    protected $table = 'review_translates';

    protected $fillable = ['review_id', 'name', 'company_name', 'comment', 'lang', 'created_at', 'updated_at'];

    public static function rules()
    {
        return [
            'review_id' => 'integer|nullable',
            'name' => 'string|nullable',
            'company_name' => 'string|nullable',
            'comment' => 'string|nullable',
            'lang' => 'integer|nullable',
            'created_at' => 'datetime|nullable',
            'updated_at' => 'datetime|nullable',

        ];
    }
}

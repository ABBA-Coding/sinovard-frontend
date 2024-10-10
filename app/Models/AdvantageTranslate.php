<?php

namespace App\Models;

use App\Traits\ModelHelperTrait;
use Illuminate\Database\Eloquent\Model;

class AdvantageTranslate extends Model
{
    use ModelHelperTrait;

    protected $table = 'advantage_translates';

    protected $fillable = ['advantage_id', 'title', 'description', 'lang', 'created_at', 'updated_at'];

    public static function rules()
    {
        return [
            'advantage_id' => 'integer|nullable',
            'title' => 'string|required',
            'description' => 'string|nullable',
            'lang' => 'integer|nullable',
            'created_at' => 'datetime|nullable',
            'updated_at' => 'datetime|nullable',

        ];
    }
}

<?php

namespace App\Models;

use App\Traits\ModelHelperTrait;
use Illuminate\Database\Eloquent\Model;

class TeamTranslate extends Model
{
    use ModelHelperTrait;

    protected $table = 'team_translates';

    protected $fillable = ['team_id', 'name', 'position','lang', 'created_at', 'updated_at'];

    public static function rules()
    {
        return [
            'team_id' => 'integer|nullable',
            'name' => 'string|nullable',
            'position' => 'string|nullable',
            'lang' => 'integer|nullable',
            'created_at' => 'datetime|nullable',
            'updated_at' => 'datetime|nullable',

        ];
    }
}

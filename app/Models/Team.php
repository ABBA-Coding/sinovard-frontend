<?php

namespace App\Models;

use App\Helpers\Helper;
use App\Traits\ModelHelperTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Lang;

class Team extends Model
{
    use ModelHelperTrait;

    protected $table = 'teams';

    protected $fillable = ['file_id', 'sort', 'status', 'created_at', 'updated_at'];

    public static function rules()
    {
        return [
            'file_id' => 'integer|nullable',
            'sort' => 'integer|nullable',
            'status' => 'string|nullable',
            'created_at' => 'datetime|nullable',
            'updated_at' => 'datetime|nullable',
        ];
    }

    public function translate(): HasOne
    {
        return $this->hasOne(TeamTranslate::class, 'team_id')->where('lang', Helper::getLangId(Lang::getLocale()))->withDefault();
    }
}

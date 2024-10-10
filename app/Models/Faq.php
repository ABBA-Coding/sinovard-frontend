<?php

namespace App\Models;

use App\Helpers\Helper;
use App\Traits\ModelHelperTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Lang;

class Faq extends Model
{
    use ModelHelperTrait;

    protected $table = 'faqs';

    protected $fillable = ['sort', 'status', 'created_at', 'updated_at'];

    protected $with = ['translate'];

    public static function rules()
    {
        return [
            'sort' => 'integer|nullable',
            'status' => 'nullable',
            'created_at' => 'date|nullable',
            'updated_at' => 'date|nullable',
        ];
    }

    public function translate(): HasOne
    {
        return $this->hasOne(FaqTranslate::class, 'faq_id')->where('lang', Helper::getLangId(Lang::getLocale()))->withDefault();
    }
}

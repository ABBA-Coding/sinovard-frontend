<?php

namespace App\Models;

use App\Helpers\Helper;
use App\Traits\ModelHelperTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Lang;

class Banner extends Model
{
    use ModelHelperTrait;

    const TYPE_HOME = 1;
    const TYPE_CATALOG = 2;

    protected $table = 'banners';

    protected $fillable = ['file_id', 'sort', 'type', 'status', 'created_at', 'updated_at'];

    protected $with = ['translate'];

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
        return $this->hasOne(BannerTranslate::class, 'banner_id')->where('lang', Helper::getLangId(Lang::getLocale()))->withDefault();
    }

    public static function getTypeLabel($type): string
    {
        switch ($type) {
            case self::TYPE_HOME:
                return 'Главная стр.';
            case self::TYPE_CATALOG:
                return 'Каталог';
            default:
                return '-';
        }
    }
}

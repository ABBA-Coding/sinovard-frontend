<?php


namespace App\Helpers;


class Helper
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    public static function getLangId($lang = null)
    {
        if (empty($lang)) {
            $lang = 'ru';
        }
        return config('env.LOCALES')[$lang];
    }

    public static function getLangCode($langID)
    {
        $codes = config('env.LOCALES');
        return array_search($langID, $codes);
    }

    public static function getCurrency($currency)
    {
        $path = config('currency.path');

        $str = file_get_contents($path.'/'.$currency.'/'.'currency.json');
        $data = json_decode($str);

        return $data->Rate;
    }
}

<?php

namespace App\Models;

use App\Traits\ModelHelperTrait;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use ModelHelperTrait;

    protected $table = 'brands';

    protected $fillable = ['name_ru', 'name_uz', 'name_en', 'slug', 'file_id', 'parent_id','sort','status'];

    public static function rules()
    {
        return [
            'name_ru' => 'string|required',
            'file_id' => 'integer|required',
            'sort' => 'integer|nullable',
            'status' => 'nullable',
            'created_at' => 'date|nullable',
            'updated_at' => 'date|nullable',
        ];
    }

    public static function getCategoryTree()
    {
        $arr = self::orderBy('sort')->get();
        // Запускаем рекурсивную постройку дерева и отдаем на выдачу
        return self::buildTree($arr, 0);
    }

    // Сама функция рекурсии
    public static function buildTree($arr, $pid = 0) {
        // Находим всех детей раздела
        $found = $arr->filter(function($item) use ($pid){
            return $item->parent_id == $pid;
        });

        // Каждому детю запускаем поиск его детей
        foreach ($found as $key => $cat) {
            $sub = self::buildTree($arr, $cat->id);
            $cat->sub = $sub;
        }

        return $found;
    }
}

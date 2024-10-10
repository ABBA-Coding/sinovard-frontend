<?php

namespace App\Models;

use App\Traits\ModelHelperTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Filemanager\Entities\Files;

class Category extends Model
{
    use ModelHelperTrait;

    protected $table = 'categories';

    protected $fillable = ['name_ru', 'name_uz', 'name_en', 'slug', 'description_ru', 'description_uz', 'file_id', 'icon_id', 'parent_id','sort','status'];

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

    public function icon(): BelongsTo
    {
        return $this->belongsTo(Files::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id', 'id')->orderBy('sort');
    }

    public static function getCategoryTree()
    {
        $arr = self::orderBy('sort')->withCount('children')->get();
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

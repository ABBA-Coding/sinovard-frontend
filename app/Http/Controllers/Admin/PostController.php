<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\CrudController;
use App\Models\PostTranslate;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;

/**
 * @group Post
 *
 */
class PostController extends CrudController
{
    public $modelClass = Post::class;

    public $folderName = 'posts';

    public function index(Request $request)
    {
        $data = $this->modelClass::where('type', Post::TYPE_POST)->orderBy('published_at', 'desc')->paginate(15);
        return view('admin.'.$this->folderName.'.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate($this->modelClass::rules());

        $model = $this->modelClass::create($request->all());

        $this->createOrUpdateTranslate($model, $request);

        return redirect()->route('admin.'.$this->folderName.'.edit', ['id'=>$model->id])->with(['success'=>'Успешно сохранено']);
    }

    public function update(Request $request, $id)
    {
        $request->validate($this->modelClass::rules());

        $model = $this->modelClass::findOrFail($id);
        $model->update($request->all());

        $this->createOrUpdateTranslate($model, $request);

        return redirect()->back()->with(['success'=>'Успешно обновлено']);
    }

    /**
     * @param $model
     * @param $request
     * @return PostTranslate
     */
    protected function createOrUpdateTranslate($model, $request): PostTranslate
    {
        $translate = PostTranslate::where('lang', Helper::getLangId(Lang::getLocale()))->where('post_id', $model->id)->first();

        $request->merge([
            'post_id' => $model->id,
            'lang' => Helper::getLangId(Lang::getLocale())
        ]);

        if ($translate instanceof PostTranslate) {
            $translate->update($request->all());
        } else {
            $translate = PostTranslate::create($request->all());
        }

        if ($translate->lang == Helper::getLangId('ru')) {
            Post::where('id', $translate->post_id)->update([
                'slug' => Str::slug($translate->title)
            ]);
        }

        return $translate;
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\CrudController;
use App\Models\Faq;
use App\Models\FaqTranslate;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;

/**
 * @group Post
 *
 */
class FaqController extends CrudController
{
    public $modelClass = Faq::class;

    public $folderName = 'faqs';

    public function index(Request $request)
    {
        $data = $this->modelClass::orderBy('sort', 'asc')->paginate(15);
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
     * @return FaqTranslate
     */
    protected function createOrUpdateTranslate($model, $request): FaqTranslate
    {
        $translate = FaqTranslate::where('lang', Helper::getLangId(Lang::getLocale()))->where('faq_id', $model->id)->first();

        $request->merge([
            'faq_id' => $model->id,
            'lang' => Helper::getLangId(Lang::getLocale())
        ]);

        if ($translate instanceof FaqTranslate) {
            $translate->update($request->all());
        } else {
            $translate = FaqTranslate::create($request->all());
        }

        return $translate;
    }
}

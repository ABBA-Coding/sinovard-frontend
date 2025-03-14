<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\CrudController;
use App\Models\Banner;
use App\Models\BannerTranslate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;

/**
 * @group Banner
 *
 */
class BannerController extends CrudController
{
    public $modelClass = Banner::class;

    public $folderName = 'banners';

    public function index(Request $request)
    {
        $data = $this->modelClass::orderBy('type', 'asc')->orderBy('sort', 'asc')->paginate(15);
        return view('admin.'.$this->folderName.'.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate($this->modelClass::rules());

        DB::beginTransaction();
        try {
            $model = $this->modelClass::create($request->all());
            $this->createOrUpdateTranslate($model, $request);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['errorMessage' => $exception->getMessage()], 422);
        }

        return redirect()->route('admin.'.$this->folderName.'.edit', ['id'=>$model->id])->with(['success'=>'Успешно сохранено']);
    }

    public function update(Request $request, $id)
    {
        $request->validate($this->modelClass::rules());

        DB::beginTransaction();
        try {
            $model = $this->modelClass::findOrFail($id);
            $model->update($request->all());

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['errorMessage' => $exception->getMessage()], 422);
        }

        $this->createOrUpdateTranslate($model, $request);

        return redirect()->back()->with(['success'=>'Успешно обновлено']);
    }

    /**
     * @param $model
     * @param $request
     * @return BannerTranslate
     */
    protected function createOrUpdateTranslate($model, $request): BannerTranslate
    {
        $translate = BannerTranslate::where('lang', Helper::getLangId(Lang::getLocale()))->where('banner_id', $model->id)->first();

        $request->merge([
            'banner_id' => $model->id,
            'lang' => Helper::getLangId(Lang::getLocale())
        ]);

        if ($translate instanceof BannerTranslate) {
            $translate->update($request->all());
        } else {
            $translate = BannerTranslate::create($request->all());
        }

        return $translate;
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CrudController;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends CrudController
{
    public $modelClass = Brand::class;

    public $folderName = 'brands';

    public function index(Request $request)
    {
        $data =  $this->modelClass::getCategoryTree();
        return view('admin.'.$this->folderName.'.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate($this->modelClass::rules());
        $reqData = $request->all();
        $reqData['slug'] = Str::slug($reqData['name_ru']);

        $model = $this->modelClass::create($reqData);

        return redirect()->route('admin.'.$this->folderName.'.edit', ['id'=>$model->id])->with(['success'=>'Успешно сохранено']);
    }

    public function nestable(Request $request)
    {
        $data = $request->input('nestable');
        if ($data) {
            $array = json_decode($data);
            $this->recursion($array);
        }

        return redirect()->back()->with('success', 'Успешно обновлено');
    }

    private function recursion($array)
    {
        if (count($array)) {
            $i = 1;
            foreach ($array as $arr) {
                $this->modelClass::where('id', $arr->id)->update(['sort' => $i]);
                if (isset($arr->children)) {
                    $this->recursion($arr->children, $arr->id);
                }
                $i++;
            }
        }
    }
}

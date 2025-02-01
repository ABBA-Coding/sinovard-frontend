<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\CrudController;
use App\Models\Brand;
use App\Models\Category;
use App\Models\PostTranslate;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductTranslate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;

/**
 * @group Post
 *
 */
class ProductController extends CrudController
{
    public $modelClass = Product::class;

    public $folderName = 'products';

    public function index(Request $request)
    {
        $query = $request->get('_query');

        $data = $this->modelClass::when(!empty($query), function ($q) use ($query) {
            $q->where('name', 'ilike', '%' . $query . '%')
                ->orWhere('vendor_code', 'ilike', '%' . $query . '%');
        })->orderBy('created_at', 'DESC')->paginate(15);

        if ($request->ajax()) {
            $view = view('admin.products.result', compact('data'))->render();

            return response()->json([
                'products_view' => $view,
            ]);
        }

        return view('admin.'.$this->folderName.'.index', compact('data'));
    }

    public function create(Request $request)
    {
        $data = $this->modelClass;
        $categories = Category::orderBy('sort', 'asc')->get();
        $brands = Brand::orderBy('sort', 'asc')->get();

        return view('admin.'.$this->folderName.'.create', compact('data', 'categories', 'brands'));
    }

    public function store(Request $request)
    {
        $request->validate($this->modelClass::rules());

        $model = $this->modelClass::create($request->all());

        $this->createOrUpdateTranslate($model, $request);

        return redirect()->route('admin.'.$this->folderName.'.edit', ['id'=>$model->id])->with(['success'=>'Успешно сохранено']);
    }

    public function edit($id, Request $request)
    {
        $data = $this->modelClass::findOrFail($id);
        $categories = Category::orderBy('sort', 'asc')->get();
        $brands = Brand::orderBy('sort', 'asc')->get();

        return view('admin.'.$this->folderName.'.edit', compact('data', 'categories', 'brands'));
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
     * @return ProductTranslate
     */
    protected function createOrUpdateTranslate($model, $request): ProductTranslate
    {
        $translate = ProductTranslate::where('lang', Helper::getLangId(Lang::getLocale()))->where('product_id', $model->id)->first();

        $request->merge([
            'product_id' => $model->id,
            'lang' => Helper::getLangId(Lang::getLocale())
        ]);

        if ($translate instanceof ProductTranslate) {
            $translate->update($request->all());
        } else {
            $translate = ProductTranslate::create($request->all());
        }

        if ($translate->lang == Helper::getLangId('ru')) {
            Product::where('id', $translate->product_id)->update([
                'slug' => Str::slug($translate->name)
            ]);
        }

        return $translate;
    }
}

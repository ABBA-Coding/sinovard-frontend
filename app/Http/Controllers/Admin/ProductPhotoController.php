<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductPhoto;
use Illuminate\Http\Request;

/**
 * @group ProductPhoto
 *
 */
class ProductPhotoController extends Controller
{
    public $modelClass = ProductPhoto::class;

    public $folderName = 'product-photos';

    public function index($product_id)
    {
        $product = Product::findOrFail($product_id);
        $data = $this->modelClass::orderBy('sort', 'ASC')->where('product_id', $product_id)->paginate(15);
        return view('admin.'.$this->folderName.'.index', compact('data', 'product'));
    }

    public function create($product_id)
    {
        $product = Product::findOrFail($product_id);
        $data = $this->modelClass;
        return view('admin.'.$this->folderName.'.create', compact('data', 'product'));
    }

    public function store(Request $request, $product_id)
    {
        $request->validate($this->modelClass::rules());
        $model = $this->modelClass::create($request->all());

        return redirect()->route('admin.'.$this->folderName.'.edit', ['product_id' => $product_id, 'id'=>$model->id])->with(['success'=>'Успешно сохранено']);
    }

    public function edit($product_id, $id)
    {
        $product = Product::findOrFail($product_id);
        $data = $this->modelClass::findOrFail($id);
        return view('admin.'.$this->folderName.'.edit', compact('data', 'product'));
    }

    public function update(Request $request, $product_id, $id)
    {
        $request->validate($this->modelClass::rules());

        $model = $this->modelClass::findOrFail($id);
        $model->update($request->all());

        return redirect()->back()->with(['success'=>'Успешно обновлено']);
    }

    public function destroy($product_id, $id)
    {
        $model = $this->modelClass::findOrFail($id);
        $model->delete();

        return redirect()->back()->with(['success'=>'Успешно удалено']);
    }
}

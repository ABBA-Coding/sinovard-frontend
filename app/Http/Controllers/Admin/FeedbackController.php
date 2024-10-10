<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

/**
 * @group Feedback
 *
 */
class FeedbackController extends Controller
{
    public $modelClass = Feedback::class;

    public $folderName = 'feedback';

    public function index(Request $request)
    {
        $data = $this->modelClass::filter($request->input())->orderBy('created_at', 'DESC')->paginate(15);
        return view('admin.'.$this->folderName.'.index', compact('data'));
    }

    public function show($id)
    {
        $data = $this->modelClass::findOrFail($id);
        if ($data->status === 0) {
            $data->status = 1;
            $data->save();
        }
        return view('admin.'.$this->folderName.'.show', compact('data'));
    }

    public function destroy($id)
    {
        $model = $this->modelClass::findOrFail($id);
        $model->delete();

        return redirect()->back()->with(['success'=>'Успешно удалено']);
    }
}

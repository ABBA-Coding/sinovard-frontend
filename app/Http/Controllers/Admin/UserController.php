<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public $modelClass = User::class;

    public function index()
    {
        $data = $this->modelClass::orderBy('created_at', 'desc')
            ->paginate(20);

        return view('admin.user.index', compact('data'));
    }

    public function form(Request $request)
    {
        if ($request->ajax()) {

            $id = $request->get('user_id');

            if ($id) {
                $data = $this->modelClass::findOrFail($id);
            } else {
                $data = new $this->modelClass;
            }

            $view = view('admin.user.form', compact('data'))->render();

            return response()->json(['view'=>$view], 200);
        }

        return response()->json(['errorMessage'=>'error'], 422);
    }

    public function post(Request $request, $id = null)
    {
        $data = $request->only(['name', 'email']);

        $password = $request->get('password');
        $data['login'] = Str::random(15);

        DB::beginTransaction();
        try {

            if ($id) {
                $request->validate([
                    'name' => 'required',
                    'email' => 'nullable|email|unique:users,email,'.$id,
                    'role' => 'required',
                ]);

                if (!empty($password)) {
                    $data['password'] = bcrypt($password);
                }

                $user = $this->modelClass::findOrFail($id);

                $user->update($data);
            } else {
                $request->validate([
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email',
                    'role' => 'required',
                    'password' => 'required'
                ]);

                if (!empty($password)) {
                    $data['password'] = bcrypt($password);
                }

                $user = $this->modelClass::create($data);
            }

            DB::table('roles')->updateOrInsert([
                'user_id' => $user->id
            ], [
                'role' => $request->get('role')
            ]);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());
        }

        return redirect()->back()->with('success', 'Успешно сохранено');
    }
}

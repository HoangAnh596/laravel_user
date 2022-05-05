<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserFormRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagesize = config('common.default_page_size');
        $userQuery = User::where('name', 'like', "%".$request->keyword."%")
            ->orwhere('email', 'like', "%".$request->keyword."%");
        //$users = User::all();
        $users = $userQuery->paginate($pagesize);
        $users->appends($request->except('page'));
//        dd($users->currentPage());
        return view('user.index', [
                'user_data' => $users
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('user.add', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        $model = new User();

        $model->fill($request->all());
        if($request->hasFile('file_upload')) {
            $newFileName = uniqid() . '-' . $request->file_upload->getClientOriginalName();
            $path = $request->file_upload->storeAs('public/uploads/users', $newFileName);
            $model->image = str_replace('public/', '', $path);
        }
        $model->save();

        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::find($id);
        if (!$users) {
            return redirect()->back();
        }
        return view('user.show', [
            'user_show' => $users
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);

        if (!$users) {
            return redirect()->back();
        }
        return view('user.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UserFormRequest $request)
    {
        $model = User::find($id);
        if(!$model) {
            return redirect(route('users.index'));
        }
        if($request->hasFile('file_upload')) {
            $newFileName = uniqid() . '-' . $request->file_upload->getClientOriginalName();
            $path = $request->file_upload->storeAs('public/uploads/users', $newFileName);
            $model->image = str_replace('public/', '', $path);
        }
        $model->fill($request->all());
        $model->save();

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('users.index')->with(['message' => 'Delete Success']);
    }
}

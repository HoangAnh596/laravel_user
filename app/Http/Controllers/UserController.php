<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserFormRequest;
use Illuminate\Http\Request;

class UserController extends Controller
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
            ->orWhere('email', 'like', "%".$request->keyword."%");
        // 1. Chưa check nếu người dùng nhập vào ô input thì mới search
        // 2. Escape giá trị khi search với điều kiện like
        // 4. Xóa hết debug / comment ko dùng đến
        $users = $userQuery->paginate($pagesize);
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        $users = new User();

        $users->fill($request->all());
        if($request->hasFile('file_upload')) {
            $newFileName = uniqid() . '-' . $request->file_upload->getClientOriginalName();
            $imagePath = $request->file_upload->storeAs('public/uploads/users', $newFileName);
            $users->image = str_replace('public/', '', $imagePath);
        }
        $users->save();
        // if($users->save()) {}

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
        $users = User::findOrFail($id);
        if (!$users) {

            return redirect()->back();
        }
        return view('user.show', compact('users'));
        // Update lại hàm này + thêm message báo lỗi
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::findOrFail($id); 

        if (!$users) {
            return redirect()->back();
            // Thêm message báo lỗi
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
        $users = User::find($id);
        if(!$users) {

            return redirect(route('users.index'));
        }
        if($request->hasFile('file_upload')) {
            $newFileName = uniqid() . '-' . $request->file_upload->getClientOriginalName();
            $imagePath = $request->file_upload->storeAs('public/uploads/users', $newFileName);
            $users->image = str_replace('public/', '', $imagePath);
        }
        $users->fill($request->all());
        $users->save();

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

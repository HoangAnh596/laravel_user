<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserFormRequest;
use App\Http\Service\EscapeService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $escapeService;
    public function __construct(EscapeService $escapeService)
    {
        $this->escapeService = $escapeService;
    }

    public function index(Request $request)
    {
        $users = new User();

        $pagesize = config('common.default_page_size');
        $keyword = $request->keyword;
        if ($keyword) {
            $users = $users->where('name', 'like', "%".$this->escapeService->escape_like($request->keyword)."%")
                         ->orWhere('email', 'like', "%".$this->escapeService->escape_like($request->keyword)."%");
        }
        $users = $users->paginate($pagesize)->appends($request->except('page'));

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('users.add');
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

        if($request->hasFile('file_upload')) {
            $newFileName = uniqid() . '-' . $request->file_upload->getClientOriginalName();
            $imagePath = $request->file_upload->storeAs('public/uploads/users', $newFileName);
            $users->image = str_replace('public/', '', $imagePath);
        }
        $users->fill($request->all());
        $users->save();

        return redirect(route('users.index'))->with(['message' => 'Add Success']);
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

        return view('users.show', compact('users'));
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

        return view('users.edit', compact('users'));
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
        $users = User::findOrFail($id);

        if($request->hasFile('file_upload')) {
            $newFileName = uniqid() . '-' . $request->file_upload->getClientOriginalName();
            $imagePath = $request->file_upload->storeAs('public/uploads/users', $newFileName);
            $users->image = str_replace('public/', '', $imagePath);
        }
        $users->fill($request->all());
        $users->save();

        return redirect(route('users.index'))->with(['message' => 'Update Success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        User::destroy($user->id);

        return redirect()->route('users.index')->with(['message' => 'Delete Success']);
    }
}

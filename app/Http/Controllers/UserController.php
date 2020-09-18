<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=(new User)->getAllUsers();
        return view('backend.user.all',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'phone'=>'numeric|nullable',
            'occupation'=>'string|nullable',
            'address'=>'string|nullable',
            'is_admin'=>'required|boolean',
        ]);
        (new User)->storeUser($data);
        return redirect()->route('user.index')->with(['success'=>'user created successflly']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=(new User)->getUserById($id);
        return view('backend.user.edit' ,compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=$request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'numeric|nullable',
            'occupation'=>'string|nullable',
            'address'=>'string|nullable',
            'is_admin'=>'required|boolean',
        ]);
      (new User)->updateUser($request,$id);
      return redirect()->route('user.index')->with(['success'=>'user updated successfully!']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        (new User)->deleteUser($id);
        return redirect()->route('user.index')->with(['success'=>'user deleted successfully!']);
    }
}

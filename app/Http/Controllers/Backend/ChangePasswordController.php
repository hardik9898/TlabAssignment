<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;

class ChangePasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        return view('backend.change_password.index');
    }


    /**
     * Update password
     * @param   $request
     * 
     */
    public function update(Request $request)
    {
        $rules = [
            'c_psw' => 'required',
            'new_psw' => 'required',
            'c_new_psw' => 'required|same:new_psw',
        ];
    
        $customMessages = [
            'c_psw.required' =>'Current Password is required.',
            'new_psw.required' =>'New Password is required.',
            'c_new_psw.required'=>'Confirm New Password is required.',
            'c_new_psw.same'=>'Password Not Matching.'
        ];
    
        $this->validate($request, $rules, $customMessages);
        $userId = auth()->user()->id;
        $user = User::find($userId);
        $dbPsw = $user->passwod;

        $user = User::find($userId);
        $hasher = app('hash');
        if (!$hasher->check($request->input('c_psw'), $user->password)) {
            return redirect()->back()->with('ErrorMsg','Current Password is Wrong');
        }

        $user->password = bcrypt($request->new_psw);
        $user->save();
        auth()->logout();
        return redirect()->route('admin.login');
    }

  
}

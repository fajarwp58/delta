<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:13'],
            'alamat' => ['required', 'string', 'min:255'],
            'username' => ['required', 'string', 'max:255', 'unique:user'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    public function data()
    {
        $user = User::with(['role'])->get();
        return DataTables::of($user)->toJson();
    }

    public function create(Request $request){
        $valid = User::where('user_id',$request->user_id)->count();

        if($valid != 0){
             $message = ['error' => 'Data Telah ada,Gagal menambahkan!'];
             return response()->json($message);
        }

        else{

         $user = new User;
         $user->user_id = $request->user_id;
         $user->nama = $request->nama;
         $user->phone = $request->phone;
         $user->alamat = $request->alamat;
         $user->role_id = $request->role_id;
         $user->username = $request->username;
         $user->password = Hash::make($request['password']);


         $user->save();
        }
    }

    // public function update(Request $request,$id){

    //     $user = User::where('user_nrp',$id)->first();
    //     $user->user_nama = $request->user_nama;
    //     $user->pangkat_id = $request->pangkat_id;
    //     $user->update();
    // }

    // public function delete($id)
    // {

    //   User::where('user_nrp', $id)->delete();

    // }

    // public function listrole(){
    //     $role = Role::whereIn('role_id',[2,3])
    //     ->get();
    //     return json_encode($role);
    // }

}

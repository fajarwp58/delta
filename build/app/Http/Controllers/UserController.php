<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{

    public function index(){
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = mt_rand(1000, 9999)
            . $characters[rand(0, strlen($characters) - 1)];
        $AWAL = 'US';

        $idmodal = $AWAL .'-'.str_shuffle($pin);

        return view('user',['idmodal'=>$idmodal]);
    }

    public function register(){
        // Available alpha caracters
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // generate a pin based on 2 * 7 digits + a random character
        $pin = mt_rand(1000, 9999)
            . $characters[rand(0, strlen($characters) - 1)];

        // shuffle the result
        $AWAL = 'US';

        $id = $AWAL .'-'.str_shuffle($pin);

        return view('auth.register',['id'=>$id]);
    }

    public function data()
    {
        $user = User::with(['role'])->get();
        return DataTables::of($user)->toJson();
    }

    public function create(Request $request){
        request()->validate([
            'nama' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:13'],
            'alamat' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:5'],
        ],
            [
                'nama.required'=> 'masukan nama anda',
                'phone.required'=> 'masukan nomor hp anda',
                'alamat.required'=> 'masukan alamat anda',
                'username.required'=> 'username tidak boleh kosong / username telah ada',
                'password.required'=> 'password tidak boleh kosong',
            ]);


         $user = new User;
         $user->user_id = $request->user_id;
         $user->nama = $request->nama;
         $user->phone = $request->phone;
         $user->alamat = $request->alamat;
         $user->role_id = $request->role_id;
         $user->username = $request->username;
         $user->password = Hash::make($request['password']);


         $user->save();
         return redirect('login');

    }

    public function update(Request $request,$id){

        $user = User::where('user_id',$id)->first();
        $user->nama = $request->nama;
        $user->phone = $request->phone;
        $user->alamat = $request->alamat;
        $user->update();
    }

    public function delete($id)
    {

      User::where('user_id', $id)->delete();

    }

    public function listrole(){
        $role = Role::whereIn('role_id',['R02','R03'])
        ->get();
        return json_encode($role);
    }

}

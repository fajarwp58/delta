<?php

namespace App\Http\Controllers;
Use App\User;
Use App\Role;
use App\WaktuBooking;
Use Illuminate\Support\Facades\Auth;
use PDF;

use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){

        $datamember = User::with(['role'])->where('user_id', Auth::User()->user_id)->get();

        return view('profile', compact('datamember'));
    }

    public function dataPasien()
    {
        $user = User::with(['role'])->where('user_id', Auth::User()->user_id)->get();
        return DataTables::of($user)->toJson();
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

    public function listrolePasien(){
        $role = Role::where('role_id','R03')
        ->get();
        return json_encode($role);
    }

    public function printCard(Request $request){
        $datamember = array();
        foreach($request['user_id'] as $user_id){
            $member = User::find($user_id);
            $datamember[] = $member;
        }

        $pdf = PDF::loadView('card',
        compact('datamember'));
        $pdf->setPaper(array(0, 0, 566.93, 850.39), 'potrait');
        return $pdf->stream();
    }


}

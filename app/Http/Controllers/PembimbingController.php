<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pembimbings;
use Illuminate\Support\Facades\Auth;


class PembimbingController extends Controller
{
    public function index()
    {
        return view ('pembimbing/index');
    }
    public function dataPeserta()
    {
        
        return view ('pembimbing/pages/peserta');
    }
    public function dataPertemuan()
    {
        return view ('pembimbing/pages/pertemuan');
    }
    public function dataDetailAbsensi()
    {
        return view ('pembimbing/pages/detailabsensi');
    }
    public function dataTambahPertemuan()
    {
        return view ('pembimbing/pages/tambahpertemuan');
    }
    public function dataEditAbsensi()
    {
        return view ('pembimbing/pages/editabsensi');
    }
    public function dataDetailKinerja()
    {
        return view ('pembimbing/pages/detailkinerja');
    }

    public function loginPembimbing(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);
            // die;

            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required',
            ];

            $customMessages = [
                'email.required' => 'Email is Required',
                'email.email' => 'Valid Email is Required',
                'password.required' => 'Password is Required',
            ];

            $this->validate($request, $rules, $customMessages);

            if(Auth::guard('pembimbing')->attempt(['email'=>$data['email'], 'password'=>$data['password']])){
            return redirect('pembimbing/index');
            }else{
            return redirect()->back()->with('error_message','Invalid Email or Password');
            }
        }
    return view('form.login_pembimbing');
    }   
    public function logout(){
        Auth::guard('pembimbing')->logout();
        return redirect('pembimbing/');
    }
}

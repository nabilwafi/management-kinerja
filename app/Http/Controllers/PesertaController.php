<?php

namespace App\Http\Controllers;

use App\Models\Absensis;
use App\Models\Pesertas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Stevebauman\Location\Facades\Location;
use PDO;

class PesertaController extends Controller
{
    public function index()
    {
        $data = [
            'link' => 'overview'
        ];

        return view('peserta/index', $data);
    }

    public function kegiatanku()
    {
        $data = [
            'link' => 'kegiatan'
        ];

        return view('peserta/kegiatanku/index', $data);
    }

    public function dataAbsensi()
    {
        $data = [
        'link' => 'absensi'
        ];
        // $dataAbsensiDetail = Absensis::all();
        $dataAbsensiDetail = Absensis::where('id_peserta', Auth::guard('peserta')->user()->id)->get();

            // echo "<pre>"; print_r($dataAbsensiDetail); die;
        return view('peserta/absensi/index', $data)->with(compact('dataAbsensiDetail'));
    }

    public function historyKegiatan()
    {
        $data = [
            'link' => 'h_kegiatan'
        ];

        return view('peserta/history/index', $data);
    }

    public function detailKegiatan()
    {
        $data = [
            'link' => 'detail_kegiatan'
        ];

        return view('peserta/detail_kegiatan/index', $data);
    }

    public function login(Request $request){
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

            if(Auth::guard('peserta')->attempt(['email'=>$data['email'], 'password'=>$data['password']])){
            return redirect('peserta/');
            }else{
            return redirect()->back()->with('error_message','Invalid Email or Password');
            }
        }
    return view('form.login');
    }   

    public function logout(){
        Auth::guard('peserta')->logout();
        return redirect('peserta/login');
    }

    public function register(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'nama_peserta' => 'required',
                'email' => 'required|unique:pesertas|email',
                'password' => 'required',
                'instansi' =>'required',
                'jurusan'=>'required',
            ]);

            $peserta = new Pesertas([
                'nama_peserta' => $request->nama_peserta,
                'email' => $request->email,
                'instansi_pendidikan' => $request->instansi,
                'jurusan' => $request->jurusan,
                'password'=> Hash::make($request->password),
            ]);
            $peserta->save();
            
            return redirect('')->with('success', 'Registration Success, Please Login!');
        }
        
    }

    // public function updateJam()

    public function viewAbsen(Request $request, $id){

        $data = [
            'link' => 'absensi'
            ];
        // $ip = $request->ip();
        // $lokasi = Location::get($ip);
        $Absensi = Absensis::where('id',$id)->first();
        $Absensi = json_decode(json_encode($Absensi),true);
        // dd($ip);
        return view('peserta.absensi.absen', $data)->with(compact('Absensi'));
    }


    public function absen(Request $request, $id, $id_peserta){
        if ($request->isMethod('post')){
            $data = Absensis::where('id', $id)->first();
            $data->jam = date('H:i:s');
            $data->status = "menunggu verifikasi";
            $data->keterangan = $request->keterangan;

            // Absensis::where('id', Auth::guard('peserta')->user()->id)->update(['jam'=>date('H:i:s'), 'status'=>'menunggu verifikasi', 'keterangan'=>$data['keterangan']]);
        }
        $dataAbsensiDetail = Absensis::where('id_peserta', Auth::guard('peserta')->user()->id)->get();
        $data = [
            'link' => 'absensi'
            ];
        return view ('peserta/absensi/index', $data)->with(compact('dataAbsensiDetail'));
    }
}
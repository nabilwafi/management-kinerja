<?php

namespace App\Http\Controllers;

use App\Models\Detail_Kinerjas;
use App\Models\Kinerjas;
use Illuminate\Http\Request;
use App\Models\Absensis;
use App\Models\Pesertas;
use App\Models\Pembimbings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PesertaController extends Controller
{
    protected $kinerjas;
    protected $detail_kinerjas;
    protected $pesertas;
    public function __construct()
    {
        $this->kinerjas = new Kinerjas();
        $this->detail_kinerjas = new Detail_Kinerjas();
        $this->pesertas = new Pesertas();
    }

    public function index()
    {
        $id = Auth::guard('peserta')->user()->id;
        $peserta = Pesertas::find($id);
        
        $data = [
            'peserta' => $this->pesertas->pesertaWithPembimbing($id)->first(),
            'kinerja' => $this->kinerjas->kinerjaJoinDetailFilterByPeserta($id)->first(),
            'sub_kegiatans' => $this->kinerjas->subKegiatanWithKinerja($id)->get()
        ];
        
        // dd($data['peserta']);
        $type = $peserta['type'];

        if($type=='belum terverifikasi')
        {
            return redirect()->back()->with('message','Akun belum terverifikasi');

        }else{
            return view('peserta/index', $data);
        }
    }

    public function updateSubKegiatanAndStatusKegiatan(Request $request, $id_kinerja, $id_peserta)
    {
        if($request->has('sub_kegiatan_diambil')) {
            $detail_kinerja = new Detail_Kinerjas();
            $detail_kinerja->id_kinerja = $id_kinerja;
            $detail_kinerja->mulai_kinerja = date('Y-m-d H:i:s');
            $detail_kinerja->sub_kegiatan_diambil = $request->sub_kegiatan_diambil;

            if($detail_kinerja->save()) {
                return redirect()->to('/peserta/kegiatanku/'.$id_peserta)->with('success', 'Success Selected Sub Category');
            }else {
                return redirect()->back()->withInput()->with('error', 'Failed Selected Sub Category, Please check again!');
            }

        }else {
            return redirect()->back()->withInput()->with('error', 'Need Input Sub Category');
        }
    }

    public function updateStatusKegiatanAndSelesaiKinerja(Request $request, $id_kinerja, $id_peserta)
    {
        if($request->has('keterangan')) {
            $detail_kinerja = Detail_Kinerjas::where('id_kinerja', $id_kinerja)->latest()->first();
            $detail_kinerja->selesai_kinerja = date('Y-m-d H:i:s');
            $detail_kinerja->status_kegiatan = 'selesai';
            $detail_kinerja->keterangan = $request->keterangan;

            // dd($id_kinerja);

            if($detail_kinerja->save()) {
                return redirect()->to('/peserta/kegiatanku/'.$id_peserta)->with('success', 'Success Selected Sub Category');
            }else {
                return redirect()->back()->withInput()->with('error', 'Failed Selected Sub Category, Please check again!');
            }

        }else {
            return redirect()->back()->withInput()->with('error', 'Need Input Sub Category');
        }
    }

    public function kegiatanku($peserta)
    {
        
        $data = [
            'peserta' => $this->pesertas->pesertaWithPembimbing($peserta)->first(),
            'kinerja' => $this->kinerjas->getIdPesertaFromKinerja($peserta)->first(['kinerjas.id_peserta']),
            'kegiatan' => $this->kinerjas->getKinerjaFilterByStatusKegiatanMelakukanAktivitas()->first()
        ];

        // dd($data['kegiatan']);

        return view('peserta/kegiatanku/index', $data);
    }

    public function dataAbsensi()
    {
        $data = [
        'link' => 'absensi',
        ];
        // $dataAbsensiDetail = Absensis::all();
        // $pembimbing = Pembimbings::all();
        // $namaPembimbing = Absensis::where('id_pembimbing', $pembimbing['id'])->get();
        $dataAbsensiDetail = Absensis::where('id_peserta', Auth::guard('peserta')->user()->id)->orderBy('no_pertemuan')->get();

        $pembimbing = Pesertas::where('id', Auth::guard('peserta')->user()->id)->value('id_pembimbing');
        $namaPembimbing = Pembimbings::where('id', $pembimbing)->value('nama_pembimbing');
        $absensi = Absensis::where('id_peserta', Auth::guard('peserta')->user()->id)->get()->count();
        $hadir = Absensis::where('id_peserta', Auth::guard('peserta')->user()->id)->where('keterangan','Hadir')->where('status','terverifikasi')->get()->count();
        if($absensi == 0){
            $persentase = 0;
        }else{
            $persentase = $hadir/$absensi*100;
        }
        $peserta = $this->pesertas->pesertaWithPembimbing(Auth::guard('peserta')->user()->id)->first();
        $kinerja = $this->kinerjas->getIdPesertaFromKinerja(Auth::guard('peserta')->user()->id)->first(['kinerjas.id_peserta']);
        $kegiatan = $this->kinerjas->kinerjaJoinDetailFilterByPeserta(Auth::guard('peserta')->user()->id)->first();

            // echo "<pre>"; print_r($dataAbsensiDetail); die;
        return view('peserta/absensi/index', $data)->with(compact('dataAbsensiDetail','absensi','hadir','persentase', 'peserta', 'kinerja', 'kegiatan','namaPembimbing'));
    }

    public function historyKegiatan($peserta)
    {
        $data = [
            'peserta' => $this->pesertas->pesertaWithPembimbing($peserta)->first(),
            'kinerja' => $this->kinerjas->getIdPesertaFromKinerja($peserta)->first(['kinerjas.id_peserta']),
            'kegiatan' => $this->kinerjas->kinerjaJoinDetailFilterByPeserta($peserta)->first(),
            'detail_kinerjas' => $this->detail_kinerjas->detailKinerjaByIdPeserta($peserta)->paginate(5)
        ];

        // dd($data['detail_kinerjas']);

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
            // dd($data);

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


    public function viewAbsen($id)
    {
        $Absensi = Absensis::where('id',$id)->first();
        
        $data = [
            'link' => 'absensi',
            'peserta' => $this->pesertas->pesertaWithPembimbing(Auth::guard('peserta')->user()->id)->first(),
            'kinerja' => $this->kinerjas->getIdPesertaFromKinerja(Auth::guard('peserta')->user()->id)->first(['kinerjas.id_peserta']),
            'kegiatan' => $this->kinerjas->getKinerjaFilterByStatusKegiatanMelakukanAktivitas()->first(),
            'Absensi' => json_decode(json_encode($Absensi),true)
        ];

        return view('peserta/absensi/absen', $data);
    }


    public function absen(Request $request, $id)
    {
        if ($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                
            ];

            $this->validate($request, $rules);

            Absensis::where('id', $id)->update(['jam'=>date('H:i:s'), 'status'=>'menunggu verifikasi', 'keterangan'=>$data['keterangan'], 'latitude'=>$data['latitude'], 'longitude'=>$data['longitude']]);
        }

        return redirect()->to('/peserta/absensi/'.Auth::guard('peserta')->user()->id);
    }

    
}
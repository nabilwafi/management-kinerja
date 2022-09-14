<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Absensis;
use App\Models\Pesertas;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Support\Facades\Auth;
set_time_limit(300);

class PembimbingController extends Controller
{
    public function index()
    {
        $pesertas = DB::table('pesertas')->get();
        return view ('pembimbing/index', [
            "title" => "Dashboard",
            "peserta" => $pesertas
        ]);
    }

    public function dataPeserta()
    {
        $pesertas = DB::table('pesertas')->get();
        return view ('pembimbing/pages/peserta', [
            "title" => "Peserta",
            "pesertas" => $pesertas
        ]);
    }

    public function verifikasiPeserta($id){
        $peserta = Pesertas::find($id);
        $peserta->type="terverifikasi";
        $peserta->save();

        return redirect()->back();
    }

    public function dataPertemuan()
    {
        return view ('pembimbing/pages/pertemuan');
    }

    public function dataDetailAbsensi($id)
    {

        $dataAbsensi = Absensis::where('id_peserta', $id)->orderBy('no_pertemuan')->get();
        $peserta = Pesertas::where('id',$id)->pluck('nama_peserta')->first();
        $ids = Pesertas::where('id', $id)->pluck('id')->first();
        $absensi = Absensis::where('id_peserta', $id)->get()->count();
        $hadir = Absensis::where('id_peserta', $id)->where('keterangan','Hadir')->where('status','terverifikasi')->get()->count();
        if($absensi == 0){
            $persentase = 0;
        }else{
            $persentase = $hadir/$absensi*100;
        }
        return view('pembimbing.pages.detailabsensi')->with(compact('dataAbsensi','absensi','hadir','persentase','peserta','ids'));
    }

    public function deleteAbsensi($id)
    {
        DB::table('absensis')->where('id', $id)->delete();
        return redirect('pembimbing/peserta');
    }

    public function dataTambahPertemuan($id)
    {
        $datas = $id;
        return view ('pembimbing/pages/tambahpertemuan', [
            'data' => $datas
        ]);
    }

    public function tambahPertemuan(Request $request)
    {
        DB::table('absensis')->insert([
            'id_peserta' => $request->id_peserta,
            'no_pertemuan' => $request->no_pertemuan,
            'tanggal_pertemuan' => $request->tanggal_pertemuan
        ]);

        return redirect('pembimbing/peserta');
    }

    public function dataEditAbsensi($id)
    {
        $absensis = DB::table('absensis')->where('id', $id)->get();
        return view ('pembimbing/pages/editabsensi', [
            "Title" => "Edit Absensi",
            'absensi' => $absensis
        ]);
    }

    public function saveEditAbsensi(Request $request)
    {
        DB::table('absensis')->where('id', $request->id)->update([
            'no_pertemuan' => $request->no_pertemuan,
            'tanggal_pertemuan' => $request->tanggal_pertemuan,
            'jam' => $request->jam,
            'lokasi' => $request->lokasi,
            'status' => $request->status,
            'keterangan' => $request->keterangan
        ]);

        return redirect('pembimbing/peserta/');
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

    public function dataDetailKinerja($id)
    {
        $detailkinerjas = DB::table('pesertas')->where('id', $id)->pluck('id')->first();
        // dd($detailkinerjas);
        $kinerjas = DB::table('kinerjas')
                ->join('detail_kinerjas', 'kinerjas.id', 'detail_kinerjas.id_kinerja')
                ->join('kegiatans', 'kegiatans.id', '=', 'kinerjas.id_kegiatan')
                ->join('sub_kegiatans', 'sub_kegiatans.id', '=', 'detail_kinerjas.sub_kegiatan_diambil')
                ->select(['kinerjas.*','sub_kegiatans.*','kegiatans.*', 'detail_kinerjas.status_kegiatan'])
                ->selectRaw('TIME_FORMAT(TIMEDIFF(detail_kinerjas.selesai_kinerja,detail_kinerjas.mulai_kinerja), "%H") AS hours')
                ->selectRaw('TIME_FORMAT(TIMEDIFF(detail_kinerjas.selesai_kinerja,detail_kinerjas.mulai_kinerja), "%i") AS minutes')
                ->selectRaw('TIME_FORMAT(TIMEDIFF(detail_kinerjas.selesai_kinerja,detail_kinerjas.mulai_kinerja), "%s") AS seconds')
                ->where('kinerjas.id_peserta', $id)
                ->where('detail_kinerjas.status_kegiatan', '=', 'selesai')
                ->get();
        $totals = DB::table('kinerjas')
        ->join('detail_kinerjas', 'kinerjas.id', 'detail_kinerjas.id_kinerja')
        ->join('kegiatans', 'kegiatans.id', '=', 'kinerjas.id_kegiatan')
        ->join('sub_kegiatans', 'sub_kegiatans.id', '=', 'detail_kinerjas.sub_kegiatan_diambil')
        ->where('kinerjas.id_peserta', $id)
        ->where('detail_kinerjas.status_kegiatan', '=', 'selesai')
        ->selectRaw('sum(TIME_FORMAT(TIMEDIFF(detail_kinerjas.selesai_kinerja,detail_kinerjas.mulai_kinerja), "%H")) AS hours')
        ->selectRaw('sum(TIME_FORMAT(TIMEDIFF(detail_kinerjas.selesai_kinerja,detail_kinerjas.mulai_kinerja), "%i")) AS minutes')
        ->selectRaw('sum(TIME_FORMAT(TIMEDIFF(detail_kinerjas.selesai_kinerja,detail_kinerjas.mulai_kinerja), "%s")) AS seconds')
        ->first();
        $id_kegiatans = DB::table('kinerjas')
                ->select(['kinerjas.id_kegiatan'])
                ->where('kinerjas.id_peserta', $id)
                ->first();
        $sub_kegiatans = DB::table('sub_kegiatans')
                ->where('id_kegiatan', $id_kegiatans->id_kegiatan)
                ->get();
        $ids = DB::table('kinerjas')
                ->join('sub_kegiatans', 'sub_kegiatans.id_kegiatan', '=', 'kinerjas.id_kegiatan')
                ->where('kinerjas.id_peserta', $id)
                ->pluck('sub_kegiatans.id')
                ->first();
        return view ('pembimbing/pages/detailkinerja', [
            "title" => "Detail Kinerja",
            'detailkinerja' => $detailkinerjas,
            'kinerja' => $kinerjas,
            'sub_kegiatan' => $sub_kegiatans,
            'id' => $ids,
            'total' => $totals
        ]);
    }

    public function cetak_pdf($id)
    {
        $namas = DB::table('pesertas')
        ->where('id', $id)
        ->pluck('nama_peserta')
        ->first();
        $instansis = DB::table('pesertas')
        ->where('id', $id)
        ->pluck('instansi_pendidikan')
        ->first();
        $kegiatans = DB::table('pesertas')
        ->join('kinerjas', 'kinerjas.id_peserta', '=', 'pesertas.id')
        ->join('kegiatans', 'kegiatans.id', '=', 'kinerjas.id_kegiatan')
        ->where('pesertas.id', $id)
        ->pluck('kegiatans.kegiatan')
        ->first();
        $totals = DB::table('detail_kinerjas')
        ->join('sub_kegiatans', 'detail_kinerjas.sub_kegiatan_diambil', 'sub_kegiatans.id')
        ->select('sub_kegiatan')
        ->distinct('sub_kegiatan')
        ->where('status_kegiatan', '=',  'selesai')
        ->groupby('sub_kegiatan')
        ->selectRaw('sum(TIME_FORMAT(TIMEDIFF(detail_kinerjas.selesai_kinerja,detail_kinerjas.mulai_kinerja), "%H")) AS hours')
        ->selectRaw('sum(TIME_FORMAT(TIMEDIFF(detail_kinerjas.selesai_kinerja,detail_kinerjas.mulai_kinerja), "%i")) AS minutes')
        ->selectRaw('sum(TIME_FORMAT(TIMEDIFF(detail_kinerjas.selesai_kinerja,detail_kinerjas.mulai_kinerja), "%s")) AS seconds')
        ->get();
        $pdf = FacadePdf::loadview('pembimbing/pages/peserta_pdf', ['total' => $totals, 'nama' => $namas, 'instansi' => $instansis, 'kegiatan' => $kegiatans]);
        return $pdf->download('laporan-peserta.pdf');
    }

    public function cetak_absensi($id)
    {
        $dataAbsensi = Absensis::where('id_peserta', $id)->orderBy('no_pertemuan')->get();
        $peserta = Pesertas::where('id',$id)->value('nama_peserta');
        $instansi = Pesertas::where('id',$id)->pluck('instansi_pendidikan')->first();
        $jurusan = Pesertas::where('id',$id)->pluck('jurusan')->first();
        // $ids = Pesertas::where('id', $id)->pluck('id')->first();
        $absensi = Absensis::where('id_peserta', $id)->get()->count();
        $hadir = Absensis::where('id_peserta', $id)->where('keterangan','Hadir')->where('status','terverifikasi')->get()->count();
        if($absensi == 0){
            $persentase = 0;
        }else{
            $persentase = $hadir/$absensi*100;
        }
        $pdf = FacadePdf::loadview('pembimbing/pages/detailabsensi_pdf', ['data'=>$dataAbsensi,'peserta'=> $peserta,'absensi'=> $absensi, 'hadir'=>$hadir,'persentase'=> $persentase, 'instansi'=>$instansi, 'jurusan'=>$jurusan]);
        return $pdf->download('laporan-absensi.pdf');
    }

    public function filterSubb(Request $request)
    {
        $kinerjas = DB::table('kinerjas')
                ->join('detail_kinerjas', 'kinerjas.id', 'detail_kinerjas.id_kinerja')
                ->join('kegiatans', 'kegiatans.id', '=', 'kinerjas.id_kegiatan')
                ->join('sub_kegiatans', 'sub_kegiatans.id', '=', 'detail_kinerjas.sub_kegiatan_diambil')
                ->select(['kinerjas.*','sub_kegiatans.*','kegiatans.*', 'detail_kinerjas.status_kegiatan'])
                ->selectRaw('TIME_FORMAT(TIMEDIFF(detail_kinerjas.selesai_kinerja,detail_kinerjas.mulai_kinerja), "%H") AS hours')
                ->selectRaw('TIME_FORMAT(TIMEDIFF(detail_kinerjas.selesai_kinerja,detail_kinerjas.mulai_kinerja), "%i") AS minutes')
                ->selectRaw('TIME_FORMAT(TIMEDIFF(detail_kinerjas.selesai_kinerja,detail_kinerjas.mulai_kinerja), "%s") AS seconds')
                ->where('kinerjas.id_peserta', $request->get('id_peserta'))
                ->where('sub_kegiatans.id', $request->get('pilihsub'))
                ->where('detail_kinerjas.status_kegiatan', '=', 'selesai')
                ->get();
        $subs = DB::table('sub_kegiatans')
        ->where('id', '=', $request->get('pilihsub'))
        ->pluck('sub_kegiatan')
        ->first();
        $totals = DB::table('kinerjas')
        ->join('detail_kinerjas', 'kinerjas.id', 'detail_kinerjas.id_kinerja')
        ->join('kegiatans', 'kegiatans.id', '=', 'kinerjas.id_kegiatan')
        ->join('sub_kegiatans', 'sub_kegiatans.id', '=', 'detail_kinerjas.sub_kegiatan_diambil')
        ->where('kinerjas.id_peserta', $request->get('id_peserta'))
        ->where('sub_kegiatans.id', $request->get('pilihsub'))
        ->where('detail_kinerjas.status_kegiatan', '=', 'selesai')
        ->selectRaw('sum(TIME_FORMAT(TIMEDIFF(detail_kinerjas.selesai_kinerja,detail_kinerjas.mulai_kinerja), "%H")) AS hours')
        ->selectRaw('sum(TIME_FORMAT(TIMEDIFF(detail_kinerjas.selesai_kinerja,detail_kinerjas.mulai_kinerja), "%i")) AS minutes')
        ->selectRaw('sum(TIME_FORMAT(TIMEDIFF(detail_kinerjas.selesai_kinerja,detail_kinerjas.mulai_kinerja), "%s")) AS seconds')
        ->first();
        return view ('pembimbing/pages/filtersubkegiatan', [
            'kinerja' => $kinerjas,
            'sub' => $subs,
            'total' => $totals
        ]);
    }

}

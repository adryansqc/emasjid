<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Kajian;
use App\Models\Kas;
use App\Models\Saran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FrontendController extends Controller
{
    public function index()
    {
        $updatePengumuman = Announcement::latest()->first();
        $pengumuman = Announcement::latest()->take(3)->get();
        $updateKajian = Kajian::latest()->first();
        $kajian = Kajian::latest()->take(3)->get();
        $kas = Kas::all();

        $hariIni = null;
        try {
            $bulan = now()->month;
            $tahun = now()->year;

            $response = Http::post('https://equran.id/api/v2/shalat', [
                'provinsi' => 'Jambi',
                'kabkota'  => 'Kota Jambi',
                'bulan'    => $bulan,
                'tahun'    => $tahun,
            ]);

            $jadwal = $response->json('data.jadwal') ?? [];
            $hariIni = collect($jadwal)->firstWhere('tanggal', now()->day);
        } catch (\Exception $e) {
            $hariIni = null;
        }

        return view('fe.pages.home', [
            'kajian'           => $kajian,
            'updateKajian'     => $updateKajian,
            'pengumuman'       => $pengumuman,
            'updatePengumuman' => $updatePengumuman,
            'kas'              => $kas,
            'hariIni'          => $hariIni,
        ]);
    }

    public function kajian()
    {
        $kajian = Kajian::latest()->paginate(6);

        return view('fe.pages.kajian.kajian_page', [
            'kajian' => $kajian,
        ]);
    }

    public function kajianDetail(Kajian $kajian)
    {
        return view('fe.pages.kajian.kajian_detail', [
            'kajian' => $kajian,
        ]);
    }

    public function pengumuman()
    {
        $pengumuman = Announcement::latest()->paginate(6);

        return view('fe.pages.pengumuman.pengumuman_page', [
            'pengumuman' => $pengumuman,
        ]);
    }

    public function pengumumanDetail(Announcement $pengumuman)
    {
        return view('fe.pages.pengumuman.pengumuman_detail', [
            'pengumuman' => $pengumuman,
        ]);
    }

    public function search(Request $request)
    {
        $keyword = $request->get('keyword');

        $kajian = Kajian::where('nama_kegiatan', 'like', "%$keyword%")
            ->orWhere('keterangan', 'like', "%$keyword%")
            ->orWhere('tempat', 'like', "%$keyword%")
            ->latest()
            ->paginate(6);

        $pengumuman = Announcement::where('judul', 'like', "%$keyword%")
            ->orWhere('isi', 'like', "%$keyword%")
            ->latest()
            ->paginate(6);

        return view('fe.pages.pencarian.search', [
            'kajian' => $kajian,
            'pengumuman' => $pengumuman,
            'keyword' => $keyword,
        ]);
    }

    public function saran()
    {
        return view('fe.pages.saran.saran_page');
    }

    public function saranStore(Request $request)
    {
        $request->validate([
            'nama'     => 'required|string|max:255',
            'email'    => 'nullable|email|max:255',
            'no_hp'    => 'nullable|string|max:20',
            'kategori' => 'required|in:saran,masukan,kritik,pertanyaan',
            'pesan'    => 'required|string',
        ]);

        Saran::create([
            'nama'     => $request->nama,
            'email'    => $request->email,
            'no_hp'    => $request->no_hp,
            'kategori' => $request->kategori,
            'pesan'    => $request->pesan,
            'status'   => 'belum_dibaca',
        ]);

        return redirect()->route('frontend.saran')->with('success', 'Saran & masukan Anda berhasil dikirim. Terima kasih!');
    }

    public function alquran()
    {
        $response = Http::get('https://equran.id/api/v2/surat');
        $surat = $response->json('data') ?? [];

        return view('fe.pages.alquran.alquran_page', [
            'surat' => $surat,
        ]);
    }

    public function alquranDetail($nomor)
    {
        $response = Http::get("https://equran.id/api/v2/surat/{$nomor}");
        $data = $response->json('data') ?? [];

        return view('fe.pages.alquran.alquran_detail', [
            'surat' => $data,
            'ayat'  => $data['ayat'] ?? [],
        ]);
    }
}

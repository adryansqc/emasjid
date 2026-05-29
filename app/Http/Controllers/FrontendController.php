<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Kajian;
use App\Models\Kas;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $updatePengumuman = Announcement::latest()->first();
        $pengumuman = Announcement::latest()->take(3)->get();
        $updateKajian = Kajian::latest()->first();
        $kajian = Kajian::latest()->take(3)->get();
        $kas = Kas::all();

        return view(
            'fe.pages.home',
            [
                'kajian' => $kajian,
                'updateKajian' => $updateKajian,
                'pengumuman' => $pengumuman,
                'updatePengumuman' => $updatePengumuman,
                'kas' => $kas,
            ]
        );
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
}

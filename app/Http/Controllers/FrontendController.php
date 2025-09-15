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
}

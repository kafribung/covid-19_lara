<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

// Import DB Hospital
use App\Models\Hospital;

// Import DB Message
use App\Models\Message;

// Import DB Covid
use App\Models\Covid;

// Import DB Pencegahan
use App\Models\Pencegahan;

class CovidController extends Controller
{
    public function global()
    {
        $countrys = Http::get('https://api.kawalcorona.com/');
        $positif  = Http::get('https://api.kawalcorona.com/positif');
        $sembuh   = Http::get('https://api.kawalcorona.com/sembuh');
        $meninggal= Http::get('https://api.kawalcorona.com/meninggal');

        $countrys = $countrys->json();
        $positif  = $positif->json();
        $sembuh   = $sembuh->json();
        $meninggal= $meninggal->json();



        $chartNegara  = [];
        $chartPositif = [];
        foreach ($countrys as $country) {
            $chartNegara[]  = $country['attributes']['Country_Region'];
            $chartPositif[] = $country['attributes']['Confirmed'];
        }

        return view('covid19.global', compact('countrys', 'positif', 'sembuh', 'meninggal', 'chartNegara', 'chartPositif'));
    }

    public function indonesia()
    {
        $data      = Http::get('https://api.kawalcorona.com/indonesia');
        $provinsi  = Http::get('https://api.kawalcorona.com/indonesia/provinsi');

        $datas     = $data->json();
        $provinsies = $provinsi->json();

        $chartProv    = [];
        $chartPositif = [];
        $chartSembuh  = [];
        $chartMeninggal = [];

        foreach ($provinsies as $prov) {
            $chartProv[]      = $prov['attributes']['Provinsi'];
            $chartPositif[]   = $prov['attributes']['Kasus_Posi'];
            $chartSembuh[]    = $prov['attributes']['Kasus_Semb'];
            $chartMeninggal[]   = $prov['attributes']['Kasus_Meni'];
        }


        // dd(json_encode($chartMeninggal));

        return view('covid19.indonesia', compact('datas', 'provinsies', 'chartProv' , 'chartPositif', 'chartSembuh', 'chartMeninggal'));
    }

    public function covid19()
    {
        $covid = Covid::first();

        return view('covid19.covid19', compact('covid'));
    }

    public function pencegahan()
    {
        $pencegahan =Pencegahan::first();
        return view('covid19.pencegahan', compact('pencegahan'));
    }

    public function hospital()
    {
        $hospitals = Hospital::orderBy('provinsi', 'ASC')->get();
        return view('covid19.hospital', compact('hospitals'));
    }

    public function message(Request $request)
    {
        $request->validate([
            'nama'     => ['required', 'min:3', 'max:20'],
            'subjek'   => ['required', 'min:3', 'max:25'],
            'email'    => ['required', 'min:3', 'max:25', 'email'],
            'message'  => ['required', 'min:3']
        ]);

        $message = Message::create([
            'nama'     => $request->nama,
            'subjek'   => $request->subjek,
            'email'    => $request->email,
            'message'  => $request->message
        ]);

        return redirect('/rumah-sakit')->with('msg', 'Pesan Berhasil Terkirim :) ');
    }
}

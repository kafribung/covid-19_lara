<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

// Import DB yang login
use Auth;

// import DB COvid
use App\Models\Covid;

// import DB Pencegahan
use App\Models\Pencegahan;

// Import DB Hospital
use App\Models\Hospital;

// Import DB Message
use App\Models\Message;

class AdminController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        return view('dashboard.dashboard', compact('user'));
    }

    // ========================================COVID
    public function covid()
    {
        $covids = Covid::orderBy('id', 'DESC')->get();
        return view('dashboard.covid19', compact('covids'));
    }

    public function createCovid()
    {
        return view('dashCreate.createCovid19');
    }

    public function storeCovid(Request $request)
    {
        $request->validate([
            'info' => ['required', 'min:5'],
        ]);

        $covid = Covid::all();

        if(count($covid) >= 1) {
            return redirect('/covid')->with('msg', 'Data sudah ada !');
        }

        $covid = $request->user()->covid()->create([
            'info' => $request->info
        ]);

        return redirect('/covid')->with('msg', 'Data successfully added !');
    }

    public function editCovid($id)
    {
        $covid = Covid::findOrFail($id);

        return view('dashEdit.editCovid19', compact('covid'));
    }

    public function updateCovid(Request $request, $id)
    {
        $request->validate([
            'info' => ['required', 'min:5']
        ]);

        $covid = Covid::findOrFail($id)->update([
            'info' => $request->info
        ]);

        return redirect('/covid')->with('msg', 'Data successfully edit !');
    }

    public function destroyCovid($id)
    {
        $covid = Covid::destroy($id);

        return redirect('/covid')->with('msg', 'Data successfully delete !');
    }

    // ========================================END COVID

    // ======================================== CEGAH

    public function cegah()
    {
        $pencegahans = Pencegahan::all();

        return view('dashboard.pencegahan', compact('pencegahans'));
    }

    public function createCegah()
    {
        return view('dashCreate.createPencegahan');
    }

    public function storeCegah(Request $request)
    {
        $request->validate([
            'pencegahan' => ['required', 'min:5']
        ]);

        $pencegahan = Pencegahan::all();

        if (count($pencegahan) >= 1) {
            return redirect('/cegah')->with('msg', 'Data sudah adaa !');
        }

        $pencegahan = $request->user()->pencegahan()->create([
            'pencegahan' => $request->pencegahan
        ]);

        return redirect('/cegah')->with('msg', 'Data successfully added !');
    }

    public function editCegah($id)
    {
        $pencegahan = Pencegahan::findOrFail($id);

        return view('dashEdit.editPencegahan', compact('pencegahan'));
    }

    public function updateCegah(Request $request, $id)
    {
        $request->validate([
            'pencegahan' => ['required', 'min:5']
        ]);

        $pencegahan = Pencegahan::findOrFail($id)->update([
            'pencegahan' => $request->pencegahan
        ]);

        return redirect('/cegah')->with('msg', 'Data successfully changed !');
    }

    public function destroyCegah($id)
    {
        $pencegahan = Pencegahan::destroy($id);

        return redirect('/cegah')->with('msg', 'Data successfully delete !');
    }

    // ========================================END CEGAH


    // ======================================== HOSPITAL



    public function hostpital()
    {
        $hospitals = Hospital::orderBy('provinsi', 'ASC')->get();

        $messages   = Message::orderBy('id', 'DESC')->get();
        return view('dashboard.hospital', compact('hospitals', 'messages'));
    }

    public function createHostpital()
    {
        $provinsis = $this->apiProvinsi();

        return view('dashCreate.createHospital', compact('provinsis'));

    }

    public function storeHostpital(Request $request)
    {
        $request->validate([
            'provinsi' => ['required', 'min:4', 'max:20'],
            'hospital' => ['required', 'min:5']
        ]);

        $hospital = $request->user()->hospitals()->create([
            'provinsi' => $request->provinsi,
            'hospital' => $request->hospital
        ]);

        return redirect('/hospital')->with('msg', 'Data successfully added !');
    }

    public function editHostpital($id)
    {
        $hospital  = Hospital::findOrFail($id);
        $provinsis = $this->apiProvinsi();

        return view('dashEdit.editHospital', compact('hospital', 'provinsis'));
    }

    public function updateHostpital(Request $request , $id)
    {
        $request->validate([
            'provinsi' => ['required', 'min:4', 'max:20'],
            'hospital' => ['required', 'min:5']
        ]);

        $hospital = Hospital::findOrFail($id)->update([
            'provinsi' => $request->provinsi,
            'hospital' => $request->hospital
        ]);

        return redirect('/hospital')->with('msg', 'Data Successfully Changed !');
    }

    public function apiProvinsi()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: d54612ec18f6217de0657bbbd8c60b31"
        ),
        ));

        $provinsis = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        // echo $provinsis;
        }
        return json_decode($provinsis, true);
    }

    public function destroyHostpital($id)

    {
        $hospital = Hospital::destroy($id);
    }

    // ======================================== END HOSPITAL

    //
    public function destroyMessage($id)
    {
        $message = Message::destroy($id);
    }

}

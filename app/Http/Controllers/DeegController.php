<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deegregistreer;
use App\Models\Deegsoort;

class DeegController extends Controller
{
    public function deegkamer()
    {
        $deegsoorten = Deegsoort::all();

        return view('/deegkamer', ['deegsoorten' => $deegsoorten]);
    }

    public function deegregistreer(Request $request)
    {
        $deegregistreer = new Deegregistreer;
        $deegregistreer->place = $request->input('place');
        $deegregistreer->placenumber = $request->input('placenumber');
        $deegregistreer->weight = $request->input('weight');
        $deegregistreer->deegsoort = $request->input('deegsoort');
        $deegregistreer->bak = $request->input('bak');
        $deegregistreer->save();
        session()->put('selectedDeegsoort', $request->input('deegsoort'));
        return back()->with('success', 'Deeg geboekt');
    }
}

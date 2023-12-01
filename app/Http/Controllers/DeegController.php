<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Line;
use App\Models\Deegsoort;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Deegregistreer;


class DeegController extends Controller
{
    public function deegkamer()
    {
        $deegsoorten = Deegsoort::all();

        return view('/deegkamer', ['deegsoorten' => $deegsoorten]);

    }


    public function deeginsteek()
    {
        $lines = Line::where('is_producing', 1)->get();
    
        $fromDate = Carbon::now()->subDays(10);
        $toDate = Carbon::now()->subMinutes(5);
        $geregistreerdeDegen = Deegregistreer::whereBetween('created_at', [$fromDate, $toDate])->get();
    
        return view('/deeginsteek', ['lines' => $lines, 'geregistreerdeDegen' => $geregistreerdeDegen]);
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



    public function getDeegData($place, $placenumber)
    {
        $datapack = Deegregistreer::where('place', $place)->where('placenumber', $placenumber)->pluck('bak')->get();
    
        if (Request::isJson()) {
            return Response::json($datapack, 200);
        }
    
        return Response::json($datapack, 200, [], JSON_PRETTY_PRINT);
    }
    

}

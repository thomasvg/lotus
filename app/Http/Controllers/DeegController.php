<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deegregistreer;

class DeegController extends Controller
{
    public function deegkamer()
    {
        return view('/deegkamer');
    }
    public function deegregistreer(Request $request)
    {
        $deegregistreer = new Deegregistreer;
        $deegregistreer->place = $request->input('place');
        $deegregistreer->placenumber = $request->input('placenumber');
        $deegregistreer->weight = $request->input('weight');
        $deegregistreer->bak = $request->input('bak');
        $deegregistreer->save();

       
        return back()->with('success','deeg geboekt');

        
    }
    
}
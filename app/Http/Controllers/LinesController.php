<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\Line;
use Illuminate\Http\Request;
use App\Models\Deegregistreer;
use Illuminate\Support\Facades\DB;



class LinesController extends Controller
{
    public function deactivationLine(Request $request) {
        // Get the inner value of the button of the form
        $input = $request->all();

        $lineId = $request->input('deactiveline');
        // Assuming 'id' is the primary key in your Lines model
        $line = Line::find($lineId);
        $line->is_producing = 1;
        $line->save();

        return back();
    }

    public function activationLine(Request $request) {
        // Get the inner value of the button of the form
        $input = $request->all();

        $lineId = $request->input('activeline');
        // Assuming 'id' is the primary key in your Lines model
        $line = Line::find($lineId);
        $line->is_producing = 0;
        $line->linked = 0; // Set linked to 0
        $line->save();

        return back();
    }
    public function linkLine(Request $request)
    {

        if ($request->action == 'unlink') {
            // Find the line by its id
            $line = Line::where('line', $request->input('line'))->first();
        
            // Set the linked field to 0
            $line->linked = 0;
        
            // Save the line
            $line->save();
        
            return back()->with("success","Unlinked");
        } else {
            $selectedOption = $request->input('placedegen');
            $lineId = $request->input('line'); // replace 'line' with your actual input name
        
            // Split the selected option into place and placenumber
            list($place, $placenumber) = explode(' ', $selectedOption);
        
            $lineId = $request->input('line'); // Retrieve the selected line code
        
            // Find the line by its id
            $line = Line::where('line',$lineId )->first();
        
            // Update the placeline, placenumberline, and linked fields
            $line->placeline = $place;
            $line->placenumberline = $placenumber;
            $line->linked = !empty($place) && !empty($placenumber);
        
            // Save the line
            $line->save();
        
            return back()->with("success","Updated successfully");
        }
        

       
    }
    

    public function findBakken(Request $request)
{
    $line = $request->input('individualbtn');

    

    $results = DB::table('deegregistreer')
                ->join('lines', function ($join) use ($line) {
                    $join->on('deegregistreer.place', '=', 'lines.placeline')
                         ->on('deegregistreer.placenumber', '=', 'lines.placenumberline')
                         ->where('lines.line', '=', $line);
                })
                ->select('deegregistreer.bak')
                ->get();
                $fromDate = Carbon::now()->subDays(30);
                $toDate = Carbon::now()->subMinutes(1);
     $geregistreerdeDegen = Deegregistreer::whereBetween('created_at', [$fromDate, $toDate])->get();
    $lines = Line::all(); // or however you retrieve your lines

    return view('deeginsteek', ['results' => $results,'individualLine'=>$line, 'lines' => $lines, 'geregistreerdeDegen' => $geregistreerdeDegen]);
}

    


}

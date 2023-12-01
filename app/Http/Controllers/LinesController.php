<?php

namespace App\Http\Controllers;


use App\Models\Line;
use Illuminate\Http\Request;


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
        $line->save();

        return back();
    }
    public function linkLine(Request $request)
    {
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

        return back()->with("succesfully","succes");
    }
    




}

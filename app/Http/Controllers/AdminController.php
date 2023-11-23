<?php

namespace App\Http\Controllers;

use App\Models\Line;
use App\Models\Deegsoort;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $deegsoort;

    public function __construct(Deegsoort $deegsoort, Line $line)
    {
        $this->deegsoort = $deegsoort;
        $this->line = $line;
    }

    public function checkAdmin()
    {
        if (auth()->check()) {
            $deegsoorten = $this->deegsoort->all();
            $line= $this->line->all();
            return view('admin', ['deegsoorten' => $deegsoorten, 'lines'=>$line]);
        } else {
            return view('welcome');
        }
    }
}

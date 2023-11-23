<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deegsoort;

class AdminController extends Controller
{
    private $deegsoort;

    public function __construct(Deegsoort $deegsoort)
    {
        $this->deegsoort = $deegsoort;
    }

    public function checkAdmin()
    {
        if (auth()->check()) {
            $deegsoorten = $this->deegsoort->all();

            return view('admin', ['deegsoorten' => $deegsoorten]);
        } else {
            return view('welcome');
        }
    }
}

<?php



namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Don't forget to import the Hash facade

class UserController extends Controller
{
    public function store(Request $request)
    {
        $user = new User;
    
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password); // Hash the password
        $user->name = $request->name;

        // You might not want to store the 'confirm_password' in the database.
    
        $user->save();
    
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function indexUser(Request $request)
    {
        $userId = $request->user()->id;

         $user = User::find($userId);

         $bookings = $user->bookings;

         $favorites = $user->favorites;

        return view('user.profile', compact('user', 'bookings', 'favorites'));
    }
}

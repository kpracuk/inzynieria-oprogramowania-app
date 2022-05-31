<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Team;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request) {
        $search = $request->get('search');
        if($search) {
            $users = User::where(function($query) use ($search) {
                $query->where('firstname', 'LIKE', '%'.$search.'%')
                    ->orWhere('lastname', 'LIKE', '%'.$search.'%')
                    ->orWhere('email', 'LIKE', '%'.$search.'%')
                    ->orWhere('phone', 'LIKE', '%'.$search.'%');
            })->get();
            $teams = Team::where(function($query) use ($search) {
                $query->where('name', 'LIKE', '%'.$search.'%')
                    ->orWhere('department', 'LIKE', '%'.$search.'%');
            })->get();
        } else {
            $users = User::all();
            $teams = Team::all();
        }
        $items = collect([...$teams, ...$users]);

        return view('dashboard', ['items' => $items]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin', ['only' => ['create', 'store']]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        $teams = Team::all();
        return response()->view('users.create', ['teams' => $teams]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateUserRequest  $request
     * @return RedirectResponse
     */
    public function store(CreateUserRequest $request): RedirectResponse
    {
        $payload = $request->validated();
        $tempPassword = Str::random(8);

        $user = User::create([...$payload, 'password' => Hash::make($tempPassword)]);

        $request->session()->flash('password', $tempPassword);

        return response()->redirectToRoute('users.show', ['user' => $user->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function show(User $user): Response
    {
        return response()->view('users.show', ['user' => $user]);
    }
}

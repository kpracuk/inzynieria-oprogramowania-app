<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTeamRequest;
use App\Models\Team;
use Illuminate\Http\RedirectResponse;

class TeamsController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin', ['only' => ['create', 'store']]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('teams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateTeamRequest $request
     * @return RedirectResponse
     */
    public function store(CreateTeamRequest $request)
    {
        $payload = $request->validated();
        $team = Team::create($payload);

        return response()->redirectToRoute('teams.show', ['team' => $team->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return response()->view('teams.show', ['team' => $team]);
    }
}

<?php

namespace App\Http\Controllers\Quit;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\QuitRequest;

use App\Quit;

class QuitController extends Controller
{

    /**
     * Checks if user is authorized and has setup their quit settings
     *
     * @return void
     */
    function __construct() {
        $this->middleware('auth', ['except' => 'getProfile']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('quit.settings');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(QuitRequest $request)
    {
        $quit = new Quit($request->all());
        $user = auth()->user();
        $quit = $user->quit()->save($quit);
        return redirect('/home');

    }
}

<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingsRequest;

use Illuminate\Http\Request;


class UserController extends Controller
{

    /**
     * Checks if user is authorized and has setup their quit settings
     *
     * @return void
     */
    function __construct() {
        $this->middleware('auth', ['except' => 'getProfile']);
        $this->middleware('quit', ['except' => 'getProfile']);
    }

    /**
     * Display the user's dashboard.
     *
     * @return Response
     */
    public function getDashboard()
    {
        $user = auth()->user();
        $quit = $user->quit;
        if(!$quit) {
            return redirect('quit');
        }
        return view('user.profile', compact(['user', 'quit']));
    }

    /**
     * Show a public user's profile.
     *
     * @param  String  $username
     * @return Response
     */
    public function getProfile($id)
    {
        $user = User::find($id);
        if(!$user) {
            flash()->warning('User does not exist.');
            return redirect('/');
        }
        return view('user.profile', compact('user'));
    }

    /**
     * Get the form for changing a user's settings.
     *
     * @return Response
     */
    public function getSettings()
    {
        $settings = auth()->user()->settings();
        return view('user.settings', compact('settings'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @return Response
     */
    public function postSettings(SettingsRequest $request)
    {
        
        flash()->success('Your settings have been updated.');
        return redirect()->back();
    }

    /**
     * Get the form for changing a user's quit data.
     *
     * @return Response
     */
    public function getQuit()
    {
        $settings = auth()->user()->quit()->settings();
        return view('user.quit', compact('settings'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @return Response
     */
    public function postQuit(QuitRequest $request)
    {
        
        flash()->success('Quit information updated.');
        return redirect('/');
    }

}

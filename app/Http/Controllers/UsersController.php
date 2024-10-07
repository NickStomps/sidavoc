<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\activiteit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;
use PHPUnit\Framework\Attributes\Ticket;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;

class UsersController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = user::all();
        return view('login', ['users' => $users]);
    }

    public function check(Request $request)
    {
        $users = user::all();
        $email = $request->input('email');
        $wachtwoord = $request->input('password');
        foreach($users as $user){
            if($user->email == $email && $user->password == $wachtwoord){
                return view('account');
                
            }
            else
            {
                return view('login');
            }
        }
    }

    public function logout()
    {
        user::logout();
        return view('/');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(user $users)
    {
        if (!Auth::check()) {
            return view('login');
        }

        $activiteiten = Activiteit::all(); // Fetch all activiteiten
        return view('account', compact('activiteiten'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, user $users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $users)
    {
        //
    }
}

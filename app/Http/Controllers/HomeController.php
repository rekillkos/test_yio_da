<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    public function index()
    {
    	$user = User::firstOrCreate(['id' => 1]);

    	return view('user')->withUser($user);
    }

    public function edit(Request $request)
    {
    	$user = User::firstOrCreate(['id' => 1]);

    	if($request->file('avatar'))
        {
            $image = \Image::make($request->file('avatar'));
            $image->fit(300,300)->save('imgs/avatars/'.$user->id.'.jpg', 70);
        }

    	$user->update($request->all());
    	
    	return back()->withMessage('Сохранено!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function update_user(Request $request)
    {
        $image= $request->image;
        $imagename= time().'.'.$image->getClientOriginalExtension();
        $request->image->move('storage' , $imagename);
        $user = User::where('email' , $request->email);
        $user->update([
            'name'=> $request->name,
            'email'=> $request->email,
            'password' => bcrypt($request->password),
            'image'=>$imagename,
        ]);
        $message = [
            'messege'=> 'data is updated',
        ];
        return response($message , 201 , ['ok']);
    }
}

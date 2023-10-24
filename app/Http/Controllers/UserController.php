<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetails;
use illuminate\Support\Facades\File;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = user::all();
        return view('user.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createuser(Request $request)
    {
        $user = User::create([
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user_id = $user->id;
        
        if ($request->hasFile('img_ktp')) {
            $extension = $request->file('img_ktp')->getClientOriginalExtension();         
            $filename = uniqid() . '.' . $extension;
            $request->file('img_ktp')->move('image', $filename);
            UserDetails::create([
                'user_id' => $user_id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'address' => $request->address,
                'date_of_birth' => date('Y-m-d', strtotime($request->date_of_birth)),
                'img_ktp' => $filename,
                'gender' => $request->gender,
            ]);
        }

        return redirect()->route('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=user::find($id);
        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edituser(Request $request, $id)
    {
        $user = User::where('id',$id)->update([
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        
        if ($request->hasFile('img_ktp')) {
            $extension = $request->file('img_ktp')->getClientOriginalExtension();         
            $filename = uniqid() . '.' . $extension;
            $request->file('img_ktp')->move('image', $filename);
            UserDetails::where('user_id',$id)->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'address' => $request->address,
                'date_of_birth' => date('Y-m-d', strtotime($request->date_of_birth)),
                'img_ktp' => $filename,
                'gender' => $request->gender,
            ]);
        }

        return redirect()->route('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id',$id)->first();
        $user->delete();
        
        $userdetails = UserDetails::where('user_id',$id)->first();
        if($userdetails){
            $userdetails->delete();
        }
        return back();
    }
}

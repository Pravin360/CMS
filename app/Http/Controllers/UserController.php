<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Image;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index')->with('users',User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->address);
        $validated = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'address'=>'required',
        'image' => 'required',
        'password' => 'required|confirmed',
        // 'password_confirmation' => 'required_with:password|same:password|min:6'
        ]);

        $hashPassword=Hash::make($request->password);

        // $imagefile=$request->image;
       

        $image=$request->file('image');
        $extension=$image->getClientOriginalExtension();
        $filename=time().'.'.$extension;
        $image->move('uploads/images/',$filename);

        // dd($filename);
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$hashPassword,
            'address'=>$request->address,
            'image'=> $filename,
        ]);

        $request->session()->flash('success','New User Added Successfully!');

        return redirect(route('users.index'));
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
        $user=User::find($id);
        return view('admin.users.edit')->with('specificUser',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $users=User::find($id);
        $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,'.$users->id,
        'address'=>'required',
        // 'image' => 'required',
        'password' => 'sometimes|confirmed',
        ]);


         $users->name=$request->name;
         $users->email=$request->email;
         $users->address=$request->address;
         $users->name=$request->name;
         $users->save();
        if(!empty($request->password)){
            $hashPassword=Hash::make($request->password);
            $users->password=$hashPassword;
        }

        if($request->hasFile('image')){

        // unlink('uploads/images/'.$users->image);
            
           $image=$request->file('image');
           $extentions=$image->getClientOriginalExtension();
           $filename=time().'.'.$extentions;
           File::delete($filename);
           $image->move('uploads/images/',$filename);
           $users->image = $filename;
        }
        else{
             $users->image=$users->image;
        }
         $users->save();
         $request->session()->flash('success','User Detail Edited Successfully');
        return redirect(route('users.index'));
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect(route('users.index'));
    }
}

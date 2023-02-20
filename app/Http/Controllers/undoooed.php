<?php

namespace App\Http\Controllers;
use App\Register;
use Crypt;
use Auth;
use Session;
use App\User;
use Illuminate\Http\Request;
use DB;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //$user = register::all()->first();
        //$name = $user->oname;
        //$email=$user->email;
          //dd($name)
        //return view('/testing', compact('name'));
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //  
    }
    

    public function register(Request $request)
    {
        //
       $email= request('email');
       dd($email);

        $register = new register();
        
        $name=request('oname');
        $register->oname = request('oname');
        $register->email = request('email');
        $register->password = request('password');

        $request->Session()->put('user', $name);
        $request->Session()->put('email', $email);

        $register->save();
        return redirect('/loadprofile');


    }


    public function userLogin(Request $request)
    {
    $user= register::where("email", $request->input('email'))->get();
    if( $request->input('password') ==$user[0]->password)
    {
        $request->Session()->put('email',$user[0]->email);
        $request->Session()->put('user',$user[0]->oname);
        // $id= $user[0]->id;
      return redirect('loadprofile');
    }
     else{
        return redirect('/home');

     } 
    }
    
        //dd($id);
      
   
          // $user= register::where("id","=",$id)->first();
    //        $user= register::where("id",1)->first();
          //  $name = $user->oname;
            //return view('testing', compact('id'));





     





    

    //==  $request->input('password') ;
    
    
    
    public function profile()
      {
        // return view('testing',array('vk' =>Auth::user()));
       
      }


}
    
<?php

namespace App\Http\Controllers;
use App\Register;
use App\details;

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
    

    public function newregister(Request $request)
    {
        //
    $input_email=$request->input('email');
    $match= DB::table('register')
    ->where('email', $input_email);
    $count=$match->count();
        

    if($count==0)
{
        $register = new register();
        $name=request('oname');
        $email=request('email');
        $register->oname = request('oname');
        $register->email = request('email');
        $register->password = request('password');

        
        
        $request->Session()->put('user', $name);
        $request->Session()->put('email', $email);

        Session()->pull('alert',null);

        $register->save();
     return redirect('/loadprofile');
}
else{

    
    
    $email =Session::get('email');
    $user =Session::get('user');
    $users = details::orderBy('Ward')->get();


   //  $users = DB::table('details')
   //             ->orderBy('wad', 'desc')
   //             ->get();
    
        $alert="OOPS !! THIS USER IS ALREADY EXIST !!! YOU NEED TO USE ANOTHER EMAIL ADDRESS ";
        $request->Session()->put('already_have', $alert);
        return  redirect('/alertwindow');

    }


    }


public function userLogin(Request $request)
    {

        $details = DB::table('details')->count();
        // dd($details);
        while($details==0)
        {   
            Session()->pull('already_have',null);

            $alert=" NO such user in system please register now  ";
            $request->Session()->put('nothaveuser', $alert);
            
        
            // dd($alert);
            return redirect('/alertwindow');
        }

        
                //  $details = DB::table('register')->get('email');

                $input_email=$request->input('email');
            //    $user= register::where('email', )->first();
                // $count=$match->count();
                //    $match= DB::table('register')->where('email','=' ,$input_email)->count();
                    // dd($count);
                        
                $user= register::where("email", $request->input('email'))->get();
                // dd($request->input('email'));
                $match=$user->count();
                // dd($match);

                if($match==0)
                {

                   Session()->pull('already_have',null);

                    $alert=" Please!! provide valid email and password  ";
                    $request->Session()->put('nothaveuser', $alert);
                    

                    return redirect('/alertwindow');

                }  
                elseif ( $request->input('password') ==$user[0]->password)
                {
                    Session()->pull('nothaveuser',null);

                    $request->Session()->put('email',$user[0]->email);
                    $request->Session()->put('user',$user[0]->oname);
                    // $id= $user[0]->id;
                return redirect('loadprofile');
                }


                else{
                    Session()->pull('already_have',null);

                    Session()->pull('nothaveuser',null);

                    $alert=" Hei password is not matching  ";
                    $request->Session()->put('nothaveuser', $alert);
                    

                    return redirect('/alertwindow');
                }
               
            }
    
    
        //dd($id);
      
   
          // $user= register::where("id","=",$id)->first();
    //        $user= register::where("id",1)->first();
          //  $name = $user->oname;
            //return view('testing', compact('id'));





     





    

    //==  $request->input('password') ;

    
    
    public function logout()


      {
        
            Session()->pull('user',null);
            Session()->pull('user',null);
            Session()->pull('existuser',null);

    // dd('your in  logout');
    
    
    // ||Session()->has('email')
    //         Session()->pull('email',null);
    //     elseif (Session()->has('email'))
    //     {
    
            
    //     }
        return redirect('/');
    }
        // return view('testing',array('vk' =>Auth::user()));
       
      


}

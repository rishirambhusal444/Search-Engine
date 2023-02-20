<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use App\details;
use App\Geo;
use Auth;
use Image;

use Session;
use DB;

use Illuminate\Support\Str;

use Illuminate\Http\Request;


class DetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    //  $users = details::orderBy('Ward')->get();

    //  $data = Geo::all()->first();
    //  $lat=$data->lat;
    //  $lng=$data->lng;
    // //  dd($data);

    //  $c_lat =Session::get('c_lat');
    //  $c_lng =Session::get('c_lng');

    //  DB::update('update geos set c_lat = ? , c_lng = ?', [$c_lat, $c_lng]);
public function home( Request  $request)
 {
    
$email =Session::get('email');
$user =Session::get('user');
$geodata = Geo::all()->first();
$details = DB::table('details')->count();
Session()->pull('nodata',null);
                
// dd($details);


if($details==0)
{ 
    $alert=" Now nothing is  inserted on our server";
    $request->Session()->put('nodata', $alert);
    
    Session()->pull('havedata',null);

    // dd($alert);
    return redirect('/home');


    // dd($alert);

}

else{

    // dd($alert);
    $havedata="nearby places are";
    Session()->pull('nodata',null);
    // $c_lat = request('c_lat');
    // $c_lng = request('c_lng');
    // dd($c_lat);

//     if($c_lat==null&& $c_lng==null)

//     {
// // dd($c_lat);

//    $alert="connect your device with pc yor nearest location";
//     $request->Session()->put('load_location ', $alert);
//     // Session()->pull('havedata',null);
//     // return redirect('/home');

//     }

    $request->Session()->put('havedata', $havedata);

    $lat=$geodata->lat;
    $lng=$geodata->lng; 
     $displacement=20000000;


 
   $raw = DB::raw('( 6317000 * acos( cos( radians(c_lat) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(c_lng) ) + sin( radians(c_lat) ) * sin( radians( lat ) ) ) )  AS distance');
   $distance = DB::table('geos')->select('*', $raw)
   ->join('details','details.email','=','geos.email')// joining table with email
   ->orderBy('distance', 'ASC')
   ->having('distance', '<=', $displacement)->get();
// dd($distance);
   return view('/home', compact('user','email','distance'));


}
    

}
// dd($raw->id);


    //  $geodatas = $geodata->orderBy('distance', 'ASC')->all();

    //  $show=$geodata->orderBy('distance')->first();

     

    //  $users = DB::table('details')
    //             ->orderBy('wad', 'desc')
    //             ->get();
       //  $geodata = DB::select('SELECT *, ( 3959 * acos( cos( radians(27.684037333333332) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(83.42327133333332) ) + sin( radians(27.684037333333332) ) * sin( radians( lat ) ) ) ) AS distance FROM geos', )->orderBy('distance', 'ASC')->all();
     
   
    public function profileindex(Request  $request)

    {

        $input_email =Session::get('email');

        $match= DB::table('details')
        ->where('email', $input_email);
        $matchcount=$match->count();
        
                                    
                        $geo= DB::table('geos')
                        ->where('email', $input_email)->first();
                        $geos= DB::table('geos')
                               ->where('email', $input_email);
                        $count=$geos->count();
                        // dd($count);

                        if($count==0){

                            $lat=27.684037333333332;
                            $lng=83.42327133333;

                        }
                        else{
                            $lat=$geo->lat;
                            // dd($geo->lat);

                            $lng=$geo->lng;
                        }
                        // dd($lat);

if($matchcount!=0)
{    $data= DB::table('details')
    ->where('email', $input_email)->first();

    $type= $data->Type; 
    $bname= $data->Bname; 
    $district=$data->District;
    $locallevel=$data->LocalLevel;
    $ward=$data->Ward;
    $tole=$data->Tole;
    $phone=$data->Phone;

    $services=$data->Services;
    $pp=$data->PP;
    // $postphoto=$data->Post_photo;
    // $user_post=$data->Posts;
    // $oname=$data->oname;
            return view('users.profile',compact('type','bname','district','locallevel','ward','tole','phone','services','pp', 'lat','lng'));

}
else{

    $bname= "BUTWAL MULTIPLE CAMPUS" ;
    $district='RUPANDEHI';
    $locallevel='butwal';
    $ward=5;
    $tole='golpark';
    $phone=071-543332;
    $services=" COURCES => SCIENCE: BSC-BIOLOGY ,BSC-PHYSICS, BSC.CSIT, ICT, BBS,BI,BBA, LLB, BED-SCIENCE , BED-HEALTH, BED-SOCIOLOGY,MED , MBA 

      LIBRARY:E-LIBRARY 
      LABS: COMPUTER-LAB, CHEMISSTRY-LAB, PHYSICS-LAB";
    $pp='avatar.jpg';
    // $postphoto=$data->Post_photo;
    // $user_post=$data->Posts;
    // $oname=$data->oname;
       return view('users.profile',compact('bname','district','locallevel','ward','tole','phone','services','pp','lat','lng')); 

}
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
        
        //ProductController.php
        $image       = $request->file('pp');
        $filename    = $image->getClientOriginalName();

        //Fullsize
        $image->move(public_path().'/full/',$filename);

        $image_resize = Image::make(public_path().'/full/'.$filename);
        
        $image_resize->save(public_path('images/' .$filename));


        $pp=$filename;

        

        $input_email =Session::get('email');
        // dd($input_email);


         $match=DB::table('details')
        ->where('email', $input_email)->count();
        // dd($match);

        if($match==0){

            $details = new  details();
            $details->email = $input_email;
    
            $id= DB::table('register')
            ->where('email', $input_email)->first('id');
             $u_id=$id->id;
             $details->u_id = $u_id;
             $details->PP = $pp;
             $details->save();
             return redirect('/loadprofile');

        }
else{


    DB::table('details')
    ->where('email', $input_email)
       ->update(['PP'=>$pp]);
    

   return redirect('/loadprofile');
    }

    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\details  $details
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\details  $details
     * @return \Illuminate\Http\Response
     */
    public function edit(details $details)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\details  $details
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, details $details)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\details  $details
     * @return \Illuminate\Http\Response
     */
    public function destroy(details $details)
    {
        //
    }
 
    public function savedetails(details $details)
    {
  $input_email =Session::get('email');
                
        $match= DB::table('details')
        ->where('email', $input_email);
        $count=$match->count();

        $type = request('type');
        $bname = request('bname');
        $district = request('district');
        $locallevel = request('locallevel');
        $ward = request('ward');
        $tole = request('tole');
        $phone = request('phone');
        $services = request('service');

        if($count==0)
        {
            $email =Session::get('email');

            $userid= DB::table('register')
            ->where('email', $email)->first();
            $u_id=$userid->id;
            
    // dd ($userid->id);


        $details = new  details();
        $details->email = $email;
        $details->u_id = $u_id;


        $details->type = request('type');
        $details->bname = request('bname');
        $details->district = request('district');
        $details->locallevel = request('locallevel');
        $details->ward = request('ward');
        $details->tole = request('tole');
        $details->phone = request('phone');
        $details->services = request('service');
        
        $details->save();

        return redirect()->back();
        }
        else{
            // dd($ward);

            DB::table('details')
            ->where('email', $input_email)
           ->update(['Type'=>$type,'Bname' =>$bname,'District' =>$district,'LocalLevel' =>$locallevel,'Ward' =>$ward,'Tole' =>$tole,'Phone' =>$phone,'Services' =>$services]);
        
                return redirect()->back();

        }
    }
    public function saveposts(details $details)
    {
        //
    }

    public function savepp(details $req)
    {
        $req = new  details();

        $req->pp = request('PP');

        //
    }
    
    
}

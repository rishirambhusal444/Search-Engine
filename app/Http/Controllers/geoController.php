<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\geo;
use App\register;

use DB;
use Session;


class geoController extends Controller
{
    
    function savecurrentmap(Request $req)
    {
//        print_r($req->input());
        $c_lat = $req->input('latitude');
        $c_lng = $req->input('longitude');
// dd($c_lat);
if($c_lat==null&& $c_lng==null)
    {
// dd($c_lat);

        $c_lat=27;
        $c_lng=83;
    }
        DB::update('update geos set c_lat = ? , c_lng = ?', [$c_lat, $c_lng]);
        
        // $data = Geo::all()->first();
        // $lat=$data->lat;
        // $lng=$data->lng;

        // $geodata = DB::select('SELECT *, ( 3959 * acos( cos( radians(27.684037333333332) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(83.42327133333332) ) + sin( radians(27.684037333333332) ) * sin( radians( lat ) ) ) ) AS distance FROM geos', );

// dd($geodata);

 
        return redirect('/');
    }
    function saveownermap(Request $requesting)
    {
//        print_r($req->input());

$lat=$requesting->latitude;
$lng=$requesting->longitude;
while($lat==null && $lng==null)
{ 
    $lat =27.7109;
    $lng =83.4683;

}     $input_email =Session::get('email');
        $data =DB::table('geos')->get('id');
        $havedata=$data->count();
        // dd($havedata);

    if($havedata==0){

        $count=0;
        // dd($count);


    }  else{      

        $match= DB::table('geos')
        ->where('email', $input_email);
        $count=$match->count();
        // dd($havedata);
        
    }

        if($count==0)
        {
        // dd($havedata);
                    
        $id= DB::table('register')
        ->where('email', $input_email)->first('id');
            $u_id=$id->id;
        // dd($id);


            $geolocation =new geo;
            $geolocation->u_id=$u_id ;
            $geolocation->lat=$lat;
            $geolocation->lng=$lng;
            $geolocation->email = $input_email;
    
            $geolocation->save();
            return redirect('loadprofile');
    
        }
        
        else{
           
        
            DB::table('geos')
            ->where('email', $input_email)
           ->update(['lat' =>$lat,'lng'=>$lng]);
        
                return redirect('loadprofile');
          }



    

 }





}

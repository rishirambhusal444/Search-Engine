<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\company;
use\App\geo;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class companyViewController extends Controller
{
    function save(Request $req)
    { 
        
        $counting =DB::table('company')->get();
        $count = $counting->count();
        for($i=1;$i<=$count;$i++){
        
//        print_r($req->input());
        $com =new company;
        $com->name=$req->name;
        $com->address=$req->address;
        $com->save();
     

    }
    return redirect()->back();
 
}

    public function index() {
        $counting =DB::table('company')->get();
        $count = $counting->count();
        $i =1;
        $countt=geo::all('lat')->count();
        return view('view-company',compact('count','countt','i'));


        $q = DB::select('SELECT * FROM company ');
     



        
     if($q->num_rows > 0){
            $check = true;

            $maps = array();
            while($row = mysqli_fetch_array($q)) {
                $product = array(
                    'auth' => 1,
                    'id' => $row['id'],
                    'url' => $row['url'],
                    'locationData' => json_decode($row['locationData']),
                    'userData' => json_decode($row['userData']),
                    'visible' => $row['visible'],
                    'thedate' => $row['thedate']
                );
                array_push($maps, $product);
            }
        } else {
            $check = false;
        }

    }

  
}
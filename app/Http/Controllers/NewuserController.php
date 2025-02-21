<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class NewuserController extends Controller
{
    //
    public function showNewusers(){
        $newusers   =   DB::table('newusers')
                            //->select('name','age','email as user_email')
                            //->where('city','Delhi')
                            //->whereNotNull('email')
                            //->whereTime('created_at','17:03:26')
                            //->whereNotBetween('age',[19,20])
                            // ->orderBy('name','ASC')
                            // ->orderBy('age','DESC')
                            // ->take(2)
                            // ->skip(1)
                            // ->get();
                            // ->inRandomOrder()
                            // ->first();
                            ->sum('age');
        return $newusers;
        //return view('allusers',['data'=>$newusers]);
    }

    public function singleUser(string $id){
        $singleuser   =   DB::table('newusers')->where('id',$id)->get();
        return view('singleuser',['singleuser'=>$singleuser]);
    }
}

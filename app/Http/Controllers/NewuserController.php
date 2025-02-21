<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
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
                             //->get();
                            // ->inRandomOrder()
                            // ->first();
                            //->sum('age');
                            ->orderBy('id')
                            ->cursorPaginate(5)
                            //->appends(['sorts'=>'votes']);
                            ->fragment('users');
        //return $newusers;
        return view('allusers',['data'=>$newusers]);
    }

    public function singleUser(string $id){
        $singleuser   =   DB::table('newusers')->where('id',$id)->get();
        return view('singleuser',['singleuser'=>$singleuser]);
    }

    public function addUser(Request $req){
        $newuser    =   DB::table('newusers')->insert(
            [                
                'name'=>    $req->username,
                'email'=>   $req->useremail,
                'age'=>     $req->userage,
                'city'=>    $req->usercity,
                'created_at'=>now(),
                'updated_at'=>now()
            ]
        );
        if ($newuser) {
            # code...
            Session::flash('message',"User Added Successfully");
           return redirect()->route('userhome');
        }
        else{
            //echo "<h1>Something went wrong. Please check the data.</h1>";
            return redirect()->route('userhome');
        }
        //return $newuser;
    }

    public function updateUser(Request $req, string $id){
        $newuser    =   DB::table('newusers')
                            ->where('id',$id)
                            ->update([
                                'name'=>$req->username,
                                'email'=>$req->useremail,
                                'age'=>$req->userage,
                                'city'=>$req->usercity,
                            ]);
                            
        if($newuser){
            Session::flash('message',"User Updated Successfully");
            return redirect()->route('userhome');
            //echo "Data Added";
        }
        else{
            Session::flash('message',"User Not Updated");
            return redirect()->route('userhome');
            //echo "Data Not Added";
        }
    }

    public function updatepage(string $id,Request $req){
        //$user   =   DB::table('newusers')->where('id',$id)->get();
        $user   =   DB::table('newusers')->find($id);
        if($user){
            return view('updateuser',['data'=>$user]);    
        }
        else{
            Session::flash('message',"The mentioned user does not exist");
            return redirect()->route('userhome');
        }
        //return $user;
        return view('updateuser',['data'=>$user]);
    }

    public function deleteUser(string $id){
        $user   =   DB::table('newusers')->find($id);
        if($user){
            $newuser    =   DB::table('newusers')
                            ->where('id',$id)
                            ->delete();
            if($newuser){
                Session::flash('message',"User Deleted Successfully");
                return redirect()->route('userhome');
            }
            else{
                Session::flash('message',"Somewrong here");
                return redirect()->route('userhome');
            }
        }
        else{
            Session::flash('message',"The mentioned user does not exist");
            return redirect()->route('userhome');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Database\Query\JoinClause;
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

    public function addNewUser(Request $req){
        $req->validate([
            "username"=>"required",
            'useremail'=>'required|email|unique:newusers,email',
            'userpass'=>'required|alpha_num:ascii|min:6',
            'userage'=>'required|numeric|between:18,99',
            'usercity'=>'required'
        ]);
        $newuser    =   DB::table('newusers')->insert(
            [                
                'name'=>    $req->username,
                'email'=>   $req->useremail,
                'age'=>     $req->userage,
                'city'=>    $req->usercity,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                "username.required"=>"User name paao",
                "useremail.required"=>"user email paao",
                "useremail.email"=>"Sahi paao",
                "userage.required"=>"Umar paao",
                "userage.numeric"=>'age should be number',
                'userage.min:18'=>"Age should be not greater than 18"
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

    public function showJoinedUsers(){
        // $joinedusers  =   DB::table('newusers')
        //                 ->select('newusers.*','cities.city_name as CityName')
        //             ->rightJoin('cities','newusers.city','=','cities.id')
        //             // ->select(DB::raw('count(*) as student_count'),'cities.city_name')
        //             // ->groupBy('cities.city_name')
        //             // ->havingBetween('student_count',[1,5])
        //             // ->orderBy('student_count','DESC')
        //             //->where('newusers.name','like','%s%')
        //             //->whereNull('newusers.id')
        //             ->get();
        $joinedusers    =   DB::table('newusers')
                            ->select('newusers.*','cities.city_name as CityName')
                            ->leftJoin('cities',function(JoinClause $join){
                                $join->on('newusers.city','=','cities.id');
                            })
                            ->get();
        //return $joinedusers;
        return view('/joineduser',['joinedusers'=>$joinedusers]);
    }

    public function uniondata(){
        $lecturers  =   DB::table('lecturers')
                        ->select('name','email','city','cities.city_name as cityname')
                        ->join('cities','lecturers.city','=','cities.id');
        $newuser    =   DB::table('newusers')
                        ->select('name','email','city','cities.city_name as cityname')
                        ->join('cities','newusers.city','=','cities.id')
                        ->union($lecturers)
                        ->get();
        return $newuser;
    }

    public function whendata(){
        $bool       =   true;
        $newuser    =   DB::table('newusers')
                        ->when($bool,function($query){
                            $query->where('age','>',17);
                        },function($query){
                            $query->where('age','<',17);
                        })
                        ->get();
        return $newuser;
    }

    public function chunkdata(){
        $newuser    =   DB::table('newusers')
                        ->orderBy('id')
                        ->chunkById(2,function($newusers){
                            echo "<div style='border:1px solid red;margin-bottom:15px;'>";
                            foreach($newusers as $student){
                                echo $student->name."<br/>";
                            }
                            echo "</div>";
                        });
    }
}

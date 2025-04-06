<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Pagination\Paginator;
use Exception;
use Illuminate\Container\Attributes\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;

class ItemController extends Controller
{
    //
    public function getallitems(){
        //$allitems = Item::all();
        $allitems = FacadesDB::table('items')->orderBy('id')->cursorPaginate(2);
        return view('getallitems',['allitems'=>$allitems]);
    }

    public function getsingleitem($id)
    {
        $singleitem = Item::find($id);
        return view('single',compact('singleitem'));
    }

    public function updateitem($id)
    {
        $updateitem = Item::find($id);
        return view('updateitem',compact('updateitem'));
    }

    public function updatepostitem($id, Request $request){
        $request->validate([
            'username'=>'required|min:3',
            'userpassword'=>'required|min:8',
            'userage'=>'required|numeric|min:18',
            'usercity'=>'required|between:2,50'
        ]);
        $update = Item::find($id);
        $update->update([
            'username'=>$request->username,
            'userpassword'=>$request->userpassword,
            'userage'=>$request->userage,
            'city'=>$request->usercity,
        ]);
        return redirect('/getallitems')->with('success',"Updated Successfully");
    }

    public function deleteitem($itemid){
        $delete= Item::find($itemid);
        $delete->delete();
        return redirect('/getallitems');
    }

    public function addnewitems(Request $request){
        $request->validate([
            'username'=>'required|min:3|unique:items,username',
            'userpassword'=>'required|min:8',
            'userage'=>'required|numeric|min:18',
            'usercity'=>'required|between:2,50'
        ]);
        try {
            $item = new Item;
            $item->username = $request->username;
            $item->userpassword = $request->userpassword;
            $item->userage = $request->userage;
            $item->city = $request->usercity;
            $item->save();
            return redirect('/additems')->with('status','User has been added successfully');
        } catch (Exception $e) {
            echo 'Message '.$e->getMessage();
        }
        
    }
}

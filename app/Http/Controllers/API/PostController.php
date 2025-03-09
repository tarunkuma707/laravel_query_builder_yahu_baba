<?php

namespace App\Http\Controllers\API;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Pole;
use Illuminate\Support\Facades\Validator;

class PostController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['posts']  =   Pole::all();
        return $this->sendResponse($data, 'All Post Fetch Successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validateUser   =   Validator::make(
            $request->all(),
            [
                'title'=>'required',
                'description'=>'required',
                'image'=>'required|mimes:png,jpg,jpeg,gif',
            ]
        );
        if($validateUser->fails()){
            $this->sendError("Validation Error",401);
        }
        $img            =   $request->image;
        $ext            =   $img->getClientOriginalExtension();
        $imageName      =   time().".".$ext;
        $img->move(public_path().'/uploads/'.$imageName);
        $post   =   Pole::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$imageName
        ]);
        return $this->sendResponse($post, 'Post added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data['post']   =   Pole::select('id','title','description','image')->where(['id'=>$id])->get();
        return $this->sendResponse($data, 'View Single Post');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validateUser   =   Validator::make(
            $request->all(),
            [
                'title'=>'required',
                'description'=>'required',
                'image'=>'nullable|mimes:png,jpg',
            ]
        );
        if($validateUser->fails()){
            $this->sendError("Validation Error",401);
        }

        $postImage   =   Pole::select('id','image')->where(['id'=>$id])->get();
        if($request->image!=""){
            $path   =   public_path().'/uploads/';
            if($postImage[0]->image!="" && $postImage[0]->image!=null){
                $old_file = $path.$postImage[0]->image;
                if(file_exists($old_file)){
                    unlink($old_file);
                }
            }
            $img            =   $request->image;
            $ext            =   $img->getClientOriginalExtension();
            $imageName      =   time().".".$ext;
            $img->move(public_path().'/uploads/'.$imageName);
        }
        else{
            $imageName  =   $postImage[0]->image;
        }
       
        $post   =   Pole::where(['id'=>$id])->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$imageName
        ]);
        return $this->sendResponse($post, 'Post Added Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $imagePath  =   Pole::select('image')->where(['id'=>$id])->get();
        if($imagePath[0]['image']!='' && $imagePath[0]['image']!=null){
            $filepath   =   public_path().'/uploads/'.$imagePath[0]['image'];
            if(file_exists($filepath)){
                unlink($filepath);
            }
        }
        $post   =   Pole::where(["id"=>$id])->delete(); 
        return $this->sendResponse($post, 'Post Deleted Successfully');
    }
}

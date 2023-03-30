<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'thumbnail' => 'required|image'
            // 'thumbnail' => 'required|image|mimes:png'
        ]);
        if($validator->fails()){
            return back()->with('status', 'Something wrong');
        }else{
            // Rename image
            $imageName = time() . "." . $request->thumbnail->extension();
            // save into folder
            $request->thumbnail->move(public_path(path: 'thumbnail'), $imageName);
            Post::create([
                'user_id' => auth()->user()->id,
                'title' => $request->title,
                'description' => $request->description,
                'thumbnail' => $imageName
            ]);

            return redirect(route('posts.all'))->with('status', 'Post has been successfully created');    
        }

        
    }

    public function show($postId){
        $post = Post::findOrFail($postId);
        return view('post.show', compact('post'));
    }

    public function edit($postId){
        $post = Post::findOrFail($postId);
        return view('post.edit', compact('post'));
    }

    public function update($postId, Request $request){
        Post::findOrFail($postId)->update($request->all());
        return redirect(route('posts.all'))->with('status', 'Post has been successfully updated');    
    }

    public function delete($postId){
        Post::findOrFail($postId)->delete();
        return redirect(route('posts.all'));    
    }

}
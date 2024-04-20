<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use FFI;

class PostController extends Controller
{
    public function store(StorePostRequest $request)
    {
        $request->validate([
            'title' => 'required',
            'img_at' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required',
        ]);

        $post = new Post();

        if ($file = $request->file('img_at')) {
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $target_path = public_path('uploads/');
            $file->move($target_path, $fileName);
        } else {
            $fileName = null;
        }

        $post->title = $request->input('title');
        $post->img_at = $fileName;
        $post->description = $request->input('description');
        $post->user_id = Auth::id();

        $post->save();

        return redirect()->route('product.index'); // 修正: indexへのルート名を指定
    }
    

    public function edit($id){
            $post = Post::find($id);

            return view('products.edit', ['post' => $post]);
    } //編集

   
    

    public function update(UpdatePostRequest $request, $id)
    {
            $post=Post::find($id);

            if($file = $request->image){
                $fileName = time() . $file->getClientOriginalName();
                $target_path = public_path('uploads/');
                $file->move($target_path, $fileName);
            }else{
                $fileName = null;
            }
        
            $post->title=$request->input('title');
            $post->image=$fileName;
            $post->description=$request->input('description');

            $post->save();

            return redirect('post/index');
    }
}

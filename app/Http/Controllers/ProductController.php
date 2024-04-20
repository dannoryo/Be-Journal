<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\StorePostRequest; // forgot to import this one
use Illuminate\Support\Facades\Auth; // also this one need to be imported
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Post::orderBy('created_at', 'desc')->get();
        return view('products.index',['products' => $products]);
    
    }

    public function edit($id)
{
    $product = Post::findOrFail($id);
    return view('products.edit', ['product' => $product]);
}
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
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'img_at' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required',
        ]);

        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = Auth::id();

        if($request->hasFile('image')){
            if($post->img_at){
                $target_path = public_path('uploads/' . $post->img_at);
                if(File::exists( $target_path)){
                    File::delete( $target_path);
                }
            }
        }

        if ($file = $request->file('image')) {
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $target_path = public_path('uploads/');
            $file->move($target_path, $fileName);
            $post->img_at = $fileName;
        } else {
            $fileName = null;
        }

        $post->save();

        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        // テーブルから指定のIDのレコード1件を取得
        $post = Post::find($id);
        // レコードを削除
        $post->delete();
        // 削除したら一覧画面にリダイレクト
        return redirect()->route('product.index');
    }


    // public function create(){
    //     return view('products.create');
    // }

    // public function store(Request $request){
    //     dd($request);
    // }

    
}

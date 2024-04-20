<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SearchController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('name')) {
            $name = $request->input('name');
            if (blank($name)) {
                $message = "名前が入力されていません";
                return view('products.search', ['message' => $message]);
            }

            // ユーザー名での検索
            $users = User::where('name', $name)->first();
            // dd($users->id);
            if ($users) {
                // $posts = [];
                // ユーザーが見つかった場合、そのユーザーの投稿情報を取得
                // foreach ($users as $user) {
                //     $userPosts = DB::table('posts')->where('user_id', $user->id)->get();
                //     $posts = array_merge($posts, $userPosts->toArray());
                // }
                // $posts = 
                // return view('products.search', ['users' => $users, 'posts' => $posts]);
                $users = User::with('posts')->where('id', $users->id)->get();
                return view('products.search', ['users' => $users]);

            } else {
                // ユーザーが見つからなかった場合のメッセージを表示
                $message1 = "該当するユーザーが見つかりませんでした。";
                return view('products.search', ['message1' => $message1]);
            }
        } else {
            // nameパラメータがない場合は検索フォームを表示
            return view('products.search');
        }

    }
}
?>
@extends('products.app-jones')
@section('content')
<style>

.background{
    display: flex;
    justify-content: center;
    align-items: center;
}
img {
    width: 200px;
    height: auto; /* アスペクト比を維持しながら幅に合わせて高さを自動調整 */
}
</style>

<body class="background">
<form method="POST" action="{{ route('products.edit', ['post' => $post->id]) }}" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="title">タイトル</label>
        <input type="text" name="title" value="{{ $post->title }}">
    </div>
    <div>
        <label for="image accept="image/png,image/jpeg,image/jpg">ファイルを選択</label>
        <img src="{{ asset('uploads/' . $post->img_at) }}" alt="" srcset="">
        <input type="file" name="image" value="{{ asset('uploads/' . $post->img_at) }}">
    </div>
    @error('image')
    {{ $message }}
    @enderror
    <div>


        <label for="description">詳細</label>
        <textarea name="description" rows="5"></textarea>
    </div>
    @error('description')
    {{ $message }}
    @enderror
    <div>
        <button type="submit">保存</button>
    </div>
</form>
    
</body>
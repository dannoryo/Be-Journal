@extends('products.app-jones')
@section('content')

<head>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
</head>

<style>
    .main_body{
        background-color: black;
    }
    .new_title{
        color: #f7f7f7;
    }
                
        /* カード */
        .card {
            width: calc(100% - 40px); /* 画面幅から左右の余白分を引く */
            margin: 20px auto; /* 上下のマージンを追加して画面中央に配置 */
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
        }

        .card img {
            max-width: 100%; /* 画像をカードの幅に収める */
            height: auto;
            display: block; /* 画像を中央に配置するためにブロック要素にする */
            margin: 0 auto; /* 画像を水平方向に中央配置 */
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.25rem;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 1rem;
            color: #666;
        }

    /* モーダル */
    .modal-content {
        border-radius: 8px;
    }

    .modal-body {
        padding: 20px;
    }

    .modal-title {
        font-size: 1.5rem;
        margin-bottom: 20px;
    }

    /* モバイルレスポンシブ */
    @media (max-width: 767px) {
        .card {
            width: calc(50% - 20px);
        }
    }

    @media (max-width: 575px) {
        .card {
            width: calc(100% - 20px);
        }
    }
    /* モーダルのスタイル */
        .modal-dialog {
            max-width: 600px; /* モーダルの最大幅 */
        }

        .modal-content {
            border-radius: 20px; /* モーダルの角を丸くする */
        }

        .modal-header {

            background-color: #666; /* ヘッダーの背景色 */

            color: #fff; /* ヘッダーテキストの色 */
            border-radius: 20px 20px 0 0; /* ヘッダーの角を丸くする */
        }

        .modal-title {
            font-size: 100px; /* タイトルのフォントサイズ */
        }

        .modal-body {
            padding: 20px;
        }

        .modal-footer {
            background-color: #f7f7f7; /* フッターの背景色 */
            border-radius: 0 0 20px 20px; /* フッターの角を丸くする */
        }

        .modal-header .btn-close {
            color: #fff !important;
        }


        /* フォームのスタイル */
        form {
            margin-top: 20px;
        }

        form label {
            font-weight: bold; /* ラベルのテキストを太字にする */
        }

        form input[type="text"],
        form textarea {
            width: 100%; /* 入力フィールドの幅を100%にする */
            padding: 10px; /* 入力フィールドの内側の余白 */
            margin-bottom: 20px; /* 入力フィールドの下マージン */
            border-radius: 5px; /* 入力フィールドの角を丸くする */
            border: 1px solid #ddd; /* 入力フィールドの境界線 */
        }



        form img {
            max-width: 200px; /* 画像の最大幅 */
            max-height: 200px; /* 画像の最大高さ */
            margin-bottom: 10px; /* 画像の下マージン */
        }

        form textarea {
            height: 100px; /* テキストエリアの高さ */
        }

        form .modal-footer button {
            margin-right: 10px; /* ボタンの右マージン */
        }

            /* ボタンのスタイル */
        .btn.btn-primary {
            background-color: black !important; /* ボタンの背景色を黒色に設定 */
            color: white !important; /* ボタンのテキスト色を白色に設定 */
        }

</style>

<body class="main_body">
    
    <h1 class="new_title"> Welcome</h1>

    <div class="card-container">
        @foreach($products as $post)
            <div class="card">
                <img src="{{ asset('uploads/' . $post->img_at) }}" class="card-img-top" alt="Post Image">
            
                <div class="card-body d-flex flex-column"> <!-- d-flex と flex-column でフレックスコンテナを作成 -->
                <h1 class="card-title">{{ $post->title }}</h1>
                <p class="card-text">{{ $post->description }}</p>
                @if($post->user_id == Auth::id())
                
                
                <!-- Edit Button -->
                <div class="d-flex justify-content-end"> <!-- justify-content-end で要素を右側に配置 -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $post->id }}">
                        Edit
                    </button>
                </div>
                @endif
            </div>
        </div>


            {{--Edit Modal --}}

<div class="modal fade" id="editModal{{ $post->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('products.update',  $post->id ) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $post->title }}">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label"></label>
                        <img src="{{ asset('uploads/' . $post->img_at) }}" alt="" class="img-fluid mb-2">
                        <input type="file" name="image" class="form-control">

                    </div>
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="description" class="form-label"></label>
                        <textarea name="description" class="form-control" rows="5">{{ $post->description }}</textarea>
                    </div>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="ri-inbox-archive-line"></i></button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirmation{{ $post->id }}"><i class="ri-delete-bin-line"></i> </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="ri-close-line"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- 削除確認モーダル --}}
<div class="modal fade" id="deleteConfirmation{{ $post->id }}" tabindex="-1" aria-labelledby="deleteConfirmationLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationLabel">Confirm Delate</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure to delate?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="ri-close-line"></i> Cancell</button>
                <form action="{{ route('products.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="ri-delete-bin-line"></i> </button>
                </form>
            </div>
        </div>
    </div>
</div>

        @endforeach
    </div>

</body>
{{-- @endsection --}}


@endsection




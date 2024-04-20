<x-app-layout>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
        <title>Document</title>
    </head>
<body>
<style>
    main {
    background-color: black;
    height: 100vh;
    width: 100%;
    align-items: center;
    justify-content: center;
    display: grid;
    }
                    /* フォームのスタイル */
        .modal-body form {
            width: 100%; /* フォームの幅を100%にする */
        }   

        .modal-body form div {
            margin-bottom: 20px; /* 各入力フィールドの下マージン */
        }

        .modal-body form label {
            font-weight: bold; /* ラベルのテキストを太字にする */
        }

        .modal-body form input[type="text"],
        .modal-body form textarea {
            width: calc(100% - 20px); /* 入力フィールドの幅を100%にする */
            padding: 10px; /* 入力フィールドの内側の余白 */
            margin-bottom: 10px; /* 入力フィールドの下マージン */
            border-radius: 5px; /* 入力フィールドの角を丸くする */
            border: 1px solid #ccc; /* 入力フィールドの境界線 */
        }

        /* .modal-body form input[type="file"] {
            display: none; 
        } */

        .modal-body form label[for="image"] {
            cursor: pointer; /* ファイル選択ボタンのカーソルをポインターにする */
            padding: 10px; /* ファイル選択ボタンの内側の余白 */
            background-color: #007bff; /* ファイル選択ボタンの背景色 */
            color: #fff; /* ファイル選択ボタンのテキスト色 */
            border-radius: 5px; /* ファイル選択ボタンの角を丸くする */
        }

        .modal-body form label[for="image"]:hover {
            background-color: #0056b3; /* ホバー時の背景色 */
        }

        .modal-body form textarea {
            width: calc(100% - 20px); /* テキストエリアの幅を100%にする */
            padding: 10px; /* テキストエリアの内側の余白 */
            margin-bottom: 10px; /* テキストエリアの下マージン */
            border-radius: 5px; /* テキストエリアの角を丸くする */
            border: 1px solid #ccc; /* テキストエリアの境界線 */
            resize: none; /* テキストエリアのリサイズを無効にする */
        }

        .modal-body form button[type="submit"] {
            padding: 10px 20px; /* 送信ボタンのパディング */
            background-color: #007bff; /* 送信ボタンの背景色 */
            color: #fff; /* 送信ボタンのテキスト色 */
            border: none; /* 送信ボタンのボーダーをなくす */
            border-radius: 5px; /* 送信ボタンの角を丸くする */
            cursor: pointer; /* 送信ボタンのカーソルをポインターにする */
        }

        .modal-body form button[type="submit"]:hover {
            background-color: #0056b3; /* ホバー時の背景色 */
        }

    .title_1>h1 {
    align-items: center;
    font-size: calc(6.375rem + 1.5vw);
    color: white;
    display: flex;
    justify-content: center;
    }

    .dashboard{
        display: flex;
    justify-content: center;
    }

</style>


    


    <div class="title_1">
        <h1>What's New</h1>
    </div>

        {{-- <h1>新規登録</h1> --}}
    <div class="dashboard">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
            Create Post
        </button>
    </div>
        
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">journal</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">  
                        <form method="POST" action="{{ route('index') }}" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label for="title">Title</label>
                                <input type="text" name="title" >
                            </div>  
                            @error('title')
                            {{ $message }}
                            @enderror
                        
                            <div>
                                <label for="img_at"></label>
                                <input type="file" name="img_at" accept="image/png,image/jpeg,image/jpg">
                                
                            </div>
                            @error('image')
                            {{ $message }}
                            @enderror
                        
                            <div>
                                <label for="description">Description</label>
                                <textarea name="description" id="" rows="5"></textarea>
                            </div>
                            @error('description')
                            {{ $message }}
                            @enderror
                            <div>
                                <button type="submit">Post</button>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>

    
    
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

        <script>
            var myModal = new bootstrap.Modal(document.getElementById('editModal'));
            myModal.show();
        </script>
    </body>
    </html>
</x-app-layout>

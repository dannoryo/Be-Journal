@extends('products.app-jones')
@section('content')


<body class="search_body">    
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 flex flex-col justify-center items-center h-screen">
        <form action="{{ route('products.search') }}" method="GET" class="mt-8 w-full max-w-md">
        @csrf
        <div class="flex items-center">
            <input type="text" name="name" placeholder="Find User" class="rounded-l-md p-2 border border-gray-300 w-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-white">
            <button type="submit" class="bg-indigo-500 hover:bg-indigo-700 text-black font-bold py-2 px-4 rounded-r-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">search</button>
        </div>
        </form>

        @if (isset($message))
        <p class="mt-4 text-gray-800">{{ $message }}</p>
        @endif

        @if (isset($users))
        <div class="mt-8 w-full max-w-xl">
            <h1 class="text-2xl font-bold text-white">{{ $users[0]->name }}</h1>
            <table class="mt-4 w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left text-white">Title</th>
                        <th class="px-4 py-2 text-left text-white">Description</th>
                        <th class="px-4 py-2 text-left text-white">Image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users[0]->posts as $post)
                        <tr>
                            <td class="border px-4 py-2 text-white">{{ $post->title }}</td>
                            <td class="border px-4 py-2 text-white">{{ $post->description }}</td>
                            <td class="border px-4 py-2 text-white"><img src="{{ asset('uploads/' . $post->img_at) }}" class="card-img-top" alt="Post Image"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    @if (isset($message1))
        <p class="mt-4 text-gray-800">{{ $message1 }}</p>
    @endif
</div>

<style>
    /* 追加のスタイリング */
    .search_body {
        background-color: black;
        height: 100vh;
        width: 100%;
        display: grid;
        justify-content: center;
        align-items: center;
    }

    .flex{
        box-sizing: revert-layer;
    }

    input[type="text"],
    button {
        height: 40px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        border: 1px solid #b03535;
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #69626249;
    }
</style>
</body>
@endsection

<form action="{{ route('products.search') }}" method="GET">
    @csrf
    <input type="text" name="name" placeholder="名前を入力">
    <button type="submit">検索</button>
</form>

@if (isset($message))
    <p>{{ $message }}</p>
@endif


@if (isset($users))
    <h1>{{ $users[0]->name }}</h1>
    <table>
        <tr>
            <th>id</th>
            <th>title</th>
            <th>description</th>
            <th>image</th>
        </tr>
        @foreach($users[0]->posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->description }}</td>
                <td><img src="{{ $post->img_at }}" alt="Post Image"></td>
            </tr>
        @endforeach
    </table>
@endif

@if (isset($message1))
    <p>{{ $message1 }}</p>
@endif

@endsection


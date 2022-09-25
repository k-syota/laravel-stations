<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    @if($errors -> any())
        <ul>
            @foreach ( $errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="store" method="POST">
        @csrf
        <label for="">
            タイトル：
            <input type="text" name="title">            
        </label>
        <label for="">
            公開年：
            <input type="text" name="published_year">
        </label>
        <label for="">
            画像：
            <input type="text" name="image_url">
        </label>
        <label for="">
            公開中：
            <input type="checkbox" name="is_showing" value="1">
        </label>
        <label for="">
            公開予定
            <input type="checkbox" name="is_showing" value="0">
        </label>
        <label for="">
            概要：
            <input type="text" name="description">
        </label>

        {{-- <input type="text" name="title"> --}}
        <button type="submit">作成</button>
    </form>
</body>
</html>

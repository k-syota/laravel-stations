<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MovieIndex</title>
</head>

<body>
    <ul>
        @foreach ($records as $record)
            <li>タイトル: {{ $record->title }}</li>
            <li>画像: <img src="{{ $record->image_url }}" alt=""> </li>
        @endforeach
    </ul>
</body>

</html>

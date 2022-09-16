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
        <table>
            <tr>
                <th>ID</th>
                <th>タイトル</th>
                <th>画像</th>
                <th>公開年</th>
                <th>上映中？</th>
                <th>概要</th>
            </tr>
            @foreach ($records as $record)
                <tr>
                    <td>{{ $record->id }}</td>
                    <td>{{ $record->title }}</td>
                    <td><img src="{{ $record->image_url }}" alt=""></td>
                    <td>{{ $record->published_year }}</td>
                    <td>{{ $record->is_showing }}</td>
                    <td>{{ $record->description }}</td>
                </tr>
            @endforeach
        </table>
    </ul>
</body>

</html>

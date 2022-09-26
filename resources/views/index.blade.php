<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MovieIndex</title>
</head>

<body>
    <a href="http://localhost:8888/admin/movies/create">
        <p>作成画面へ</p>
    </a>
    <ul>
        <table>
            <tr>
                {{-- <th>ID</th> --}}
                <th>タイトル</th>
                <th>画像</th>
                <th>公開年</th>
                <th>上映中？</th>
                <th>概要</th>
                {{-- <th>作成日</th>
                <th>更新日</th> --}}
            </tr>
            @foreach ($records as $record)
                <tr>
                    {{-- <td>{{ $record->id }}</td> --}}
                    <td>{{ $record->title }}</td>
                    <td>{{ $record->image_url }}</td>
                    <td>{{ $record->published_year }}</td>
                    <td>{{ $record->is_showing }}</td>
                    <td>{{ $record->description }}</td>
                    <td>
                        <a href="{{ route('movie.edit', [$record->id]) }}">
                            <button>編集</button>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('movie.destroy',[$record->id] ) }}" method="post">
                            @csrf
                            @method("delete")
                            <button type="submit" onclick="return confirm('削除します。よろしいですか？')">削除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </ul>
</body>

</html>

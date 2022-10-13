<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MovieIndex</title>
</head>

<body style="text-align: center">
    <a href="{{ route('movie.create') }}">
        <p>作成画面へ</p>
    </a>
    <a href="{{ route('schedule.index') }}">
        <p>スケジュール一覧へ</p>
    </a>

    <div>
        <p>検索フォーム</p>
        <form action="{{ route('movie.index') }}" method="get">
            <input type="text" value="" name="keyword" placeholder="何か入力してください"><br>
            <label for="status">
                全て
                <input type="radio" name="status" id="">
            </label>
            <label for="status">
                公開中
                <input type="radio" name="status" id="" value="1">
            </label>
            <label for="status">
                公開予定
                <input type="radio" name="status" id="" value="0">
            </label><br>
            <button type="submit">検索</button>
        </form>
    </div>

    @if (isset($keyword))
        {{ $keyword }}
        {{-- {{ $status  }} --}}
    @endif

    @if (isset($status))
        {{-- {{ $keyword }} --}}
        {{ $status }}
    @endif

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
                    <td>
                    @if ($record->is_showing)
                        公開中
                    @else
                        公開予定
                    @endif
                    </td>
                    <td>{{ $record->description }}</td>
                    <td>
                        <a href="{{ route('movie.edit', [$record->id]) }}">
                            <button>編集</button>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('movie.destroy', [$record->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="return confirm('削除します。よろしいですか？')">削除</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('movie.show',[$record->id]) }}">
                            詳細
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </ul>
</body>

</html>

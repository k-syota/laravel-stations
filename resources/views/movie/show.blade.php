<h1>詳細画面</h1>

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
    {{-- @foreach ($records as $record) --}}
    <tr>
        {{-- <td>{{ $record->id }}</td> --}}
        <td>{{ $record->title }}</td>
        <td>
            {{-- <img src="" alt=""> --}}
            <img src="{{ $record->image_url }}" alt="">
        </td>
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
            <a href="{{ route('movie.show', [$record->id]) }}">
                詳細
            </a>
        </td>
    </tr>
    {{-- @endforeach --}}
</table>

<table>
    <tr>
        <th>上映開始時間</th>
        <th>上映終了時間</th>
    </tr>
    @foreach ($schedules as $schedule)
        <tr>
            <td>{{ $schedule->start_time }}</td>
            <td>{{ $schedule->end_time }}</td>
            <td><a href="{{ route('schedule.show',[$schedule->id]) }}">詳細</a></td>
            <td>
                <a href="{{ route('sheet.show',['id'=>$schedule->movie->id,'schedule_id'=>$schedule->id,'screening_date'=>now()->format('Ymd')]) }}">
                    座席を予約する
                </a>
            </td>
        </tr>
    @endforeach

</table>

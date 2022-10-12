<a href="{{ route('movie.index') }}">映画一覧へ</a>

@foreach ($schedules as $schedule)
    <h1>作品タイトル{{ $schedule->movie->title }}</h1>
    <h1>作品ID：{{ $schedule->movie->id }}</h1>

    <p>上映開始時間：{{ $schedule->start_time }}</p>
    <p>上映終了時間：{{ $schedule->end_time }}</p>
    <p>作成日時：{{ $schedule->created_at }}</p>
    <p>更新日時：{{ $schedule->updated_at }}</p>
    <a href="{{ route('schedule.show',[$schedule->id]) }}">詳細</a>
@endforeach

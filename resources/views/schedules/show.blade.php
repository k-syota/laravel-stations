<h1>
   映画タイトル：{{ $schedule->movie->title }}
</h1>

<p>
    上映開始時間：{{ $schedule->start_time }}
</p>
<p>
    上映終了時間：{{ $schedule->end_time }}
</p>

<a href="{{ route('schedule.edit', [$schedule->id]) }}">編集</a>

<form action="{{ route('schedule.destroy', [$schedule->id]) }}" method="post">
    @csrf
    @method("delete")
    <button type="submit" onclick="return confirm('削除します。よろしいですか？')" >
        削除
    </button>
</form>

<button>
    <a href="{{ route('schedule.index') }}">スケジュール一覧へ</a>
</button>

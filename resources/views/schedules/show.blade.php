<h1>{{ $schedule->movie->title }}</h1>

<p>{{ $schedule->start_time }}</p>
<p>{{ $schedule->end_time }}</p>

<a href="{{ route('schedule.edit', [$schedule->id]) }}">編集</a>

<form action="{{ route('schedule.destroy', [$schedule->id]) }}" method="post">
    @csrf
    @method("delete")
    <button type="submit" onclick="return confirm('削除します。よろしいですか？')" >
        削除
    </button>
</form>

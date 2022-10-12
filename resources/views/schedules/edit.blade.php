<h1>{{ $schedule->movie->title }}</h1>

<form method="post" action="{{ route('schedule.update',[$schedule->id]) }}" >
    @csrf
    {{-- @method("patch") --}}
    {{-- <input type="date" name="" id=""> --}}
    <input type="time" name="start_time" id="" value="{{ $schedule->start_time }}">
    <input type="time" name="end_time" id="" value="{{ $schedule->end_time }}">
    <button type="submit">更新</button>
</form>

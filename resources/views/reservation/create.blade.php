<p>予約フォーム</p>

<form action="{{ route('reservation.store',['id'=>$movie->id,'schedule_id'=>$schedule->id]) }}" method="post">
    @csrf
    <p>上映作品：{{ $movie->title }}</p>
    <input type="hidden" name="title" value="{{ $movie->title }}">

    <p>上映スケジュール：開始{{ $schedule->start_time }}：終了{{ $schedule->end_time }}</p>
    <input type="hidden" name="start_time" value="{{ $schedule->id }}">

    <p>座席：{{ $sheet->row }}-{{ $sheet->column }}</p>
    <input type="hidden" name="sheet_id" value="{{ $sheet->id }}">

    <p>日付：{{ $screening_date }}</p>
    <input type="hidden" name="screening_date" value="{{ $screening_date }}">

    <label for="name">
        予約者名
        <input type="text" name="name" id="name" placeholder="名前を入力してください">
    </label>

    <label for="email">
        メールアドレス
        <input type="email" name="email" id="email" placeholder="メールアドレスを入力してください">
    </label>

    <button type="submit">予約する</button>

</form>

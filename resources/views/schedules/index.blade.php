<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        h1{
            font-family: serif;
        }
        .schedule-time{
            display: flex
        }
        .create-update-time{
            display: flex
        }
    </style>
</head>

<body>
    <a href="{{ route('movie.index') }}">映画一覧へ</a>

    @foreach ($schedules as $schedule)
        <h1 class="mt-2 text-gray-600">
            作品タイトル:{{ $schedule->movie->title }}
        </h1>
        <h3>
            作品ID：{{ $schedule->movie->id }}
        </h3>

        <div class="schedule-time">
            <p>上映開始時間：{{ $schedule->start_time }}</p>
            <p>上映終了時間：{{ $schedule->end_time }}</p>
        </div>
        <div class="create-update-time">
            <p>作成日時：{{ $schedule->created_at }}</p>
            <p>更新日時：{{ $schedule->updated_at }}</p>
        </div>

        <a href="{{ route('schedule.show', [$schedule->id]) }}">スケジュールの詳細</a>
    @endforeach
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style.css">
    <title>Document</title>
    <style>
        table {
            background-color: antiquewhite;
            margin: auto;
        }

        tr {
            display: flex;
            flex-wrap: wrap;
            width: 510px;
            text-align: center
        }

        td {
            width: 100px;
        }
    </style>
</head>

<body>
    <p style="text-align: center">スクリーン</p>
    <table>
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($sheets as $sheet)
                    <td>
                        <a
                            href="{{ route('reservation.create', ['id' => $movie->id, 'schedule_id' => $schedule->id, 'sheet_id' => $sheet->id, 'screening_date' => now()->format('Ymd')]) }}">
                            {{ $sheet->row }}-{{ $sheet->column }}
                        </a>
                    </td>
                @endforeach
            </tr>
        </tbody>
    </table>
    @foreach ($sheets as $s)
        {{-- <p>座席{{ $s }}</p> --}}
        @if ($s->schedules)
            @foreach ($s->schedules as $sh)
                <p>予約：{{ $sh }}</p>
            @endforeach
        @endif
    @endforeach
</body>

</html>

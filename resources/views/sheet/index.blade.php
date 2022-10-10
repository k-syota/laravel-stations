<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style.css" >
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        <tbody>
            <tr>
                @foreach ($sheets as $sheet)
                    <td>
                        {{ $sheet->row }}-{{ $sheet->column }}
                    </td>
                @endforeach
            </tr>
        </tbody>
        </thead>
    </table>
</body>

</html>

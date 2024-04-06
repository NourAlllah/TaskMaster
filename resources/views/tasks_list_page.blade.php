<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task Page list</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/table.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pagination.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h1 id="title">Tasks list</h1>
    <div class="table-container">
        <table >
            <tr>
                <th>Title </th>
                <th>Description</th>
                <th>Assigned Name</th>
                <th>Admin Name</th>
            </tr>
            <tr>
                <td>2nd row<br>5th cell</td>
                <td>6th cell</td>
                <td>7th cell</td>
                <td>8th cell</td>
        </table>

        <div class="pagination">
            <a href="#">&laquo;</a>
            {{-- <?php
            $shipments_per_page = 15;
            if ($number_of_shipments == 0) {
                $pages = 0;
            } else {
                $pages = ceil($number_of_shipments[0]->NumberOfShipments / $shipments_per_page);
            }
            
            ?> --}}
            {{-- @for ($i = 1; $i <= $pages; $i++)
                @if (isset($_GET['page']))
                    @if ($_GET['page'] == $i)
                        <a class='active' href="?page={{ $i }}">{{ $i }}</a>
                    @else
                        <a href="?page={{ $i }}">{{ $i }}</a>
                    @endif
                @else
                    @if ($i == 1)
                        <a class='active' href="?page={{ $i }}">{{ $i }}</a>
                    @else
                        <a href="?page={{ $i }}">{{ $i }}</a>
                    @endif
                @endif
            @endfor --}}

            <a href="#">&raquo;</a>
        </div>
    </div>

</body>
</html>
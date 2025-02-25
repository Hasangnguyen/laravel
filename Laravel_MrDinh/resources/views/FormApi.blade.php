<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid-19 Data</title>
    <link rel="stylesheet" href="../assets/css/Api.css">
    <style>
    </style>
</head>
<body>
    <h1>Covid-19 Global Data</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Country</th>
                <th>Total Confirmed</th>
                <th>Total Deaths</th>
                <th>Total Recovered</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($data) && is_array($data))
                @foreach($data as $item)
                    <tr>
                        <td>{{ $item['userId'] ?? 'N/A' }}</td>
                        <td>{{ $item['id'] ?? 'N/A' }}</td>
                        <td>{{ $item['title'] ?? 'N/A' }}</td>
                        <td>{{ $item['body'] ?? 'N/A' }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4">No data available</td>
                </tr>
            @endif
        </tbody>
    </table>
</body>
</html>

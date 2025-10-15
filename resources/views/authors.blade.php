<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        h1 {
            color: #333;
            border-bottom: 2px solid #ccc;
            padding-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse; /* Menghilangkan garis ganda */
            margin-top: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: white;
        }
        th, td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
            text-transform: uppercase;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #e9e9e9;
        }
        .description-cell {
            font-size: 0.9em;
            color: #555;
        }
    </style>
</head>
<body>
    <h1>Selamat Datang di Halaman Authors</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Authors</th>
                <th>Photo</th>
                <th>Bio</th>
            </tr>
        </thead>
        <tbody>
            {{-- Melakukan perulangan (looping) data $genres --}}
            @foreach ($authors as $item)
                <tr>
                    <td>{{ $item['id'] }}</td>
                    <td><strong>{{ $item['name'] }}</strong></td>
                    <td><a href="#">{{ $item['photo'] }}</a></td>
                    <td>{{ $item['bio'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
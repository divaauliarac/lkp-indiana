<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Data Instructor</title>

    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background: #f0f0f0;
        }
    </style>
</head>

<body>
    <h2 style="text-align:center;">DATA INSTRUCTOR</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Expertise</th>
                <th>Phone</th>
                <th>Address</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($instructor as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td> {{ $item->gender == 'male' ? 'Male' : 'Female' }}</td>
                    <td>
                        <select class="form-select" name="expertise" required>
                            <option value="pg" {{ $item->expertise == 'pg' ? 'selected' : '' }}>Programming
                            </option>
                            <option value="dg" {{ $item->expertise == 'dg' ? 'selected' : '' }}>Design
                            </option>
                            <option value="ap" {{ $item->expertise == 'ap' ? 'selected' : '' }}>Office
                            </option>
                            <option value="jk" {{ $item->expertise == 'jk' ? 'selected' : '' }}>Network
                            </option>
                        </select>
                    </td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->address }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>

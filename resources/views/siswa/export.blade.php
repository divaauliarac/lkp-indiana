<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Data Siswa</title>

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
    <h2 style="text-align:center;">DATA SISWA</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Place</th>
                <th>Date of Birth</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Subject</th>
                <th>Education</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($siswa as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->gender == 'm' ? 'Male' : 'Female' }}</td>
                    <td>{{ $item->place }}</td>
                    <td>{{ $item->dateofbirth }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>
                        <select class="form-select" name="subject" required>
                            <option value="pg" {{ $item->subject == 'pg' ? 'selected' : '' }}>Programming
                            </option>
                            <option value="dg" {{ $item->subject == 'dg' ? 'selected' : '' }}>Design
                            </option>
                            <option value="ap" {{ $item->subject == 'ap' ? 'selected' : '' }}>Office
                            </option>
                            <option value="jk" {{ $item->subject == 'jk' ? 'selected' : '' }}>Network
                            </option>
                        </select>
                    </td>
                    <td>
                        <select class="form-select" disabled id="education" name="education">
                            <option value="junior"{{ $item->education == 'junior' ? 'selected' : '' }}>Junior High
                                School</option>
                            <option value="senior"{{ $item->education == 'senior' ? 'selected' : '' }}>Senior High
                                School</option>
                            <option value="bachelor"{{ $item->education == 'bachelor' ? 'selected' : '' }}>Bachelor's
                                Degree</option>
                        </select>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>

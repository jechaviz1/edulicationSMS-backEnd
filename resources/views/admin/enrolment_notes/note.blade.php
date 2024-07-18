<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enrolment Notes PDF</title>
    <style>
        /* Define your styles for the PDF here */
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Enrolment Notes</h1>

    <table>
        <thead>
            <tr>
                <th>Note</th>
                <th>Category</th>
                <th>Created By</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($enrolmentNotes as $enrol)
            <tr>
                <td>{{ $enrol->note }}</td>
                <td>{{ $enrol->category->name }}</td>
                <td>{{ $enrol->created_by }}</td>
                <td>{{ $enrol->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>

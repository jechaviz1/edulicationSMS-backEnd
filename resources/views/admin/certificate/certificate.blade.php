<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-size: cover;
            position: relative;
            width: 100%;
            height: 100%;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="content">
     {{ $data->templatesa->newCertificateName }}
     @if ($data->include_report != 0)
     <div>
         <h5>COMPETENCY REPORT</h5>
     </div>
     <div>
         <label for="">LearnerName:</label>
         <span>falak Khan</span>
     </div>
     <div>
      <label for="">
        Course Code
    </label>
    <span>
    </span>
     </div>
     <div>
        <label for="">
          Course Name:
      </label>
      <span>
      </span>
       </div>
       <h5>Core</h5>
       <table>
        <thead>
            <tr>
                <th>Core Code</th>
                <th>Name</th>
                <th>Outcome-National</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($enrollment->student->unitCompetencies as $module)
        @if ($module->type == 'core')
            <tr>
                <th scope="col">{{ $module->code }}</th>
                <th scope="col">{{ $module->name }}</th>
                <th scope="col">Continuing enrolment</th>
                <th scope="col"></th>
            <tr>
        @endif
    @endforeach
        </tbody>
    </table>
    <h5>Elective</h5>
    <table>
     <thead>
         <tr>
            <th>Core Code</th>
                <th>Name</th>
                <th>Outcome-National</th>
                <th>Date</th>
         </tr>
     </thead>
     <tbody>
        @foreach ($enrollment->student->unitCompetencies as $module)
        @if ($module->type == 'elective')
            <tr>
                <th scope="col">{{ $module->code }}</th>
                <th scope="col">{{ $module->name }}</th>
                <th scope="col">Continuing enrolment</th>
                <th scope="col"></th>
            <tr>
        @endif
    @endforeach
     </tbody>
 </table>
     @endif
    </div>
</body>
</html>
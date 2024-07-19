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
       
    </style>
</head>
<body>
    <div class="content">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Student</th>
      <th scope="col">Unit</th>
      <th scope="col">Note</th>
      <th scope="col">Enrtollment Date</th>
      <th scope="col">unit Competency Date</th>
      <th scope="col">Out Come</th>
      <th scope="col">module Activity Start</th>
      <th scope="col">Completion Date</th>
    </tr>
  </thead>
  <tbody>
    @foreach($enrollment->student->unitCompetencies as $module)
      <tr>
        <th></th>
        <td>{{ $module->code }}</td>
        <td>{{ $module->name }}</td>
        <td>{{ $module->pivot->enrollment_date }}</td>
        <td>{{ $module->pivot->module_activity_start}}</td>
        <td>{{$module->pivot->outcomeId}}</td>
        <td>{{ $module->pivot->note }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
    </div>
</body>
</html>
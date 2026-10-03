<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>IMS - Student Profile</title>
</head>

<body>
  <h1>Student Profile</h1>
  <p>First Name: {{ $student->first_name }}</p>
  <p>Last Name: {{ $student->last_name }}</p>
  <p>Student Type: {{ $student->student_type }}</p>
</body>

</html>
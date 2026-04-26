<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Note App</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<h1>Student Grade App</h1>
<p class="subtitle">Enter student information and grade.</p>

<form action="save.php" method="post" onsubmit="return validateForm();">
<label for="name">Student name</label>
<input type="text" id="name" name="name" placeholder="Enter student name">

<label for="subject">subject</label>
<input type="text" id="subject" name="subject" placeholder="Enter subject">

<label for="professor">professor</label>
<input type="text" id="professor" name="professor" placeholder="Enter professor name">

<label for="grade">grade</label>
<select id="grade" name="grade">
<option value="">Select grade</option>
<option value="A">A</option>
<option value="B">B</option>
<option value="C">C</option>
<option value="D">D</option>
<option value="F">F</option>
</select>

<br><br>
<button type="submit">Save grade</button>
</form>

<h2>Saved students</h2>
<div class="list-box">
<?php
$file = "data.json";

if (file_exists($file)) {
    $data = file_get_contents($file);
    $students = json_decode($data, true);

    if (!is_array($students)) {
        $students = [];
    }
} else {
    $students = [];
}

if (!empty($students)) {
    echo "<ul>";
    foreach ($students as $item) {
        $safeName = htmlspecialchars($item["name"] ?? "");
        $safeSubject = htmlspecialchars($item["subject"] ?? "");
        $safeProfessor = htmlspecialchars($item["professor"] ?? "");
        $safeGrade = htmlspecialchars($item["grade"] ?? "");

        echo "<li>";
        echo "<strong>$safeName</strong><br>";
        echo "Subject: $safeSubject<br>";
        echo "Professor: $safeProfessor<br>";
        echo "Grade: $safeGrade";
        echo "</li><br>";
    }
    echo "</ul>";
} else {
    echo "<p>No data yet.</p>";
}
?>
</div>
</div>

<script src="script.js"></script>
</body>
</html>


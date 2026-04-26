<?php
$name = trim($_POST["name"] ?? "");
$subject = trim($_POST["subject"] ?? "");
$professor = trim($_POST["professor"] ?? "");
$grade = trim($_POST["grade"] ?? "");

if ($name === "" || $subject === "" || $professor === "" || $grade === "")  {
    header("Location: index.php");
    exit();
}

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

$newItem = [
    "name" => $name,
    "subject" => $subject,
    "professor" => $professor,
    "grade" => $grade

];

$students[] = $newItem;

file_put_contents($file, json_encode($students, JSON_PRETTY_PRINT));

header("Location: index.php");
exit();
?>


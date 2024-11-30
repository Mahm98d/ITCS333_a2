<?php
$url = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";

$response = file_get_contents($url);
$data = json_decode($response, true);

$students = $data['results'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/picocss/dist/pico.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Student Nationality Data</title>
</head>
<body>
    <main>
        <h1>UOB Student Nationality Data</h1>
        <table>
            <head>
                <tr>
                    <th>Year</th>
                    <th>Semester</th>
                    <th>The program</th>
                    <th>Nationality</th>
                    <th>College</th>
                    <th>Number of Students</th>
                </tr>
            </head>
            <body>
                <?php foreach ($students as $student): ?>
                <tr>
                    <td><?php echo htmlspecialchars($student['year']); ?></td>
                    <td><?php echo htmlspecialchars($student['semester']); ?></td>
                    <td><?php echo htmlspecialchars($student['the_programs']); ?></td>
                    <td><?php echo htmlspecialchars($student['nationality']); ?></td>
                    <td><?php echo htmlspecialchars($student['colleges']); ?></td>
                    <td><?php echo htmlspecialchars($student['number_of_students']); ?></td>
                </tr>
                <?php endforeach; ?>
            </body>
        </table>
    </main>
</body>
</html>


<?php
declare(strict_types=1);

require 'DAL.php';

// Get course code from URL
$courseCode = $_GET['code'] ?? '';
if (empty($courseCode)) {
    header('Location: index.php');
    exit();
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_student'])) {
        $studentId = (int)$_POST['student_id'];
        if (addStudentToCourse($studentId, $courseCode)) {
            echo "<script>alert('Student added successfully!');</script>";
        } else {
            echo "<script>alert('Failed to add student. They might already be in the course.');</script>";
        }
    } elseif (isset($_POST['remove_student'])) {
        $studentId = (int)$_POST['student_id'];
        if (removeStudentFromCourse($studentId, $courseCode)) {
            echo "<script>alert('Student removed successfully!');</script>";
        } else {
            echo "<script>alert('Failed to remove student.');</script>";
        }
    }
}

// Get students in course
$students = getStudentsInCourse($courseCode);
// Get all students for the add student dropdown
$allStudents = getAllStudents();

include 'header.php';
?>

<div class="content-wrapper">
    <h1>Course: <?= htmlspecialchars($courseCode) ?></h1>
    
    <!-- Students List -->
    <div class="students-list">
        <h2>Enrolled Students</h2>
        <?php if (empty($students)): ?>
            <p>No students enrolled in this course.</p>
        <?php else: ?>
            <table class="students-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Midterm</th>
                        <th>Final Exam</th>
                        <th>Project</th>
                        <th>Total Score</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($students as $student): ?>
                        <tr>
                            <td><?= htmlspecialchars((string)$student['student_id']) ?></td>
                            <td><?= htmlspecialchars($student['full_name']) ?></td>
                            <td><?= htmlspecialchars((string)$student['midterm_score']) ?></td>
                            <td><?= htmlspecialchars((string)$student['final_exam_score']) ?></td>
                            <td><?= htmlspecialchars((string)$student['project_score']) ?></td>
                            <td><?= htmlspecialchars((string)$student['total_score']) ?></td>
                            <td>
                                <form method="POST" style="display: inline;">
                                    <input type="hidden" name="student_id" value="<?= $student['student_id'] ?>">
                                    <button type="submit" name="remove_student" class="btn-remove">Remove</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    
    <div class="add-student-form">
        <h2>Add Student to Course</h2>
        <form method="POST">
            <select name="student_id" required>
                <option value="">Select a student...</option>
                <?php foreach ($allStudents as $student): ?>
                    <option value="<?= $student['student_id'] ?>">
                        <?= htmlspecialchars($student['full_name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit" name="add_student" class="btn-add">Add Student</button>
        </form>
    </div>
</div>

<style>
.content-wrapper {
    padding: 20px;
    max-width: 1200px;
    margin: 0 auto;
}

.students-table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
}

.students-table th,
.students-table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.students-table th {
    background-color: #f5f5f5;
}

.btn-remove {
    background-color: #ff4444;
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 3px;
    cursor: pointer;
}

.btn-remove:hover {
    background-color: #cc0000;
}

.add-student-form {
    margin-top: 30px;
    padding: 20px;
    background-color: #f5f5f5;
    border-radius: 5px;
}

.add-student-form select {
    padding: 8px;
    margin-right: 10px;
    min-width: 200px;
}

.btn-add {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 8px 15px;
    border-radius: 3px;
    cursor: pointer;
}

.btn-add:hover {
    background-color: #45a049;
}
</style>

<?php include 'footer.php'; ?>
<?php
declare(strict_types=1);
require 'DAL.php';
$courseCode = $_GET['code'] ?? '';
if (empty($courseCode)) {
    header('Location: index.php');
    exit();
}
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
$students = getStudentsInCourse($courseCode);
$allStudents = getAllStudents();
$classes = getAllClasses();
include 'header.php';
?>


<div class="content-wrapper">
    <div class="students-list">
        <div style="display: flex; align-items: center; gap: 2px; margin: 0; padding: 0;">
            <h1 style="margin: 0; padding: 0;">Course:</h1>
            <div class="dropdown" style="width: 100px; margin-top: 25px; margin-left: 0; padding: 0;">
                <input type="text" id="searchCourse" onkeyup="filterCourses()" placeholder="<?= htmlspecialchars($courseCode) ?>" class="dropdown-input specialDropdown">
                <ul id="courseList" class="dropdown-list">
                    <?php foreach ($classes as $class): ?>
                        <li class="dropdown-item">
                            <a href="course.php?code=<?= htmlspecialchars($class['course_code']) ?>" class="course-link">
                                <?= htmlspecialchars($class['course_code']) ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <br>
        <div style="display: flex; align-items: center; gap: 2px; padding: 0;">
            <h2>Enrolled Students</h2>
            <a href="edit_grades.php?code=<?= htmlspecialchars($courseCode) ?>" class="btn-edit-grades">
                <i class="fas fa-edit"></i> Edit Grades
            </a>
        </div>
        <br>
        <?php if (empty($students)): ?>
            <p>No students enrolled in this course.</p>
        <?php else: ?>
            <div class="table-responsive">
                <table class="students-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Test 1</th>
                            <th>Test 2</th>
                            <th>Test 3</th>
                            <th>Final Exam</th>
                            <th>Final Grade</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($students as $student): ?>
                            <tr>
                                <td><?= htmlspecialchars((string)$student['student_id']) ?></td>
                                <td><?= htmlspecialchars($student['full_name']) ?></td>
                                <td><?= htmlspecialchars((string)$student['test_one']) ?></td>
                                <td><?= htmlspecialchars((string)$student['test_two']) ?></td>
                                <td><?= htmlspecialchars((string)$student['test_three']) ?></td>
                                <td><?= htmlspecialchars((string)$student['final_exam']) ?></td>
                                <td><?= htmlspecialchars((string)$student['final_grade']) ?></td>
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
            </div>
        <?php endif; ?>
    </div>
    <form method="POST">
        <div class="add-student-form" style="display: flex; align-items: center;">
            <h2 style="display: inline;">Add Student:</h2>
            <div class="dropdown student-dropdown" style="margin-right: 10px; margin-top: 20px; margin-left: 10px;">
                <input type="text" id="searchStudent" class="dropdown-input" onkeyup="filterStudents()" placeholder="Search for a student by name or ID..." style="display: inline-block;">
                <ul id="studentList" class="dropdown-list" style="display: none;">
                    <?php foreach ($allStudents as $student): ?>
                        <li class="dropdown-item" data-value="<?= $student['student_id'] ?>">
                            <?= htmlspecialchars($student['full_name']) ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <input type="hidden" name="student_id" id="selectedStudent" required>
            </div>
            <button type="submit" name="add_student" class="btn-add">Add Student</button>
        </div>
    </form>
</div>

<?php include 'footer.php'; ?>

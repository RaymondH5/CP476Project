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
include 'header.php';
?>

<style>
    .dropdown {
        position: relative; /* Ensure positioning context */
        display: inline-block;
        width: 100%;
    }
    .dropdown-input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .dropdown-list {
        position: absolute;
        width: 100%;
        max-height: 200px;
        overflow-y: auto;
        border: 1px solid #ccc;
        background: white;
        display: none;
        list-style: none;
        padding: 0;
        margin: 0;
        bottom: 100%; /* Moves the dropdown above the input */
        top: auto; /* Ensures it doesn't take default bottom positioning */
    }
    .dropdown-item {
        padding: 10px;
        cursor: pointer;
    }
    .dropdown-item:hover {
        background: #f1f1f1;
    }
</style>

<div class="content-wrapper">
    <h1>Course: <?= htmlspecialchars($courseCode) ?></h1>
    <br>
    <div class="students-list">
        <h2>Enrolled Students</h2>
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
                            <th>Midterm</th>
                            <th>Final</th>
                            <th>Project</th>
                            <th>Total</th>
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
            </div>
        <?php endif; ?>
    </div>
    <div class="add-student-form">
        <h2>Add Student to Course</h2>
        <br>
        <form method="POST">
            <div class="dropdown">
                <input type="text" id="searchInput" class="dropdown-input" placeholder="Search for a student...">
                <ul id="studentList" class="dropdown-list">
                    <?php foreach ($allStudents as $student): ?>
                        <li class="dropdown-item" data-value="<?= $student['student_id'] ?>">
                            <?= htmlspecialchars($student['full_name']) ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <input type="hidden" name="student_id" id="selectedStudent" required>
            </div>
            <button type="submit" name="add_student" class="btn-add">Add Student</button>
        </form>
    </div>
</div>

<script>
    document.getElementById("searchInput").addEventListener("keyup", function() {
        let filter = this.value.toLowerCase();
        let list = document.getElementById("studentList");
        let items = list.getElementsByClassName("dropdown-item");
        
        for (let i = 0; i < items.length; i++) {
            let name = items[i].textContent.toLowerCase();
            let studentId = items[i].getAttribute("data-value").toLowerCase();
            
            if (name.includes(filter) || studentId.includes(filter)) {
                items[i].style.display = "block";
            } else {
                items[i].style.display = "none";
            }
        }
        list.style.display = filter ? "block" : "none";
    });

    document.querySelectorAll(".dropdown-item").forEach(item => {
        item.addEventListener("click", function() {
            document.getElementById("searchInput").value = this.textContent;
            document.getElementById("selectedStudent").value = this.getAttribute("data-value");
            document.getElementById("studentList").style.display = "none";
        });
    });
</script>

<?php include 'footer.php'; ?>

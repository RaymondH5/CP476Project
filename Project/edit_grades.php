<?php
declare(strict_types=1);
require 'DAL.php';
$courseCode = $_GET['code'] ?? '';
if (empty($courseCode)) {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Store messages in session to show after redirect
    session_start();
    
    if (isset($_POST['students']) && is_array($_POST['students'])) {
        $successCount = 0;
        $errorCount = 0;
        
        foreach ($_POST['students'] as $studentId => $grades) {
            $studentId = (int)$studentId;
            $testOne = $grades['test_one'] ?? null;
            $testTwo = $grades['test_two'] ?? null;
            $testThree = $grades['test_three'] ?? null;
            $finalExam = $grades['final_exam'] ?? null;
            
            if (updateStudentGrades($courseCode, $studentId, $testOne, $testTwo, $testThree, $finalExam)) {
                $successCount++;
            } else {
                $errorCount++;
            }
        }
        
        $_SESSION['message'] = [
            'success' => $successCount,
            'error' => $errorCount
        ];
    }
    
    header("Location: course.php?code=" . urlencode($courseCode));
    exit();
}

$students = getStudentsInCourse($courseCode);
$allStudents = getAllStudents();
include 'header.php';

// Show messages from session if they exist
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    echo "<script>alert('Successfully updated {$message['success']} records. Failed to update {$message['error']} records.');</script>";
    unset($_SESSION['message']);
}
?>


<div class="content-wrapper">
    <div class="students-list">
        <form method="POST" id="gradesForm">
            <div style="display: flex; align-items: center; gap: 2px; margin: 0; padding: 0;">
                <h1 style="margin: 0; padding: 0;">Course: <?= htmlspecialchars($courseCode) ?></h1>
            </div>
            <br>
            <div style="display: flex; align-items: center; gap: 2px; padding: 0;">
                <h2>Enrolled Students</h2>
                <button type="submit" form="gradesForm" class="btn-edit-grades">
                    <i class="fas fa-edit"></i> Submit Changes
                </button>
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($students as $student): ?>
                                <tr>
                                    <td><?= htmlspecialchars((string)$student['student_id']) ?></td>
                                    <td><?= htmlspecialchars($student['full_name']) ?></td>
                                    <td>
                                        <input class="grade-input" type="number" 
                                            name="students[<?= $student['student_id'] ?>][test_one]" 
                                            value="<?= htmlspecialchars((string)$student['test_one']) ?>">
                                    </td>
                                    <td>
                                        <input class="grade-input" type="number" 
                                            name="students[<?= $student['student_id'] ?>][test_two]" 
                                            value="<?= htmlspecialchars((string)$student['test_two']) ?>">
                                    </td>
                                    <td>
                                        <input class="grade-input" type="number" 
                                            name="students[<?= $student['student_id'] ?>][test_three]" 
                                            value="<?= htmlspecialchars((string)$student['test_three']) ?>">
                                    </td>
                                    <td>
                                        <input class="grade-input" type="number" 
                                            name="students[<?= $student['student_id'] ?>][final_exam]" 
                                            value="<?= htmlspecialchars((string)$student['final_exam']) ?>">
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>

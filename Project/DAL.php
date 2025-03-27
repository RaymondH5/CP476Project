<?php
declare(strict_types=1);

function OpenConnection() {
    $envPath = dirname(__DIR__) . '/.env';
    if (!file_exists($envPath)) {
        die("<script>alert(Error: .env file not found at $envPath);</script>");
    }

    $env = parse_ini_file($envPath);

    if (!$env) {
        die("<script>alert(Error: Unable to parse .env file);</script>");
    }

    $servername = $env['DB_HOST'] ?? null;
    $username = $env['DB_USER'] ?? null;
    $password = $env['DB_PASS'] ?? null;
    $dbname = $env['DB_NAME'] ?? null;

    if (!$servername || !$username || !$password || !$dbname) {
        die("<script>alert(Environment variables not set properly in .env file);</script>");
    }

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("<script>alert(Connection failed: " . $conn->connect_error . ");</script>");
    }

    return $conn;
}

function loginUser($username) {
    $conn = OpenConnection();
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        die("Invalid user id");
    }

    $row = $result->fetch_assoc();
    $user_id = $row['user_id'];
    $password_hash = $row['password_hash'];
    $firstName = $row['first_name'];
    $lastName = $row['last_name'];

    $stmt->close();

    return [
        'user_id' => $user_id,
        'password_hash' => $password_hash,
        'first_name' => $firstName,
        'last_name' => $lastName
    ];
}

function registerUser($username, $email, $password_hash, $first_name, $last_name) {
    $conn = OpenConnection();
    $stmt = $conn->prepare("INSERT INTO users (username, email, password_hash, first_name, last_name) VALUES (?, ?, ?, ?, ?)");

    if (!$stmt) {
        error_log("Error executing statement: " . $conn->error . " SQL: " . $conn->query);
        echo "<script>alert(Error: " . $conn->error. ");</script>";
        return false;
    }

    $stmt->bind_param("sssss", $username, $email, $password_hash, $first_name, $last_name);
    $success = false;
    if ($stmt->execute()) {
        $success = true;
    } else {
        echo "<script>alert(Error: " . $stmt->error . ");</script>";
        $success = false;
    }
    
    $stmt->close();
    return $success;
}

function validateInputs(...$inputs) {
    $sanitizedInputs = [];
    
    foreach ($inputs as $input) {
        if (!isset($input) || trim($input) === '') { 
            echo "<script>alert('All fields are required. Please fill in the missing fields.');</script>";
            return false;
        }
        $sanitized = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
        $sanitizedInputs[] = $sanitized;
    }
    
    return $sanitizedInputs;
}

function validateGradeInputs(array $grades): array {
    $sanitized = [];
    
    foreach ($grades as $key => $value) {
        if ($value === null || $value === '') {
            $sanitized[$key] = null;
            continue;
        }
        
        $value = (int)$value;
        if ($value < 0 || $value > 100) {
            return false;
        }
        
        $sanitized[$key] = $value;
    }
    
    return $sanitized;
}

function getAllClasses(): array {
    $conn = OpenConnection();
    $sql = "SELECT DISTINCT course_code FROM coursetable ORDER BY course_code ASC";
    $result = $conn->query($sql);
    $classes = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $classes[] = $row;
        }
    }

    $conn->close();
    return $classes;
}

function resetPassword($newPassword, $id): bool {
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    $conn = OpenConnection();
    $stmt = $conn->prepare("UPDATE users SET password_hash = ? WHERE user_id = ?");
    $stmt->bind_param("si", $hashedPassword, $id);
    $stmt->execute();
    $stmt->close();
    echo '<script>alert("Password Reset Successfully");</script>';
    header('Location: index.php');
    exit();
}

function getStudentsInCourse($courseCode): array {
    $conn = OpenConnection();
    
    $sql = "SELECT n.student_id, n.full_name, 
            c.test_one, c.test_two, c.test_three, c.final_exam
            FROM nametable n
            JOIN coursetable c ON n.student_id = c.student_id 
            WHERE c.course_code = ?
            ORDER BY n.full_name";
            
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $courseCode);
    $stmt->execute();
    $result = $stmt->get_result();
    $students = [];
    while ($row = $result->fetch_assoc()) {

        $finalGrade = ($row['test_one'] * 0.2) + 
                     ($row['test_two'] * 0.2) + 
                     ($row['test_three'] * 0.2) + 
                     ($row['final_exam'] * 0.4);

        $row['final_grade'] = number_format($finalGrade, 1, '.', '');
        $students[] = $row;
    }
    
    
    $stmt->close();
    $conn->close();
    return $students;
}

function getAllStudents(): array {
    $conn = OpenConnection();
    
    $sql = "SELECT student_id, full_name FROM nametable ORDER BY full_name";
    $result = $conn->query($sql);
    
    $students = [];
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
    
    $conn->close();
    return $students;
}

function addStudentToCourse($studentId, $courseCode): bool {
    $conn = OpenConnection();
    $checkSql = "SELECT 1 FROM coursetable WHERE student_id = ? AND course_code = ?";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bind_param("is", $studentId, $courseCode);
    $checkStmt->execute();
    $result = $checkStmt->get_result();
    
    if ($result->num_rows > 0) {
        $checkStmt->close();
        $conn->close();
        return false;
    }
    
    $sql = "INSERT INTO coursetable (student_id, course_code, test_one, test_two, test_three, final_exam) 
            VALUES (?, ?, 0, 0, 0, 0)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $studentId, $courseCode);
    $success = $stmt->execute();
    
    $stmt->close();
    $conn->close();
    return $success;
}

function removeStudentFromCourse($studentId, $courseCode): bool {
    $conn = OpenConnection();
    
    $sql = "DELETE FROM coursetable WHERE student_id = ? AND course_code = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $studentId, $courseCode);
    $success = $stmt->execute();
    
    $stmt->close();
    $conn->close();
    return $success;
}

function updateStudentGrades($courseCode, $studentId, $testOne, $testTwo, $testThree, $finalExam): bool {
    $conn = OpenConnection();
    
    $testOne = $testOne ?? 0;
    $testTwo = $testTwo ?? 0;
    $testThree = $testThree ?? 0;
    $finalExam = $finalExam ?? 0;
    
    $sql = "UPDATE coursetable SET 
            test_one = ?, 
            test_two = ?, 
            test_three = ?, 
            final_exam = ? 
            WHERE student_id = ? AND course_code = ?";
            
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        error_log("Prepare failed: " . $conn->error);
        $conn->close();
        return false;
    }
    
    $stmt->bind_param("iiiiis", 
        $testOne, 
        $testTwo, 
        $testThree, 
        $finalExam, 
        $studentId, 
        $courseCode
    );
    
    $success = $stmt->execute();
    
    if (!$success) {
        error_log("Execute failed: " . $stmt->error);
    }
    
    $stmt->close();
    $conn->close();
    
    return $success;
}
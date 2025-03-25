<?php
declare(strict_types=1);
require 'header.php';
require 'DAL.php'; 
$classes = getAllClasses();
?>
<section class="hero">
    <div class="hero-content">
        <h1 style="text-align: center;">Welcome to Our Student Website</h1>
        <h3 style="text-align: center;">Please select a course from below</h3>
        <div class="dropdown">
            <input type="text" id="searchInput" onkeyup="filterCourses()" placeholder="Search for courses..." class="dropdown-input">
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
</section>
<?php
require 'footer.php';
?>
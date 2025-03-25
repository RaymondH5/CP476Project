    <!-- Footer -->
    <div class="wrapper">
        <div class="content">
            <!-- Main page content goes here -->
        </div>
        <footer>
            <p class="copyright">&copy; 2025 Student Website.</p>
        </footer>
    </div>

    <script>
        function toggleMenu() {
            document.querySelector(".nav-links").classList.toggle("active");
        }
        function filterCourses() {
        const input = document.getElementById('searchInput');
        const filter = input.value.toLowerCase();
        const courseList = document.getElementById('courseList');
        const items = courseList.getElementsByTagName('li');

        for (let i = 0; i < items.length; i++) {
            const item = items[i];
            const text = item.textContent || item.innerText;
            if (text.toLowerCase().indexOf(filter) > -1) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        }
    }
        
    </script>
</body>
</html>
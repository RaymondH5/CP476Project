        <!-- Footer -->
        <footer>
            <p class="copyright">&copy; 2025 Student Website.</p>
        </footer>

        <script>
            function filterCourses() {
                let input = document.getElementById('searchCourse');
                let filter = input.value.toLowerCase();
                let courseList = document.getElementById('courseList');
                let items = courseList.getElementsByTagName('li');

                for (let i = 0; i < items.length; i++) {
                    let text = items[i].textContent || items[i].innerText;
                    items[i].style.display = text.toLowerCase().includes(filter) ? '' : 'none';
                }
            }

            function toggleMenu() {
                document.querySelector(".nav-links").classList.toggle("active");
            }
            
            function filterStudents() {
                let input = document.getElementById('searchStudent');
                let filter = input.value.toLowerCase();
                let studentList = document.getElementById('studentList');
                let items = studentList.getElementsByClassName('dropdown-item');

                for (let i = 0; i < items.length; i++) {
                    let name = items[i].textContent.toLowerCase();
                    let studentId = items[i].getAttribute("data-value").toLowerCase();
                    
                    items[i].style.display = name.includes(filter) || studentId.includes(filter) ? "block" : "none";
                }
                studentList.style.display = filter ? "block" : "none";
            }

            document.querySelectorAll("#studentList .dropdown-item").forEach(item => {
                item.addEventListener("click", function() {
                    document.getElementById("searchStudent").value = this.textContent;
                    document.getElementById("selectedStudent").value = this.getAttribute("data-value");
                    document.getElementById("studentList").style.display = "none";
                });
            });
        </script>
    </body>
</html>
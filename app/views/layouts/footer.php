        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function toggleReportsMenu(event) {
        event.preventDefault();

        const submenu = document.getElementById('reportsSubmenu');
        const toggle = event.currentTarget;

        if (submenu) {
            submenu.classList.toggle('show');
        }

        if (toggle) {
            toggle.classList.toggle('active');
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        const sidebarToggle = document.getElementById('sidebarToggle');

        /*
            Desktop:
            - sidebar-collapsed is saved in localStorage.

            Mobile:
            - sidebar-open is temporary only.
        */

        if (window.innerWidth > 991 && localStorage.getItem('sidebarCollapsed') === 'true') {
            document.body.classList.add('sidebar-collapsed');
        }

        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', function () {
                if (window.innerWidth <= 991) {
                    document.body.classList.toggle('sidebar-open');
                } else {
                    document.body.classList.toggle('sidebar-collapsed');

                    localStorage.setItem(
                        'sidebarCollapsed',
                        document.body.classList.contains('sidebar-collapsed')
                    );
                }
            });
        }

        document.addEventListener('click', function (event) {
            const sidebar = document.querySelector('.sidebar');
            const toggleBtn = document.getElementById('sidebarToggle');

            if (
                window.innerWidth <= 991 &&
                document.body.classList.contains('sidebar-open') &&
                sidebar &&
                toggleBtn &&
                !sidebar.contains(event.target) &&
                !toggleBtn.contains(event.target)
            ) {
                document.body.classList.remove('sidebar-open');
            }
        });

        window.addEventListener('resize', function () {
            if (window.innerWidth > 991) {
                document.body.classList.remove('sidebar-open');

                if (localStorage.getItem('sidebarCollapsed') === 'true') {
                    document.body.classList.add('sidebar-collapsed');
                }
            } else {
                document.body.classList.remove('sidebar-collapsed');
            }
        });
    });
</script>

</body>
</html>
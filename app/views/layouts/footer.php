        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const sidebarToggle = document.getElementById('sidebarToggle');

    if (localStorage.getItem('sidebarCollapsed') === 'true') {
        document.body.classList.add('sidebar-collapsed');
    }

    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', function () {
            document.body.classList.toggle('sidebar-collapsed');
            localStorage.setItem(
                'sidebarCollapsed',
                document.body.classList.contains('sidebar-collapsed')
            );
        });
    }
</script>
<script>
function toggleReportsMenu(event) {
    event.preventDefault();

    const submenu = document.getElementById('reportsSubmenu');
    const arrow = document.getElementById('reportsArrow');

    submenu.classList.toggle('show');
    arrow.classList.toggle('rotate');
}
</script>
</body>
</html>
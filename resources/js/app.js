//
import 'bootstrap';

const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('sidebarOverlay');
const openBtn = document.getElementById('openSidebarBtn');
const closeBtn = document.getElementById('closeSidebarBtn');

function toggleSidebar() {
    sidebar.classList.toggle('-translate-x-full');
    overlay.classList.toggle('hidden');
}

openBtn?.addEventListener('click', toggleSidebar);
closeBtn?.addEventListener('click', toggleSidebar);
overlay?.addEventListener('click', toggleSidebar);
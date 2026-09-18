//
import 'bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    const navbar = document.getElementById('navbar');
    
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.classList.add('bg-white/90', 'backdrop-blur-sm', 'shadow-sm');
            navbar.classList.remove('bg-white/0');
        } else {
            navbar.classList.add('bg-white/0');
            navbar.classList.remove('bg-white/90', 'backdrop-blur-sm', 'shadow-sm');
        }
    });

    const clockElement = document.getElementById('realtime-clock');

    function updateClock() {
        if (!clockElement) return;

        const now = new Date();
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');

        clockElement.textContent = `${hours}:${minutes}:${seconds}`;
    }

    updateClock();
    setInterval(updateClock, 1000);

    const projectItems = document.querySelectorAll('.project-item');
    const toggleContainer = document.getElementById('toggle-projects-container');
    const toggleBtn = document.getElementById('toggle-projects-btn');
    const maxVisibleProjects = 4;

    if (projectItems.length > maxVisibleProjects) {
        toggleContainer.classList.remove('hidden');

        projectItems.forEach((item, index) => {
            if (index >= maxVisibleProjects) {
                item.classList.add('hidden');
            }
        });

        let isExpanded = false;

        toggleBtn.addEventListener('click', () => {
            isExpanded = !isExpanded;

            projectItems.forEach((item, index) => {
                if (index >= maxVisibleProjects) {
                    if (isExpanded) {
                        item.classList.remove('hidden');
                    } else {
                        item.classList.add('hidden');
                    }
                }
            });

            toggleBtn.textContent = isExpanded ? '----- SHOW LESS -----' : '----- SHOW ALL PROJECTS -----';
        });
    }
});
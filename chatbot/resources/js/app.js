import './bootstrap';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';

import './bootstrap';

const sidebar = document.getElementById('sidebar');
const openSidebar = document.getElementById('openSidebar');
const closeSidebar = document.getElementById('closeSidebar');
const sidebarOverlay = document.getElementById('sidebarOverlay');

function openMenu() {
    sidebar.classList.add('open');
    sidebarOverlay.classList.add('show');
}

function closeMenu() {
    sidebar.classList.remove('open');
    sidebarOverlay.classList.remove('show');
}

openSidebar?.addEventListener('click', openMenu);

closeSidebar?.addEventListener('click', closeMenu);

sidebarOverlay?.addEventListener('click', closeMenu);
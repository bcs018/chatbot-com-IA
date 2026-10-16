import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

import './painel/instalarSeuSite.js';


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

document.getElementById('celular').addEventListener('input', function (e) {
    let valor = e.target.value.replace(/\D/g, '').slice(0, 11);

    if (valor.length > 7) {
        valor = valor.replace(/^(\d{2})(\d{5})(\d{0,4}).*/, '($1) $2-$3');
    } else if (valor.length > 2) {
        valor = valor.replace(/^(\d{2})(\d{0,5})/, '($1) $2');
    } else if (valor.length > 0) {
        valor = valor.replace(/^(\d*)/, '($1');
    }

    e.target.value = valor;
});
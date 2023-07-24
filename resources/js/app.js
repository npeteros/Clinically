import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Get the height of the window
var clientHeight = document.getElementById('main').clientHeight;

// Set a custom CSS variable to the window height
document.documentElement.style.setProperty('--window-height', clientHeight + 'px');

const hamburger = document.getElementById('sidebar_menu');
const sidebar = document.getElementById('sidebar');
const sidebar_div = document.getElementById('sidebar_div');

hamburger.addEventListener('click', () => {
    sidebar.classList.toggle('lg:block');
    sidebar_div.classList.toggle('sm:ml-32');
});
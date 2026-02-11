import './bootstrap';
import 'flowbite';

import Alpine from 'alpinejs';


window.Alpine = Alpine;

Alpine.start();

function initThemeToggles() {
    const toggles = document.querySelectorAll('.theme-toggle');

    toggles.forEach(toggle => {
        const darkIcon = toggle.querySelector('.theme-toggle-dark-icon');
        const lightIcon = toggle.querySelector('.theme-toggle-light-icon');

        // set initial icon state
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            if (lightIcon) lightIcon.classList.remove('hidden');
            if (darkIcon) darkIcon.classList.add('hidden');
        } else {
            if (darkIcon) darkIcon.classList.remove('hidden');
            if (lightIcon) lightIcon.classList.add('hidden');
        }

        toggle.addEventListener('click', function() {
            if (darkIcon) darkIcon.classList.toggle('hidden');
            if (lightIcon) lightIcon.classList.toggle('hidden');

            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }
        });
    });
}

// init on DOMContentLoaded in case scripts load before body
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initThemeToggles);
} else {
    initThemeToggles();
}

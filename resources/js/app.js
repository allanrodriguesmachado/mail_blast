import './bootstrap';
import 'flowbite';

import Alpine from 'alpinejs';
import Quill from "quill";
import 'quill/dist/quill.snow.css';

window.Quill = Quill;
window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    const editorEl = document.getElementById('editor-container');
    let quill;

    if (editorEl) {
        quill = new Quill('#editor-container', {
            theme: 'snow',
            placeholder: 'Escreva o conteúdo do template aqui...',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, 3, false] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'color': [] }, { 'background': [] }],
                    [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                    ['blockquote', 'code-block'],
                    ['link', 'image'],
                    ['clean']
                ]
            }
        });

        try {
            const initial = (typeof window !== 'undefined' && window.__quillInitialContent) ? window.__quillInitialContent : null;
            if (initial) {
                quill.root.innerHTML = initial;
            } else {
                const fallback = document.getElementById('quill-content-input');
                if (fallback && fallback.value) {
                    quill.root.innerHTML = fallback.value;
                }
            }
        } catch (err) {
            console.warn('Quill initial content error', err);
        }
    }

    const form = document.getElementById('editorForm');
    if (form) {
        form.addEventListener('submit', () => {
            const quillContentInput = document.getElementById('quill-content-input');
            if (quill && quillContentInput) {
                quillContentInput.value = quill.root.innerHTML;
            }
        });
    }
});

function initThemeToggles() {
    const toggles = document.querySelectorAll('.theme-toggle');

    toggles.forEach(toggle => {
        const darkIcon = toggle.querySelector('.theme-toggle-dark-icon');
        const lightIcon = toggle.querySelector('.theme-toggle-light-icon');

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

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initThemeToggles);
} else {
    initThemeToggles();
}

import './bootstrap';

import Alpine from 'alpinejs';


window.Alpine = Alpine;

Alpine.start();

import 'prismjs';
import 'prismjs/components/prism-markup-templating';
import 'prismjs/components/prism-php';
import 'prismjs/themes/prism-tomorrow.css';

document.addEventListener('DOMContentLoaded', () => {
    Prism.highlightAll();
});

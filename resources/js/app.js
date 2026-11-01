import $ from 'jquery';
window.$ = window.jQuery = $;

import { Modal, Toast } from 'bootstrap';

document.addEventListener('DOMContentLoaded', () => {
  const toastEl = document.getElementById('loadToast');
  const loadBtn = document.getElementById('loadBtn');
  if (toastEl && loadBtn) {
    const toast = new Toast(toastEl, { delay: 4000 });
    loadBtn.addEventListener('click', () => toast.show());
  }

  const modalEl = document.getElementById('seasonModal');
  if (!modalEl) return;

  const modal = Modal.getOrCreateInstance(modalEl);
  const content = modalEl.querySelector('.modal-content');
  const links = [...document.querySelectorAll('.js-card')];
  let current = 0;

  const load = async (i) => {
    current = (i + links.length) % links.length;
    const response = await fetch(links[current].href, {
      headers: { 'X-Requested-With': 'XMLHttpRequest' }
    });
    content.innerHTML = await response.text();
  };

  links.forEach((link, i) => {
    link.addEventListener('click', async (e) => {
      e.preventDefault();
      await load(i);
      modal.show();
    });
  });

  document.addEventListener('keydown', (e) => {
    if (!modalEl.classList.contains('show')) return;
    if (e.key === 'ArrowRight') load(current + 1);
    if (e.key === 'ArrowLeft') load(current - 1);
  });
});
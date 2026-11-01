import $ from 'jquery';
window.$ = window.jQuery = $;
import { Modal, Toast, Popover } from 'bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('[data-bs-toggle="popover"]').forEach(el => {
    new Popover(el, {
      trigger: 'hover focus',
      container: el.closest('.modal')
    });
  });
  const toast = new Toast(document.getElementById('loadToast'), { delay: 4000 });
  document.getElementById('loadBtn').addEventListener('click', () => toast.show());

  const cards = document.querySelectorAll('.js-card');
  const modals = [...document.querySelectorAll('.js-modal')];
  let busy = false;

  modals.forEach(modal => {
    modal.addEventListener('show.bs.modal', () => { busy = true; });
    modal.addEventListener('shown.bs.modal', () => { busy = false; });
  });

  cards.forEach((card, i) => {
    card.addEventListener('click', () => {
      Modal.getOrCreateInstance(modals[i]).show();
    });
  });

  document.addEventListener('keydown', (e) => {
    if (e.key !== 'ArrowRight' && e.key !== 'ArrowLeft') return;

    const current = modals.find(m => m.classList.contains('show'));
    if (!current || busy) return;

    e.preventDefault();
    busy = true;

    const step = e.key === 'ArrowRight' ? 1 : -1;
    const next = modals[(modals.indexOf(current) + step + modals.length) % modals.length];


    Modal.getOrCreateInstance(current).hide();


    current.addEventListener('hidden.bs.modal', () => {
      Modal.getOrCreateInstance(next).show();
    }, { once: true });


  });
});
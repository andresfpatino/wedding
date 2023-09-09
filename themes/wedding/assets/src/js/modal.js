const modalOverlay = document.getElementById('modalOverlay');
const modal = document.querySelector('.modal');
const modalTriggers = document.querySelectorAll('.modal-trigger');
const closeModalButton = document.getElementById('closeModal');
const body = document.body;
const video = document.getElementById('video'); 

if (modalOverlay && modal && modalTriggers && closeModalButton && video) {
    function openModal() {
        modalOverlay.style.display = 'flex';
        modalOverlay.style.opacity = '1';
        setTimeout(() => {
            modal.classList.add('active');
            body.classList.add('modal-open');
            video.volume = 0.4; 
            video.play();
        }, 50);
    }

    function closeModal() {
        modal.classList.remove('active');
        setTimeout(() => {
            modalOverlay.style.display = 'none';
            modalOverlay.style.opacity = '0';
            body.classList.remove('modal-open');
            video.volume = 0;
            video.pause();
        }, 300);
    }

    modalTriggers.forEach(trigger => {
        trigger.addEventListener('click', (e) => {
            e.preventDefault();
            openModal();
        });
    });

    closeModalButton.addEventListener('click', () => {
        closeModal();
    });

    modalOverlay.addEventListener('click', (event) => {
        if (event.target === modalOverlay) {
            closeModal();
        }
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            closeModal();
        }
    });
}

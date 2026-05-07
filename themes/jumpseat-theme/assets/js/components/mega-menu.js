
document.addEventListener('DOMContentLoaded', () => {
    const megaMenu = document.getElementById('selva-mega-menu');
    const menuTrigger = document.getElementById('selva-menu-toggle');

    if (megaMenu && menuTrigger) {

        const toggleMenu = (e) => {
            e.stopPropagation();
            const isActive = megaMenu.classList.contains('is-active');

            if (isActive) {
                megaMenu.classList.remove('is-active');
                menuTrigger.classList.remove('is-active');
                document.body.style.overflow = '';
            } else {
                megaMenu.classList.add('is-active');
                menuTrigger.classList.add('is-active');
                document.body.style.overflow = 'hidden';
            }
        };

        menuTrigger.addEventListener('click', toggleMenu);

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && megaMenu.classList.contains('is-active')) {
                megaMenu.classList.remove('is-active');
                menuTrigger.classList.remove('is-active');
                document.body.style.overflow = '';
            }
        });

        megaMenu.addEventListener('click', (e) => {
            if (e.target === megaMenu) {
                megaMenu.classList.remove('is-active');
                menuTrigger.classList.remove('is-active');
                document.body.style.overflow = '';
            }
        });
    }
});

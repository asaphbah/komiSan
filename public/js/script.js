const btnMenu = document.getElementById('btnBurger');
const btnBurger = document.getElementById('btnBurger');

function toggleMenu(event) {
    const menu = document.getElementById('menu-nav');
    const active = menu.classList.contains('show');

    if (event.type === 'touchstart') event.preventDefault();
    event.currentTarget.setAttribute('aria-expanded', active);
    if (active) {
        event.currentTarget.setAttribute('aria-label', "Abrir menu");
    } else {
        event.currentTarget.setAttribute('aria-label', "Fechar menu");
    }

    menu.classList.toggle('show');
    spanBurger.classList.toggle('show');
}

btnMenu.addEventListener('click', toggleMenu);
btnMenu.addEventListener('touchstart', toggleMenu);
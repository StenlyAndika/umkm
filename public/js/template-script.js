const list = document.querySelectorAll('.list');

function activeLink() {
    list.forEach(
        (item) => item.classList.remove('active')
    );
    this.classList.add('active');
}

list.forEach(
    (item) => item.addEventListener('click', activeLink),
);

let toggle = document.querySelector('.toggle');
let menu = document.querySelector('.menu-bar');
let nav = document.querySelector('.nav-bar');
let main = document.querySelector('.main-content');

toggle.onclick = function() {
    menu.classList.toggle('active');
    nav.classList.toggle('active');
    main.classList.toggle('active');
}
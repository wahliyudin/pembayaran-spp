const sidebar = document.querySelector('.sidebar'),
    headSidebar = document.querySelector('.head-sidebar'),
    sideItem = document.querySelector('.side-item'),
    sideItemText = document.querySelector('.side-item-text'),
    toggle = document.querySelector('.toggle');

toggle.addEventListener('click', function () {
    sidebar.querySelector('.side').classList.toggle('metismenu');

    sidebar.classList.toggle('inactive');
    // sidebar.classList.toggle('fixed');
    headSidebar.classList.toggle('inactive');
})

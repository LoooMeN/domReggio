window.onload = () => {
    let container = document.querySelector('.flex').children[0];
    console.log(container);

    setTimeout(() => {

        container.classList.add('fadeOut');

    }, 1000);

    setTimeout(() => {
        let form = container.children[1];

        form.action = "flex.js";
        form.children[0].children[0].placeholder = "Новый пароль";
        form.children[0].children[0].type = "password";
        form.children[1].children[0].placeholder = "Повторите пароль";
        container.children[0].innerText = "Восстановление пароля";
        container.children[2].remove();
        container.classList.add('fadeIn');

    }, 2000);
};
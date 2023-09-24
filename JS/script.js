const toggleBtn = document.querySelector('.toggle-btn');
const sidebar = document.querySelector('.sidebar');

toggleBtn.addEventListener('click', () => {
    sidebar.classList.toggle('closed');
});

const toggleDarkModeBtn = document.querySelector('.light-dark-btn');

toggleDarkModeBtn.addEventListener('click', () => {
    if(toggleDarkModeBtn.classList.contains('light-mode')) {
        toggleDarkModeBtn.innerHTML = 'clear_night';
        document.body.classList.add('dark');
        toggleDarkModeBtn.classList.remove('light-mode');
        toggleDarkModeBtn.classList.add('dark-mode');
    } else if(toggleDarkModeBtn.classList.contains('dark-mode')) {
        toggleDarkModeBtn.innerHTML = 'light_mode';
        document.body.classList.remove('dark');
        toggleDarkModeBtn.classList.remove('dark-mode');
        toggleDarkModeBtn.classList.add('light-mode');
    }
});

const sidebarSendBtn = document.querySelector('.focus-to-send');
const sendPostBtn = document.querySelector('.send-input');

sidebarSendBtn.addEventListener('click', () => {
    sendPostBtn.focus();
})

const userStatus = document.querySelector('.user');
const userOnOff = document.querySelector('.on-off');

userStatus.addEventListener('click', () => {
    userStatus.classList.toggle('offline');
    if(userOnOff.innerHTML === 'offline') {
        userOnOff.innerHTML = 'online';
    } else {
        userOnOff.innerHTML = 'offline';
    }
});
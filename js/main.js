const BODY = document.querySelector("body"),
      SIDEBAR = document.querySelector(".sidebar"),
      TOGGLE = document.querySelector(".toggle"),
      USER_TEXT = document.querySelector(".user-text"),
      STATUS = document.querySelector(".status"),
      TOP_BAR = document.querySelector(".top-bar"),
      POST = document.querySelector(".posted");

let isClicked = false;

TOGGLE.addEventListener("click", () => {
    SIDEBAR.classList.toggle("close");
})

USER_TEXT.addEventListener("click", () => {
    if(isClicked) {
        STATUS.style.color = "var(--green-color)";
        STATUS.innerText = "online";
        isClicked = false;
    } else {
        STATUS.style.color = "var(--highlight-color)";
        STATUS.innerText = "offline";
        isClicked = true;    
    }
})

POST.addEventListener("click", () => {
    window.open("../comment_page/comment.html","_self");
})

window.addEventListener("resize", () => {
    if(window.innerWidth <= 1024) {
        SIDEBAR.classList.add("close");
        TOGGLE.style.visibility = "hidden";
    } else {
        TOGGLE.style.visibility = "";
    }
})

window.addEventListener("scroll", () => {
    if(window.pageYOffset > 10) {
        TOP_BAR.classList.add("scrolled");
    } else {
        TOP_BAR.classList.remove("scrolled");
    }
})
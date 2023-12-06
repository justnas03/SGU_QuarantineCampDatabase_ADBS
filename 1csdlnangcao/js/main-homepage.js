// const side_menu = document.querySelector(".sidebar");
// const menu_left = document.querySelector(".bx-menu-alt-left");
// const menu_right = document.querySelector(".bx-menu-alt-right");

// menu_left.onclick = function() {
//     side_menu.classList.toggle("active");
// }

const bell = document.querySelector(".bell-ring");
const mainbell = document.querySelector(".main-notification");

console.log(bell)

bell.onclick = function(){
    mainbell.classList.toggle("active-notification");
}

// const statusBN = document.querySelector(".status-BN")
// if (statusBN.innerText == "Nghiêm trọng"){
//     statusBN.style.color = "darkred";
// }

// function refreshPages(){
//     window.location.reload();
// }
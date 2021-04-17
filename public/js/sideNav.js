const { initial } = require("lodash");

function openSideNav() {
    document.getElementById('menuBar').style.width = '160px';
    document.getElementById('content').style.marginLeft = '160px';
    document.getElementById('iconOpenNav').style.visibility = "hidden";
}

function closeSideNav() {
    document.getElementById('menuBar').style.width = '0';
    document.getElementById('content').style.marginLeft = '0';
    document.getElementById('iconOpenNav').style.visibility = "visible";
}



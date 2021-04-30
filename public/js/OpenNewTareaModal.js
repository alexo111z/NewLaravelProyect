const modalNT = document.getElementById('newTarea');
const openMNT = document.getElementById('btnModalNew');
const closeMNT = document.getElementById('closeModalNew');
// const btnClose = document.getElementsByClassName('modalCloseSpan');


// When the user clicks on the button, open the modal
openMNT.onclick = function() {
    modalNT.style.display = "block";
    checkData();
}
closeMNT.onclick = function() {
    closeModalNewT();
}
// When the user clicks on <span> (x), close the modal
btnClose.onclick = function() {
    closeModalNewT();
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modalNT) {
        closeModalNewT();
    }
}

const closeModalNewT = () => {
    modalNT.style.display = "none";
}


const modal = document.getElementById('editarTareas');
const openM = document.getElementById('btnModalEditor');
const closeM = document.getElementById('closeModal');
const btnClose = document.getElementsByClassName('modalCloseSpan');

const modalBody = document.getElementsByClassName('modal-body');


// When the user clicks on the button, open the modal
openM.onclick = function() {
    modal.style.display = "block";
    checkData();
}
closeM.onclick = function() {
    closeModal();
}
// When the user clicks on <span> (x), close the modal
btnClose.onclick = function() {
    closeModal();
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        closeModal();
    }
}

const closeModal = () => {
    modal.style.display = "none";
}
const checkData = () => {
    const data = document.getElementsByClassName('rowData');
    const array = [];
    let title, desc, state, id;
    for (let i = 0; i < data.length; i++) {
        if (data[i].children[3].children[0].children[0].checked) {
            id = data[i].children[3].children[0].children[0].id
            title = data[i].children[0].textContent
            desc = data[i].children[1].textContent
            state = data[i].children[2].getAttribute('value') != 0;
            //console.log(data[i].children[2].getAttribute('value'))
            //console.log(state)
            array.push({
                id: id,
                title: title,
                description: desc,
                state: state,
            });
        }
    }
    modalContent(array);
}
const modalContent = (array) => {
    //console.log(array)
    const content = modalBody[0];
    let text="";
    array.forEach((element,i) => {
        text += `
            <div class="showTareaData">
                <h6 class="num-tarea">Tarea ${i+1}</h6>
                <hr/>
                <div class="md-form">
                    <label for="form${i+1}">Tarea</label>
                    <input type="text" id="form${i+1}" class="form-control" value="${element.title}">
                </div>

                <div class="md-form">
                    <label for="form${i+5}">Descripción</label>
                    <textarea id="form${i+5}" class="md-textarea form-control" rows="3">${element.description}</textarea>
                </div>
                <div>
                <label for="form7">Estado: </label>
                <select class="custom-select custom-select-sm">
                <option value="${element.state ? 1 : 0}" selected>${element.state ? 'Completado' : 'Pendiente'}</option>
                <option value="${!element.state ? 1 : 0}">${!element.state ? 'Completado' : 'Pendiente'}</option>
                </select>
                </div>
                <input type="hidden" name="id" value="${element.id}">
            </div>
            <br/>
        `;
    });

    content.innerHTML = `<div class="overflowing-content">${text}</div>`;
}

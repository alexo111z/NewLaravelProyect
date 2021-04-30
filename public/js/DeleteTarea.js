
const btnDelete = document.getElementById('btnDeleteTarea');
const array = [];

btnDelete.onclick = function() {
    array.splice(0, array.length)
    const x = contadorTareas();
    if (x > 0) {
        const val = confirm(`¿Desea eliminar ${x} tareas?`);
        if (val) {
            // console.log(array)
            postDelete();
        }
    }
}

const contadorTareas = () => {
    const data = document.getElementsByClassName('rowData');
    let id, aux = 0;
    for (let i = 0; i < data.length; i++) {
        if (data[i].children[3].children[0].children[0].checked) {
            aux++;
            id = data[i].children[3].children[0].children[0].id
            dataToDelete(id)
        }
    }
    return aux
}

const dataToDelete = (id) => {
    array.push({
        id
    });
}

const postDelete = () => {
    const host = window.location.host
    const post = '/objects/eliminar'
    const postUrl = 'http://'+host+post;
    // console.log(JSON.stringify(array));
    // console.log(host);
    //<input type="hidden" name="_token" value="UNIQUETOKEN">
    let token = document.getElementsByName('_token')[0].defaultValue;
    // console.log(token)
    fetch(postUrl, {
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json, text-plain, */*",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": token
            },
        method: 'POST',
        credentials: "same-origin",
        body: JSON.stringify(array)
    })
    .then((resp) => {
        location.reload();
        // console.log(resp)
        //throw new Error('Request Faild! - throw');
    }, networkError => console.log(networkError.message+' - networkError'))
    .catch((error) => console.log(error+' - catch'));
}


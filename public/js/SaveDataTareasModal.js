
const saveBtn = document.getElementById('saveDataModal');

saveBtn.onclick = function() {
    const data = document.getElementsByClassName('showTareaData');
    const newData = [];
    let title, description, status, id;
    // console.log(data);
    // console.log(data[0].children[2].children[1].value);
    // console.log(data[0].children[3].children[1].value);
    // console.log(data[0].children[4].children[1].value);
    for (let i = 0; i < data.length; i++) {
        id = data[i].children[5].defaultValue
        title = data[i].children[2].children[1].value
        description = data[i].children[3].children[1].value
        status = data[i].children[4].children[1].value
        newData.push({
            id,
            title,          // es lo mismo que -> title: title (destructuring)
            description,
            status
        })
    }
    // console.log(newData);
    postSaveData(newData);
}

function postSaveData(data) {
    const host = window.location.host
    const post = '/objects/editar'
    const postUrl = 'http://'+host+post;
    // console.log(JSON.stringify(data));
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
        body: JSON.stringify(data)
    })
    .then((resp) => {
        location.reload();
        //console.log(resp)
        //throw new Error('Request Faild! - throw');
    }, networkError => console.log(networkError.message+' - networkError'))
    .catch((error) => console.log(error+' - catch'));
}

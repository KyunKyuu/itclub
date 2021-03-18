function SeePassword(params) {
    let password = params.idPassword;
    let button = params.idButton;
    let type= $(`#${password}`).attr('type')
    if(type == 'password'){
        $(`#${password}`).attr('type', 'text');
        $(`#${button}`).html('<i class="fas fa-eye"></i>')
    }else{
        $(`#${password}`).attr('type', 'password');
        $(`#${button}`).html('<i class="fas fa-eye-slash"></i>')
    }
}

function ConfirmPassword(params) {
    let password = $(`#${params.idPassword}`).val()
    let confirmPassword = $(`#${params.idConfirmPassword}`).val()

    if (password == confirmPassword) {
        return 1;
    }else{
        return 0;
    }
}

function Table(data) {
    $(data.table).DataTable().destroy();
    if(data.parm){
        $(data.table).DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: data.url,
                data:data.parm
            },
            columns: data.data,
        });
    }else{
        $(data.table).DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: data.url
            },
            columns: data.data,
        });
    }
}

function SweetAlert(data){
    let status, title
    if(data.status == 200){
        status = 'success'
        title = 'Success'
    }else{
        status = 'error'
        title = 'Failed!'
    }

    Swal.fire(title, data.message, status)
}

function RefreshTable(data) {
    table = $(`#${data}`).DataTable();
    table.ajax.reload()
}


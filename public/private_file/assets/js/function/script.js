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
    if (data.callbackButton) {
        if(data.parm){
            $(data.table).DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: data.url,
                    data:data.parm
                },
                language: {
                    "search": "Search Data:",
                    'searchPlaceholder' : 'Search'
                },
                columns: data.data,
                fnDrawCallback: function() {
                    $(`${data.callbackButton.id}`).bootstrapToggle({
                        size:data.callbackButton.size,
                        on:data.callbackButton.on,
                        onstyle:data.callbackButton.onstyle,
                        offstyle:data.callbackButton.offstyle,
                        off:data.callbackButton.off,
                    });
                },
            });
        }else{
            $(data.table).DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: data.url
                },
                 language: {
                    "search": "Search Data:",
                    'searchPlaceholder' : 'Search'
                },
                columns: data.data,
                fnDrawCallback: function() {
                    $(`${data.callbackButton.id}`).bootstrapToggle({
                        size:data.callbackButton.size,
                        on:data.callbackButton.on,
                        onstyle:data.callbackButton.onstyle,
                        offstyle:data.callbackButton.offstyle,
                        off:data.callbackButton.off,
                    });
                },
            });
        }
    } else {
        if(data.parm){
            $(data.table).DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: data.url,
                    data:data.parm
                },
                 language: {
                    "search": "Search Data:",
                    'searchPlaceholder' : 'Search'
                },
                columns: data.data,
                fnDrawCallback: function() {
                    $('.input-toggle').bootstrapToggle({
                        size:'small',
                        on:'<i class="fas fa-check"></i> Active',
                        onstyle : 'success',
                        off:'<i class="fas fa-times"></i> Inactive',
                        offstyle:'danger',
                    });
                },
            });
        }else{
            $(data.table).DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: data.url
                },
                 language: {
                    "search": "Search Data:",
                    'searchPlaceholder' : 'Search'
                },
                columns: data.data,
                fnDrawCallback: function() {
                    $('.input-toggle').bootstrapToggle({
                        size:'small',
                        on:'<i class="fas fa-check"></i> Active',
                        onstyle : 'success',
                        off:'<i class="fas fa-times"></i> Inactive',
                        offstyle:'danger',
                    });
                },
            });
        }
    }

    $("#table_filter input").removeClass('form-control-sm')
}

function SweetAlert(data){
    let status, title

    Swal.fire(data.status, data.message, data.status)
}

function RefreshTable(data) {
    table = $(`#${data}`).DataTable();
    table.ajax.reload()
}


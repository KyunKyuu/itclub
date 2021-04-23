$(document).ready(function () {
    let idLIST = ''
    const data = [
        {data:'check', name:'check', sortable:false,searchable:false, orderable:false},
        {data:'title', name:'title'},
        {data:'created_by', name:'created_by'},
        {data:'action', name:'action'},
    ];
    Table({table:'#table', data:data, url:'/api/v1/features/user_guide/get'});

    $('#modalUserGuides').on('click', function() {
        $('#userGuidesModal').modal('show')
        $('#userGuidesModal form').attr('id', 'insert')
        $('#userGuidesModalLabel').text('Insert title user guide')
    })

    $('#userGuidesModal').on('submit', '#insert', function(e) {
        e.preventDefault();
        SweetQuestions({
            title : 'Apakah anda yakin?',
            subtitle : 'Apakah anda ingin menambah data user guide?',
            buttonConfirm : 'Yes',
            buttonDeny: 'No',
            confirm : 'ajax',
            deny : {
                icon:'error',
                title : 'Gagal menambahkan'
            },
            ajax : {
                url:'/api/v1/features/user_guide/insert',
                data:new FormData(this),
                type:'POST',
                headers:{
                    'X-CSRF-TOKEN':csrftoken
                },
                contentType:false,
                processData:false,
                success:res=>{
                    SweetAlert(res);
                    $('#userGuidesModal').modal('hide')
                },
                error:err=>{
                    SweetAlert({status:'error', message:err.responseJSON.message});
                }
            }
        })
    })

    $('#table').on('click', '#listGuide', function() {
        idLIST = $(this).data('value')
        listGuide(idLIST)
    })

    $('#table').on('click', '#edit', function() {
        let id = $(this).data('value')
        $.ajax({
            url:'/api/v1/features/user_guide/get',
            data:{
                id:id
            },
            success:res=>{
                $('#userGuidesModal').modal('show')
                $('#userGuidesModal form').attr('id', 'update')
                $('#userGuidesModal form').attr('data-id', res.values.id)
                $('#userGuidesModal form input').val(res.values.title)
                $('#userGuidesModalLabel').text('Update title user guide')
            },
            error:err=>{
                console.log(err);
            }
        })
    })

    $('#userGuidesModal').on('submit', '#update', function(e) {
        e.preventDefault();
        let data = new FormData(this)
        data.append('id', $(this).data('id'))
        SweetQuestions({
            title : 'Apakah anda yakin?',
            subtitle : 'Apakah anda ingin mengubah user guides ini?',
            buttonConfirm : 'Yes',
            buttonDeny: 'No',
            confirm : 'ajax',
            deny : {
                icon:'error',
                title : 'Gagal menambahkan'
            },
            ajax : {
                url:'/api/v1/features/user_guide/update',
                type:'POST',
                headers:{
                    'X-CSRF-TOKEN':csrftoken
                },
                data:data,
                contentType:false,
                processData:false,
                success:res=>{
                    RefreshTable('table')
                    SweetAlert(res);
                    listGuide($(this).data('id'))
                },
                error:err=>{
                    SweetAlert({status:'error', message:err.responseJSON.message});
                }
            }
        })
    })

    $('#table').on('click', '#delete', function(e) {
        e.preventDefault();
        SweetQuestions({
            title : 'Apakah anda yakin?',
            subtitle : 'Apakah anda ingin menghapus user guides ini?',
            buttonConfirm : 'Yes',
            buttonDeny: 'No',
            confirm : 'ajax',
            deny : {
                icon:'error',
                title : 'Gagal menghapus'
            },
            ajax : {
                url:'/api/v1/features/user_guide/delete',
                type:'DELETE',
                headers:{
                    'X-CSRF-TOKEN':csrftoken
                },
                data:{id : $(this).data('value')},
                success:res=>{
                    RefreshTable('table')
                    SweetAlert(res);
                    listGuide($(this).data('id'))
                },
                error:err=>{
                    SweetAlert({status:'error', message:err.responseJSON.message});
                }
            }
        })
    })

    $('#btnAccordion').on('click', '#listGuides', function() {
        let id = $(this).data('id')
        $('#listGuidesModal').modal('show')
        $('#listGuidesModalLabel').text($(this).data('value'))
        $('#listGuidesModalLabel').attr('data-id', id)
        $('#listGuidesModal form').attr('id', 'insert')
    })

    $('#accordion').on('click', '#editListGuide', function() {
        let id = $(this).data('id')
        $.ajax({
            url:'/api/v1/features/user_guide/list',
            data:{
                id:id,
                parm:true,
            },
            success:res=>{
                $('#listGuidesModal').modal('show')
                $('#listGuidesModalLabel').text($(this).data('value'))
                $('#listGuidesModalLabel').attr('data-id', id)
                $('#listGuidesModal form').attr('id', 'update')
                console.log(res.values.description);
                $('#listGuidesModal form input[name="description"]').val(res.values.description)
                $('#listGuidesModal form input[id="descCKE"]').val(res.values.description)
            },
            error:err=>{
                SweetAlert({status:'error', message:err.responseJSON.message});
            }
        })

    })

    $('#accordion').on('click', '#hapusListGuide', function() {
        let id = $(this).data('id')
        SweetQuestions({
            title : 'Apakah anda yakin?',
            subtitle : 'Apakah anda ingin menghapus list guides ini?',
            buttonConfirm : 'Yes',
            buttonDeny: 'No',
            confirm : 'ajax',
            deny : {
                icon:'error',
                title : 'Gagal menghapus'
            },
            ajax : {
                url:'/api/v1/features/user_guide/list/delete',
                type:'DELETE',
                headers:{
                    'X-CSRF-TOKEN':csrftoken
                },
                data:{
                    id:id
                },
                success:res=>{
                    SweetAlert(res);
                    listGuide(idLIST)
                },
                error:err=>{
                    SweetAlert({status:'error', message:err.responseJSON.message});
                }
            }
        })

    })

    $('#listGuidesModal').on('submit', '#insert', function(e) {
        e.preventDefault()
        let data = new FormData(this)
        data.append('guide_id', $('#listGuidesModalLabel').data('id'))
        SweetQuestions({
            title : 'Apakah anda yakin?',
            subtitle : 'Apakah anda ingin menambah list guides ini?',
            buttonConfirm : 'Yes',
            buttonDeny: 'No',
            confirm : 'ajax',
            deny : {
                icon:'error',
                title : 'Gagal menambahkan'
            },
            ajax : {
                url:'/api/v1/features/user_guide/list/insert',
                type:'POST',
                headers:{
                    'X-CSRF-TOKEN':csrftoken
                },
                data:data,
                contentType:false,
                processData:false,
                success:res=>{
                    SweetAlert(res);
                    listGuide(res.values)
                },
                error:err=>{
                    SweetAlert({status:'error', message:err.responseJSON.message});
                }
            }
        })
    })

    $('#listGuidesModal').on('submit', '#update', function(e) {
        e.preventDefault()
        let data = new FormData(this)
        data.append('guide_id', $('#listGuidesModalLabel').data('id'))
        SweetQuestions({
            title : 'Apakah anda yakin?',
            subtitle : 'Apakah anda ingin mengubah list guides ini?',
            buttonConfirm : 'Yes',
            buttonDeny: 'No',
            confirm : 'ajax',
            deny : {
                icon:'error',
                title : 'Gagal menambahkan'
            },
            ajax : {
                url:'/api/v1/features/user_guide/list/update',
                type:'POST',
                headers:{
                    'X-CSRF-TOKEN':csrftoken
                },
                data:data,
                contentType:false,
                processData:false,
                success:res=>{
                    SweetAlert(res);
                    listGuide(idLIST)
                },
                error:err=>{
                    SweetAlert({status:'error', message:err.responseJSON.message});
                }
            }
        })
    })
})

function listGuide(id) {
    $.ajax({
        url:'/api/v1/features/user_guide/list',
        data:{
            id:id,
        },
        success:res=>{
            let response = res.values.data
            let value = res.values.data2
            let html = ''
            let id = 1
            response.forEach(data=>{
                html += `<div class="accordion">
                        <div class="accordion-header collapsed row" role="button" data-toggle="collapse"
                            data-target="#panel-body-${data.id}" aria-expanded="false">
                            <h4>Step ${id++}</h4>
                            <div class="ml-auto">
                                <a href="#" class="text-warning" id="editListGuide" data-id="${data.id}"><i class="fas fa-edit"></i>Edit</a>
                                <a href="#" class="text-danger" id="hapusListGuide" data-id="${data.id}"><i class="far fa-trash-alt"></i>Hapus</a>
                            </div>
                        </div>
                        <div class="accordion-body collapse" id="panel-body-${data.id}" data-parent="#accordion" style="">
                            <img src="/storage/${data.thumbnail}" class="img-fluid ${data.thumbnail == null ? 'd-none' :' '}"">
                            <p class="mb-0">${data.description}</p>
                        </div>
                    </div>`
            })

            let header = `<h6 class="row mx-1" id="titleGuide">${value.title}</h6>`
            let btn = `<a href="#" class="badge badge-primary rounded" data-value="${value.title}" data-id="${value.id}" id="listGuides"><i class="fas fa-plus"></i></a>`

            $('#accordion').html(html)
            $('#headerAccordion').html(header)
            $('#btnAccordion').html(btn)
        }
    })
}

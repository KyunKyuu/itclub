$(document).ready(function() {
    const data = [
        {data:'check', name:'check', orderable:false, searchable:false},
        {data:'name', name:'name'},
        {data:'division_id', name:'division_id'},
        {data:'value', name:'value'},
        {data:'deskripsi', name:'deskripsi'},
        {data:'action', name:'action'},
    ]

    Table({table:'#table', data:data, url:'/api/v1/member/precentages/test'})

    $('#btnInsert').on('click', function(){
        $('#insertTest').modal('show')
        $('#insertTest form').attr('id','insert')
    })

    $('#insertTest').on('submit', '#insert', function(e) {
        e.preventDefault();
        let data = new FormData(this)
        SweetQuestions({
            title : 'Apakah anda yakin?',
            subtitle : 'Apakah anda ingin menambahkan test ini?',
            buttonConfirm : 'Yes',
            buttonDeny: 'No',
            confirm : 'ajax',
            deny : {
                icon:'error',
                title : 'Gagal menambah test'
            },
            ajax : {
                url:'/api/v1/member/precentages/test/insert',
                type:'post',
                headers:{
                    'X-CSRF-TOKEN':csrftoken
                },
                contentType:false,
                processData:false,
                data:data,
                success:res=>{
                    SweetAlert(res)
                    RefreshTable('table')
                    value_checkbox = []
                },
                error:res=>{
                    SweetAlert(res.responseJSON)
                }
            }
        })
    })


    $('#table').on('click', '#edit', function() {
        idVal = $(this).data('value')
        $.ajax({
            url:'/api/v1/member/precentages/test',
            data:{
                id : idVal
            },
            success:res=>{
                $('#insertTest').modal('show')
                $('#insertTest form').attr('id', 'update')
                $(`#insertTest select[name="division_id"] option[value="${res.values.division_id}"]`).attr('selected', true);
                $(`#insertTest input[name="name"]`).val(res.values.name)
                $(`#insertTest input[name="value"]`).val(res.values.value)
                $(`#insertTest textarea[name="deskripsi"]`).val(res.values.deskripsi)
            },
            error:err=>{
                SweetAlert({status:'error', message:err.responseJSON.message})
            }
        })
    })



    $('#insertTest').on('submit', '#update', function(e) {
        e.preventDefault();
        let data = new FormData(this)
        data.append('id', idVal)
        SweetQuestions({
            title : 'Apakah anda yakin?',
            subtitle : 'Apakah anda ingin mengubah data test member?',
            buttonConfirm : 'Yes',
            buttonDeny: 'No',
            confirm : 'ajax',
            deny : {
                icon:'error',
                title : 'Gagal mengubah test'
            },
            ajax : {
                url:'/api/v1/member/precentages/test/update',
                type:'post',
                headers:{
                    'X-CSRF-TOKEN':csrftoken
                },
                contentType:false,
                processData:false,
                data:data,
                success:res=>{
                    SweetAlert(res)
                    RefreshTable('table')
                    value_checkbox = []
                },
                error:res=>{
                    SweetAlert(res.responseJSON)
                }
            }
        })
    })


    $('#deleteData').on('click', function (e) {
        e.preventDefault();
        if (value_checkbox.length < 1) {
            Swal.fire('Perhatian', 'Pilih salah satu!','warning')
            return 0;
        }
        SweetQuestions({
            title : 'Apakah anda yakin?',
            subtitle : 'Apakah anda ingin menghapus test ini?',
            buttonConfirm : 'Yes',
            buttonDeny: 'No',
            confirm : 'ajax',
            deny : {
                icon:'error',
                title : 'Gagal menghapus test'
            },
            ajax : {
                url:'/api/v1/member/precentages/test/delete',
                data:{
                    value : value_checkbox
                },
                type:'DELETE',
                headers:{
                    'X-CSRF-TOKEN' : csrftoken
                },
                success:res=>{
                    SweetAlert(res)
                    RefreshTable('table')
                    value_checkbox = []
                },
                error:err=>{
                    SweetAlert({status:'error', message:err.responseJSON.message})
                }
            }
        })
    })


    $('#table').on('click', '#delete', function (e) {
        e.preventDefault();
        let value = $(this).data('value')
        SweetQuestions({
            title : 'Apakah anda yakin?',
            subtitle : 'Apakah anda ingin menghapus test ini?',
            buttonConfirm : 'Yes',
            buttonDeny: 'No',
            confirm : 'ajax',
            deny : {
                icon:'error',
                title : 'Gagal menghapus test'
            },
            ajax : {
                url:'/api/v1/member/precentages/test/delete',
                data:{
                    value : value
                },
                type:'DELETE',
                headers:{
                    'X-CSRF-TOKEN' : csrftoken
                },
                success:res=>{
                    SweetAlert(res)
                    RefreshTable('table')
                    value_checkbox = []
                },
                error:err=>{
                    SweetAlert({status:'error', message:err.responseJSON.message})
                }
            }
        })
    })

    $('button[data-dismiss="modal"]').on('click', function() {
        $('#insertSchedule form').attr('id', ' ')
    })


})

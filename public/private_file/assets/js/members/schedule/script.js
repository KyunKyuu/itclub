$(document).ready(function() {
    const data = [
        {data:'check', name:'check', orderable:false},
        {data:'division', name:'division'},
        {data:'date', name:'date'},
        {data:'come_in', name:'come_in'},
        {data:'come_out', name:'come_out'},
        {data:'desc', name:'desc'},
        {data:'btn', name:'btn'},
    ]

    Table({table:'table', data:data, url:'/api/v1/member/schedule/get'})

    $('#TambahData').on('click', function() {
        $('#insertSchedule').modal('show')
        $('#insertSchedule form').attr('id', 'insert')
    })

    $('#insertSchedule').on('submit', '#insert', function(e) {
        e.preventDefault();
        SweetQuestions({
            title : 'Apakah anda yakin?',
            subtitle : 'Apakah anda ingin menambah data jadwal member?',
            buttonConfirm : 'Yes',
            buttonDeny: 'No',
            confirm : 'ajax',
            deny : {
                icon:'error',
                title : 'Gagal menambah jadwal'
            },
            ajax : {
                url:'/api/v1/member/schedule/insert',
                type:'post',
                headers:{
                    'X-CSRF-TOKEN':csrftoken
                },
                contentType:false,
                processData:false,
                data:new FormData(this),
                success:res=>{
                    SweetAlert(res)
                    RefreshTable('table')
                    value_checkbox = []
                },
                error:res=>{
                    SweetAlert(res.responseJSON)
                    value_checkbox = []
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
        console.log(value_checkbox);
        SweetQuestions({
            title : 'Apakah anda yakin?',
            subtitle : 'Apakah anda ingin menghapus jadwal ini?',
            buttonConfirm : 'Yes',
            buttonDeny: 'No',
            confirm : 'ajax',
            deny : {
                icon:'error',
                title : 'Gagal menghapus jadwal'
            },
            ajax : {
                url:'/api/v1/member/schedule/delete',
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
        let data = $(this).data('value')
        SweetQuestions({
            title : 'Apakah anda yakin?',
            subtitle : 'Apakah anda ingin menghapus jadwal ini?',
            buttonConfirm : 'Yes',
            buttonDeny: 'No',
            confirm : 'ajax',
            deny : {
                icon:'error',
                title : 'Gagal menghapus jadwal'
            },
            ajax : {
                url:'/api/v1/member/schedule/delete',
                data:{
                    value : data
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
})

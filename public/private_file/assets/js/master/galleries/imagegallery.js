$(document).ready(function() {
    const data = [
        {data:'check', name:'check', orderable:false, searchable:false},
        {data:'gallery_id', name:'gallery_id'},
        {data:'images', name:'images'},
        {data:'btn', name:'btn', searchable:false, orderable:false},
    ];

    Table({table:'#table', data:data, url:'/api/v1/imageGallery/get'});

    $('#insert').on('submit', function(e) {
        e.preventDefault()
        $.ajax({
            url:'/api/v1/imageGallery/insert',
            data:new FormData(this),
            processData:false,
            contentType:false,
            type:'POST',
            headers:{
                'X-CSRF-TOKEN':csrftoken
            },
            success:res=>{
                RefreshTable('table');
                SweetAlert(res);
            },
            error:err=>console.log(err)
        })
    })

      $('#table').on('click', '#delete', function(e) {
       e.preventDefault();
        let value = $(this).data('value')
        SweetQuestions({
            title : 'Apakah anda yakin?',
            subtitle : 'Apakah anda ingin menghapus data image gallery ini?',
            buttonConfirm : 'Yes',
            buttonDeny: 'No',
            confirm : 'ajax',
            deny : {
                icon:'error',
                title : 'Gagal menghapus'
            },
            ajax : {
                url:'/api/v1/imageGallery/delete',
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
                    value_checkbox = []
                }
            }
        })
    })

    $('#deleteArray').on('click', function (e) {
        if (value_checkbox.length < 1) {
            Swal.fire('Perhatian!', 'Pilih salah satu', 'warning')
            return 0;
        }
        SweetQuestions({
            title : 'Apakah anda yakin?',
            subtitle : 'Apakah anda ingin menghapus data image gallery ini?',
            buttonConfirm : 'Yes',
            buttonDeny: 'No',
            confirm : 'ajax',
            deny : {
                icon:'error',
                title : 'Gagal menghapus'
            },
            ajax : {
                url:'/api/v1/imageGallery/delete',
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
                    value_checkbox = []
                }
            }
        })
    })   


})

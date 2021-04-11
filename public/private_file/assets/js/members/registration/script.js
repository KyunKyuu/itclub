$(document).ready(function() {
    const data = [
        {data:'check', name:'check'},
        {data:'name', name:'name'},
        {data:'type', name:'type'},
        {data:'image', name:'image'},
        {data:'status', name:'status'},
        {data:'btn', name:'btn'},
    ];
    let idUser = 0

    Table({table:'table', data:data, url : '/api/v1/member/registration/get'})

    $('#table').on('click', '#Access', function() {
        let id = $(this).data('value')
        $.ajax({
            url:'/api/v1/member/registration/get',
            data:{
                id:id
            },
            success:res=>{
                let response = res.data
                $('.col-4').removeClass('d-none')
                $('#name').text(response.data.name);
                $('#image').attr('src' ,'/storage/'+response.data.image);
                $('#division').text(response.division.name);
                $('#type').text(response.data.type);
                if (response.data.class != null) {
                    $('#class').text(response.data.class + ' ' + response.data.majors);
                }
                idUser = response.data.id
            },
            error:err=>{
                SweetAlert(err.responseJSON)
            }
        })
    })

    $('#close').on('click', function() {
        $('.col-4').addClass('d-none')
        idUser = ' '
        value_checkbox = []
    })

    $('#Accept').on('click', function() {
        SweetQuestions({
            title : 'Apakah anda yakin?',
            subtitle : 'Apakah anda ingin menerima member?',
            buttonConfirm : 'Yes',
            buttonDeny: 'No',
            confirm : 'ajax',
            deny : {
                icon:'error',
                title : 'Gagal request'
            },
            ajax : {
                url:'/api/v1/member/registration/accept',
                data:{
                    id : idUser
                },
                type:'POST',
                headers:{
                    'X-CSRF-TOKEN' : csrftoken
                },
                success:res=>{
                    SweetAlert(res)
                    RefreshTable('table')

                },
                error:err=>{
                    SweetAlert({status:'error', message:err.responseJSON.message})
                }
            }
        })
    })

    $('#Reject').on('click', function() {
        SweetQuestions({
            title : 'Apakah anda yakin?',
            subtitle : 'Apakah anda ingin menolak member?',
            buttonConfirm : 'Yes',
            buttonDeny: 'No',
            confirm : 'ajax',
            deny : {
                icon:'error',
                title : 'Gagal request'
            },
            ajax : {
                url:'/api/v1/member/registration/reject',
                data:{
                    id : idUser
                },
                type:'POST',
                headers:{
                    'X-CSRF-TOKEN' : csrftoken
                },
                success:res=>{
                    SweetAlert(res)
                    RefreshTable('table')

                },
                error:err=>{
                    SweetAlert({status:'error', message:err.responseJSON.message})
                }
            }
        })
    })
})

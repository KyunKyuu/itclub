$(document).ready(function() {
    const data = [
        {data:'check', name:'check'},
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
                    value_checkbox = []
                },
                error:res=>{
                    SweetAlert(res.responseJSON)
                    value_checkbox = []
                }
            }
        })
    })
})

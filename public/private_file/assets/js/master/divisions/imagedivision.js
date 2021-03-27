$(document).ready(function() {
    const data = [
        {data:'check', name:'check', orderable:false, searchable:false},
        {data:'division', name:'division'},
        {data:'imageLearning', name:'imageLearning'},
        {data:'btn', name:'btn', searchable:false, orderable:false},
    ];

    Table({table:'#table', data:data, url:'/api/v1/imageDivision/get'});

    $('#insert').on('submit', function(e) {
        e.preventDefault()
        $.ajax({
            url:'/api/v1/imageDivision/insert',
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
        e.preventDefault()
        let id = $(this).data('value')
        $.ajax({
            url:'/api/v1/imageDivision/delete',
            data:{
                id:id
            },
            type:'DELETE',
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

    

})

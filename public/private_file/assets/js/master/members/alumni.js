$(document).ready(function() {
    const data = [
        {data:'check', name:'check', orderable:false, searchable:false},
        {data:'member_name', name:'member_name'},
        {data:'work', name:'work'},
        {data:'study',name:'study'},
        {data:'place',name:'place'},
        {data:'imageAlumni', name:'imageAlumni'},
        {data:'created_at', name:'created_at', searchable:false, orderable:false},
        {data:'updated_at', name:'updated_at', searchable:false, orderable:false},
        {data:'btn', name:'btn', searchable:false, orderable:false},
    ];

    Table({table:'#table', data:data, url:'/api/v1/alumni/get'});

    $('#insert').on('submit', function(e) {
        e.preventDefault()
        $.ajax({
            url:'/api/v1/alumni/insert',
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
            url:'/api/v1/alumni/delete',
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

    $('#update').on('submit', function(e) {
        e.preventDefault();
        let value = new FormData(this)
        value.append('id', $('#updateAlumni input[name="place"]').data('id'));
        $.ajax({
            url:'/api/v1/alumni/update',
            data:value,
            type:'POST',
            contentType:false,
            processData:false,
            headers:{
                'X-CSRF-TOKEN' : csrftoken
            },
            success:res=>{
                SweetAlert(res)
                RefreshTable('table')
            },
            error:err=>console.log(err)
        })
    })

    $('#table').on('click', '#edit', function(e) {
        e.preventDefault();
        let id = $(this).data('value')
        $.ajax({
            url:'/api/v1/alumni/get',
            data:{
                id:id
            },
            success:res=>{
                $('#updateAlumni').modal('show');
                $('#updateAlumni input[name="name_alumni"]').val(res.name_alumni);
                $('#updateAlumni input[name="member_id"]').val(res.data.member_id);
                $('#updateAlumni input[name="work"]').val(res.data.work);
                $('#updateAlumni input[name="study"]').val(res.data.study);
                $('#updateAlumni input[name="place"]').val(res.data.place);
                $('#updateAlumni input[name="place"]').data('id',res.data.id);
            },
            error:err=>console.log(err)
        })
    })
})

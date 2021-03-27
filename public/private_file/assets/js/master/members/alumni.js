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
        value.append('id', $('#updateAlumni input[name="name"]').data('id'));
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
                $('#updateMember').modal('show');
                $('#updateMember select[name="user_id"] option[value="'+res.data.user_id+'"]').attr('selected', true);
                $('#updateMember select[name="division_id"] option[value="'+res.data.division_id+'"]').attr('selected', true);
                $('#updateMember input[name="name"]').val(res.data.name);
                $('#updateMember input[name="position"]').val(res.data.position);
                $('#updateMember select[name="class"] option[value="'+res.data.class+'"]').attr('selected', true);
                $('#updateMember select[name="majors"] option[value="'+res.data.majors+'"]').attr('selected', true);
                $('#updateMember input[name="entry_year"]').val(res.data.entry_year);
                $('#updateMember input[name="image"]').val(res.data.image);
                $('#updateMember input[name="name"]').data('id',res.data.id);
            },
            error:err=>console.log(err)
        })
    })
})

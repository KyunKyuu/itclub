$(document).ready(function() {
    const data = [
        {data:'check', name:'check', orderable:false, searchable:false},
        {data:'name', name:'name'},
        {data:'user_id', name:'user_id'},
        {data:'division_id', name:'division_id',},
        {data:'class_majors', name:'class_majors'},
        {data:'position', name:'position'},
        {data:'entry_year', name:'entry_year'},
        {data:'imageMember', name:'imageMember'},
        {data:'created_at', name:'created_at', searchable:false, orderable:false},
        {data:'status', name:'status'},
        {data:'btn', name:'btn', searchable:false, orderable:false},
    ];

    Table({table:'#table', data:data, url:'/api/v1/member/get'});

    $('#insert').on('submit', function(e) {
        e.preventDefault()
        $.ajax({
            url:'/api/v1/member/insert',
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
            url:'/api/v1/member/delete',
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
        value.append('id', $('#updateMember input[name="name"]').data('id'));
        $.ajax({
            url:'/api/v1/member/update',
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
            url:'/api/v1/member/get',
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
                $('#updateMember img').attr('src', '/storage/' +res.data.image);
                $('#updateMember input[name="name"]').data('id',res.data.id);
            },
            error:err=>console.log(err)
        })
    })
})

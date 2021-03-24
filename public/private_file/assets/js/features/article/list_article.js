$(document).ready(function() {
    const data = [
        {data:'check', name:'check'},
        {data:'title', name:'title'},
        {data:'category', name:'category'},
        {data:'author', name:'author'},
        {data:'created_at', name:'created_at'},
        {data:'status', name:'status'},
    ];

    Table({table:'#table', data:data, url:'/api/v1/features/article/get'});

    $('#category').select2()

    $('#insert').on('submit', function(e) {
        e.preventDefault()
        $.ajax({
            url:'/api/v1/features/article/insert',
            type:'POST',
            headers:{
                'X-CSRF-TOKEN':csrftoken
            },
            data:new FormData(this),
            processData:false,
            contentType:false,
            success:res=>{
                RefreshTable('table');
                SweetAlert(res)
            },
            error:err=>{
                SweetAlert({message:err.responseJSON.message, status:err.status == 500 ? 'error' :'warning'})
            }
        })
    })

    $('#table').on('click', '#Edit', function(e) {
        e.preventDefault()
        let id = $(this).data('id')
        $.ajax({
            url:'/api/v1/features/article/get_first',
            data:{
                id:id
            },
            success:res=>{
                let category = []
                res.data.category.forEach(value=>{
                    category.push(value.category_id);
                })
                $('#updateArticle').modal('show')
                $('#updateArticle textarea[name="title"]').val(res.data.article.title)
                $('#updateArticle textarea[name="title"]').attr('data-id',res.data.article.id)
                $('#updateArticle img').attr('src', '/private_file/user/image-article/' +res.data.article.thumbnail)
                $('#updateArticle select[name="category[]"]').val(category)
                $('#updateArticle select[name="category[]"]').select2()
            },
            error:err=>{
                SweetAlert(err.responseJSON)
            }
        })
    })

    $('#updateArticle select[name="category[]"').on("select2:unselect", function (e) {
        let id = $('#updateArticle textarea[name="title"]').data('id')
        let category_id = e.params.data.id
        $.ajax({
            url: '/api/v1/features/article/category',
            data:{
                blog_id:id,
                category_id:category_id,
                type:'unselect'
            },
            type:'POST',
            headers:{
                'X-CSRF-TOKEN' : csrftoken
            },
            success:res=>{
                RefreshTable('table');
            },
            error:err=>console.log(err.responseJSON)
        })
    });

    $('#updateArticle select[name="category[]"').on("select2:select", function (e) {
        let id = $('#updateArticle textarea[name="title"]').data('id')
        let category_id = e.params.data.id
        $.ajax({
            url: '/api/v1/features/article/category',
            data:{
                blog_id:id,
                category_id:category_id,
                type:'select'
            },
            type:'POST',
            headers:{
                'X-CSRF-TOKEN' : csrftoken
            },
            success:res=>{
                RefreshTable('table');
            },
            error:err=>console.log(err.responseJSON)
        })
    });

    $('#update').on('submit', function(e) {
        e.preventDefault()
        let data = new FormData(this)
        data.append('id', $('#updateArticle textarea[name="title"]').data('id'));
        $.ajax({
            url:'/api/v1/features/article/update',
            data:data,
            processData:false,
            contentType:false,
            headers:{
                'X-CSRF-TOKEN' : csrftoken
            },
            type:'POST',
            success:res=>{
                RefreshTable('table')
                SweetAlert(res)
            },
            error:err=>console.log(res.responseJSON)
        })
    })

})

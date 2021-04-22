$(document).ready(function () {
    const data = [
        {data:'check', name:'check', sortable:false,searchable:false, orderable:false},
        {data:'title', name:'title'},
        {data:'created_by', name:'created_by'},
        {data:'action', name:'action'},
    ];
    Table({table:'#table', data:data, url:'/api/v1/features/user_guide/get'});

    $('#modalUserGuides').on('click', function() {
        $('#userGuidesModal').modal('show')
        $('#userGuidesModal form').attr('id', 'insert')
        $('#userGuidesModalLabel').text('Insert title user guide')
    })

    $('#userGuidesModal').on('submit', '#insert', function(e) {
        e.preventDefault();
        $.ajax({
            url:'/api/v1/features/user_guide/insert',
            data:new FormData(this),
            type:'POST',
            headers:{
                'X-CSRF-TOKEN':csrftoken
            },
            contentType:false,
            processData:false,
            success:res=>{
                SweetAlert(res);
                $('#userGuidesModal').modal('hide')
            },
            error:err=>{
                SweetAlert({status:'error', message:err.responseJSON.message});
            }
        })
    })

    $('#table').on('click', '#listGuide', function() {
        let id = $(this).data('value')
        $.ajax({
            url:'/api/v1/features/user_guide/list',
            data:{
                id:id,
            },
            success:res=>{
                let response = res.values.data
                let value = res.values.data2
                let html = ''
                let id = 1
                response.forEach(data=>{
                    html += `<div class="accordion">
                            <div class="accordion-header collapsed" role="button" data-toggle="collapse"
                                data-target="#panel-body-${data.id}" aria-expanded="false">
                                <h4>Step ${id++}</h4>
                            </div>
                            <div class="accordion-body collapse" id="panel-body-${data.id}" data-parent="#accordion" style="">
                                <img src="/storage/images/article/user1-202104112233-0.png" class="img-fluid">
                                <p class="mb-0">${data.description}</p>
                            </div>
                        </div>`
                })

                let header = `<h6 class="row mx-1" id="titleGuide">${value.title}</h6>`
                let btn = `<a href="#" class="badge badge-primary rounded" data-value="${value.title}" data-id="${value.id}" id="listGuides"><i class="fas fa-plus"></i></a>`

                $('#accordion').html(html)
                $('#headerAccordion').html(header)
                $('#btnAccordion').html(btn)
            }
        })
    })

    $('#btnAccordion').on('click', '#listGuides', function() {
        let id = $(this).data('id')
        $('#listGuidesModal').modal('show')
        $('#listGuidesModalLabel').text($(this).data('value'))
        $('#listGuidesModalLabel').attr('data-id', id)
        $('#listGuidesModal form').attr('id', 'insert')
    })

    $('#listGuidesModal').on('submit', '#insert', function(e) {
        e.preventDefault()
        let data = new FormData(this)
        data.append('id', $('#listGuidesModalLabel').data('id'))
        $.ajax({
            url:'/api/v1/features/user_guide/list/insert',
            type:'POST',
            headers:{
                'X-CSRF-TOKEN':csrftoken
            },
            data:data,
            contentType:false,
            processData:false,
            success:res=>{
                SweetAlert(res);
            },
            error:err=>{
                SweetAlert({status:'error', message:err.responseJSON.message});
            }

        })
    })
})

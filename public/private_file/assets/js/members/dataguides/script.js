$(document).ready(function() {

    const id = $('#Step').data('id')
    $.ajax({
        url:'/api/v1/features/user_guide/list',
        data:{
            id:id
        },
        success:res=>{
            response = res.values.data
            let html = ''
            let id = 1

            response.forEach(item=>{
                html += `<div class="media-icon mt-3"><i class="far fa-circle"></i></div>
                            <div class="media-body">
                                <h6>Step ${id}</h6>
                                <p>${item.description}</p>
                                <img src="/storage/${item.thumbnail}"  class="img-fluid ${(item.thumbnail == null || item.thumbnail == ' ' ? 'd-none' : ' ')}"/>
                            </div>`;
                id++;
            })

            $('#detail').html(html)
        },
        error:err=>{
            SweetAlert({status:'error', message:err.responsesJSON.message});
        }
    })

})

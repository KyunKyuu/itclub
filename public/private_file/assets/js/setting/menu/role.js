$(document).ready(function() {
    role()

    $('#dataRole').on('click', '.nav-link', function() {
        $('#dataRole .nav-link').removeClass('active')
        $(this).addClass('active', true)
    })
})

function role() {
    $.ajax({
        url:'/api/v1/role/all',
        success:res=>{
            let html =' '
            res.data.forEach(response=>{
                console.log(response);
                html += `<li class="nav-item"><a href="#" class="nav-link" data-value="${response.id}">${response.name}</a></li>`;
            })

            $('#dataRole').html(html)
        }
    });
}

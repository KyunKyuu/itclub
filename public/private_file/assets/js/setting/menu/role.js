$(document).ready(function() {
    role()

    $('#dataRole').on('click', '.nav-link', function() {
        $('#dataRole .nav-link').removeClass('active')
        $(this).addClass('active', true)
    })

    $('.btn-group a.btn').on('click', function() {
        let data = $(this).text()
        $('.btn-group a.btn').removeClass('btn-primary');
        $('.btn-group a.btn').addClass('btn-outline-primary')
        $(this).removeClass('btn-outline-primary')
        $(this).addClass('btn-primary')
        createTable(data)
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

function createTable(param) {
    let table = `
    <table class="table table-striped" id="table">
        <thead>
            <tr>
                <th width="10px">
                    ID
                </th>
                <th class="text-capitalize">${param}</th>
                <th class="text-capitalize">access</th>
                <th class="text-capitalize">action</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
    `;
    $('#formTable').html(table);
    Table({table:'#table', data:data, url:'/api/v1/get/access/'+param})
}

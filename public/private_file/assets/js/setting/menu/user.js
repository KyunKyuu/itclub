$(document).ready(function() {

    const data = [
        {data:'DT_RowIndex', name:'DT_RowIndex', orderable:false, searchable:false},
        {data:'name', name:'name', className:'text-capitalize'},
        {data:'access', name:'access', orderable:false},
    ];
    Table({data:data, table:'#dataUsers', url:'/api/v1/access/get/users'})

    $('#dataUsers').on('click', '.btn', function() {
        $('#dataUsers .btn').removeClass('btn-primary');
        $('#dataUsers .btn').addClass('btn-outline-primary');
        $(this).removeClass('btn-outline-primary')
        $(this).addClass('btn-primary')
    })

})

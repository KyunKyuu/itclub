$(document).ready(function() {
    const data = [
        {data:'error_code', name:'error_code'},
        {data:'title', name:'title'},
        {data:'btn', name:'btn'},
    ];
    Table({table:'#dataPage', data:data, url:'/api/v1/error/get/page'});
})

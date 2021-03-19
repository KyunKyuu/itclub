$(document).ready(function() {
    const data = [
        {data:'check', name:'check', orderable:false, searchable:false},
        {data:'name', name:'name'},
        {data:'role_id', name:'role_id', },
        {data:'email', name:'email', searchable:false, orderable:false},
        {data:'email_verified_at', name:'email_verified_at'},
        {data:'status', name:'status', orderable:false},
        {data:'btn', name:'btn', searchable:false, orderable:false},
    ];

    Table({table:'#table', data:data, url:'/api/v1/user/get'});
})

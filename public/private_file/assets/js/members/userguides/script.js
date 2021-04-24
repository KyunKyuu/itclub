$(document).ready(function() {
    const data = [
        {data:'th', name:'th', sortable:false,orderable:false,searchable:false, className:'text-center'},
        {data:'title', name:'title'},
        {data:'created_by', name:'created_by'},
        {data:'created_at', name:'created_at'},
        {data:'onlySee', name:'onlySee'},
    ];

    Table({table:'#table', url:'/api/v1/features/user_guide/get', data:data});
})

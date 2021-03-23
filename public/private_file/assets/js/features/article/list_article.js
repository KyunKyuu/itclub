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
})

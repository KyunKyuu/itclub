$(document).ready(function() {
    const data = [
        {name:'code_activity', data:'code_activity'},
        {name:'user_id', data:'user_id'},
        {name:'url_access', data:'url_access'},
        {name:'status', data:'status'},
        {name:'browser', data:'browser'},
        {name:'created_at', data:'created_at'},
    ];

    Table({table:'table', url:'/api/v1/member/get/activity', data:data})
})

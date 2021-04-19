const data = [
    {name:'DT_RowIndex', data:'DT_RowIndex', orderable:false, searchable:false},
    {name:'name', data:'name'},
    {name:'btn', data:'btn'},
];

const dataScore = [
    {name:'DT_RowIndex', data:'DT_RowIndex', orderable:false, searchable:false, className:'text-center'},
    {name:'name', data:'name', className:'text-center'},
    {name:'score', data:'score', className:'text-center'},
    {name:'action', data:'action', className:'text-center'},
];
$(document).ready(function() {

    Table({table:'#table', data:data, url:'/api/v1/member/get', parm:{parm:'null'}})

    $('#table').on('click', '#edit', function () {
        let id = $(this).data('id')
        let value = $(this).data('value')
        Table({table:'#score', data:dataScore, url:'/api/v1/member/precentages/score', parm:{id:id, value:value}})
    })

    $('#score').on('click', '.Edit', function() {
        let id = $(this).data('value')
        $(this).addClass('disabled')
        $(`#save-${id}`).removeClass('disabled')
        $(`#input-${id}`).show()
        $(`#nilai-${id}`).hide()
    })

    $('#score').on('click', '.Save', function() {
        let id = $(this).data('value')
        $(this).addClass('disabled')
        $(`#edit-${id}`).removeClass('disabled')
        $(`#input-${id}`).hide()
        $(`#nilai-${id}`).show()
    })
})

function division(params) {
    $('#selected').text(params.text)
    let id = $(params).data('value')
    console.log(id);
    Table({table:'#table', data:data, url:'/api/v1/member/get', parm:{parm:id}})
}

$(document).ready(function() {
    $('#table').DataTable({
        "dom": '<"toolbar">frtip',
        "language": {
            "search": "Filter records:",
            'searchPlaceholder' : 'Search'
          }

    })

    $("#table_filter input").removeClass('form-control-sm')
})

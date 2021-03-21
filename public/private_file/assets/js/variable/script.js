const csrftoken = $('meta[name="csrf-token"]').data('token')

$(document).ready(function() {
    ClassicEditor
    .create( document.querySelector( '.use-ckeditor' ), {
    } )
    .catch( error => {
        console.log( error );
    } );
})

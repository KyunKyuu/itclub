$(document).ready(function(){
    let idWizard = 'wizard-form-1'

    $('.wizard-step').on('click', function() {
        $('.wizard-step').removeClass('wizard-step-active');
        $(this).addClass('wizard-step-active');
        idWizard = $(this).data('id')

        $('.wizard-pane').hide()
        $(`#${idWizard}`).show()
    })

    $('.wizard-next').on('click', function() {
        console.log(idWizard);
    })

})

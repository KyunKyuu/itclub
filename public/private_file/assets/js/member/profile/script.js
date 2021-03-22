$(document).ready(function() {
    const ID = $('#IDCARD').data('id')
    profile(ID)

    $('#advancedProfile').on('click', function() {
            $('#social-media').removeClass('d-none');
    })
    $('#advancedProfile').on('dblclick', function() {
            $('#social-media').addClass('d-none');
    })

    $('#insert-profile').on('submit', function(e) {
        e.preventDefault()
        let data = new FormData(this)
        $.ajax({
            url:'/api/v1/member/insert/profile',
            data:data,
            type:'POST',
            headers:{
                'X-CSRF-TOKEN':csrftoken
            },
            processData:false,
            contentType:false,
            success:res=>{
                console.log(res);
            },
            error:err=>console.log(err)
        })
    })

})

function profile(name) {
    $.ajax({
        url:'/api/v1/member/get/profile',
        data:{
            name:name
        },
        success:res=>{
            let gambar, socialmedia
            let sc =[]
            console.log(res);
            if (res.data.thumbnail) {
                gambar = `<img alt="image" src="/private_file/user/image-thumbnail/${res.data.thumbnail}" class="rounded-circle profile-widget-picture">`
            }
            if(res.data.first_name && res.data.last_name){
                gambar = `<figure class="avatar mr-2 avatar-xl rounded-circle profile-widget-picture" data-initial="${res.data.first_name.substr(0, 1)}${res.data.last_name.substr(0, 1)}" style="width: 100px; height: 100px;"></figure>`;
            }
            if (res.data.facebook_url) {
                sc.push(`<a href="#" class="btn btn-primary mr-1 d-block my-1">
                <i class="fa-fw fab fa-facebook-square"></i> Facebook
                </a>`);
            }
            if (res.data.instagram_url) {
                sc.push(`<a href="#" class="btn btn-danger mr-1 d-block my-1">
                <i class="fa-fw fab fa-instagram"></i> Facebook
                </a>`);
            }
            if (res.data.twitter_url) {
                sc.push(`<a href="#" class="btn btn-info mr-1 d-block my-1">
                <i class="fa-fw fab fa-twitter"></i> Facebook
                </a>`);
            }
            if (res.data.linkedin_url) {
                sc.push(`<a href="#" class="btn btn-primary mr-1 d-block my-1">
                <i class="fa-fw fab fa-linkedin"></i> Facebook
                </a>`);
            }
            $('#')
        },
        error:err=>console.log(err)
    })
}

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
                profile(ID)
            },
            error:err=>console.log(err)
        })
    })

    $('#hapusGambarProfile').on('click', function(e) {
        e.preventDefault()
        $.ajax({
            url:'/api/v1/member/delete/image/profile',
            success:res=>{
                profile(ID)
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
            let gambar= '<img alt="image" src="/public_file/assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">';
            let socialmedia = ''
            let bio = 'No Deskripsi'
            if (res.data.thumbnail) {
                gambar = `<img alt="image" src="/private_file/user/image-thumbnail/${res.data.thumbnail}" class="rounded-circle profile-widget-picture">`
            }
            if (res.data.bio) {
                bio = res.data.bio
            }
            if(res.data.first_name && res.data.last_name){
                if (!res.data.thumbnail) {
                    gambar = `<figure class="avatar mr-2 avatar-xl rounded-circle profile-widget-picture" data-initial="${res.data.first_name.substr(0, 1)}${res.data.last_name.substr(0, 1)}" style="width: 100px; height: 100px;"></figure>`;
                }
            }
            if (res.data.facebook_url) {
                socialmedia += `<a href="#" class="btn btn-primary mr-1 d-block my-1">
                <i class="fa-fw fab fa-facebook-square"></i> ${res.data.facebook_name ? res.data.facebook_name : 'Facebook'}
                </a>`
            }
            if (res.data.instagram_url) {
                socialmedia += `<a href="#" class="btn btn-danger mr-1 d-block my-1">
                <i class="fa-fw fab fa-instagram"></i> ${res.data.instagram_name ? res.data.instagram_name : 'Instagram'}
                </a>`
            }
            if (res.data.twitter_url) {
                socialmedia += `<a href="#" class="btn btn-info mr-1 d-block my-1">
                <i class="fa-fw fab fa-twitter"></i> ${res.data.twitter_name ? res.data.twitter_name : 'Twitter'}
                </a>`
            }
            if (res.data.linkedin_url) {
                socialmedia += `<a href="#" class="btn btn-primary mr-1 d-block my-1">
                <i class="fa-fw fab fa-linkedin"></i> ${res.data.linkedin_name ? res.data.linkedin_name : 'LinkedIn'}
                </a>`
            }
            $('#image-profile').html(gambar)
            $('#name-profile').text(res.data.first_name + ' ' + res.data.last_name)
            $('#status-profile').text(res.data.status)
            $('#deskripsi-profile').html(res.data.bio)
            $('#social-media-card').html(socialmedia)
        },
        error:err=>console.log(err)
    })
}

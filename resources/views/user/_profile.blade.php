<style>
    #profile-page-header .card-profile-image {
        width: 110px;
        position: absolute;
        top: 190px;
        z-index: 1;
        left: 40px;
        cursor: pointer;
        margin: 0;
    }
    .card {
        overflow: hidden;
    }
    #profile-page-header .card-content {
        margin-top: -40px;
    }
    #profile-page-header .card-image {
        height: 250px;
    }

</style>

    <div id="profile-page-header" class="card">
        <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="http://wallscollection.net/wp-content/uploads/2017/02/Hd-Background-Wallpaper-For-Laptop.jpg">
        </div>
        <figure class="card-profile-image">
            <img class="circle z-depth-2 responsive-img activator" src="{{ config('avatar.150')}}Adriano">
        </figure>
        <div class="card-content">
            <div class="row">
                <div class="col s3 offset-s2">
                    <h4 class="card-title grey-text text-darken-4">Roger Waters</h4>
                    <p class="medium-small grey-text">roger.manager@gmail.com</p>
                </div>
                <div class="col s2 center-align">
                    <h4 class="card-title grey-text text-darken-4">10+</h4>
                    <p class="medium-small grey-text">Desabafos</p>
                </div>
                <div class="col s2 center-align">
                    <h4 class="card-title grey-text text-darken-4">6</h4>
                    <p class="medium-small grey-text">Concelhos Dados</p>
                </div>
                <div class="col s2 center-align">
                    <h4 class="card-title grey-text text-darken-4">153</h4>
                    <p class="medium-small grey-text">Aconcelhado</p>
                </div>
                <div class="col s1 right-align">
                    <a class="btn-floating activator waves-effect waves-light darken-2 right">
                        <i class="mdi-action-perm-identity material-icons">thumb_up</i>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-reveal">
            <p>
                <span class="card-title grey-text text-darken-4">Roger Waters <i class="mdi-navigation-close right"></i></span>
                <span><i class="mdi-action-perm-identity cyan-text text-darken-2"></i> Project Manager</span>
            </p>

            <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>

            <p><i class="mdi-action-perm-phone-msg cyan-text text-darken-2"></i> +1 (612) 222 8989</p>
            <p><i class="mdi-communication-email cyan-text text-darken-2"></i> mail@domain.com</p>
            <p><i class="mdi-social-cake cyan-text text-darken-2"></i> 18th June 1990</p>
            <p><i class="mdi-device-airplanemode-on cyan-text text-darken-2"></i> BAR - AUS</p>
        </div>
    </div>


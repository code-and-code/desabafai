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
            <img class="circle z-depth-2 responsive-img activator" src="{{config('avatar.150')}}{{$user->nickname}}">
        </figure>
        <div class="card-content">
            <div class="row">
                <div class="col s3 offset-s2">
                    <h4 class="card-title grey-text text-darken-4">{{$user->nickname}}</h4>
                    <p class="medium-small grey-text">Cadastrado  {{$user->created_at->diffForHumans()}}</p>
                </div>
                <div class="col s2 center-align">
                    <h4 class="card-title grey-text text-darken-4">{{$user->Posts->count()}}</h4>
                    <p class="medium-small grey-text">Desabafos</p>
                </div>
                <div class="col s2 center-align">
                    <h4 class="card-title grey-text text-darken-4">{{$user->Comments->count()}}</h4>
                    <p class="medium-small grey-text">Concelhos Dados</p>
                </div>
                <div class="col s2 center-align">
                    <h4 class="card-title grey-text text-darken-4" id="likes_count">{{$user->Likes->count()}}</h4>
                    <p class="medium-small grey-text">Likes</p>
                </div>
                <div class="col s1 right-align">
                    <a class="btn-floating activator waves-effect waves-light darken-2 right like" href="{{route('like.store.user',$user)}}">
                        <i class="mdi-action-perm-identity material-icons">thumb_up</i>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-reveal">
        </div>
    </div>


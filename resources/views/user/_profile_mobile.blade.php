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
    .titulo {
        font-family: Arial, Charcoal, sans-serif;
    }
</style>

<div class="row">
    <div class="col s12 m12">
        <div class="card">
            <div class="card-image">
                <img class=" z-depth-2 responsive-img activator " src="{{config('avatar.150')}}{{$user->nickname}}">
                <strong class="card-title teal-text titulo">{{$user->nickname}}</strong>
                <a class="btn-floating btn-large halfway-fab waves-effect waves-light"><i class="material-icons">thumb_up</i></a>
            </div>
            <div class="card-content waves-block waves-effect waves-light">
                <p><a href="#" class="activator grey-text text-darken-4">Detalhes</a></p>
            </div>
            <div class="card-reveal">
                <p>
                    <span class="card-title grey-text text-darken-4">{{$user->nickname}}<i class="material-icons right">close</i></span>
                    <span><i class="mdi-action-perm-identity cyan-text text-darken-2"></i> Cadastrado há {{$user->created_at->diffForHumans()}}</span>
                </p>

                <p><i class="mdi-action-perm-phone-msg cyan-text text-darken-2"></i> {{$user->Posts->count()}} Desabafos</p>
                <p><i class="mdi-communication-email cyan-text text-darken-2"></i>{{$user->Comments->count()}} Concelhos dados</p>
                <p><i class="mdi-social-cake cyan-text text-darken-2"></i> {{$user->Likes->count()}} Likes</p>
            </div>
        </div>
    </div>
</div>


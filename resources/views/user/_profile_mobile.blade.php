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

<div class="row">
    <div class="col s12 m12">
        <div class="card">
            <div class="card-image">
                <img class=" z-depth-2 responsive-img activator " src="{{config('avatar.150')}}tio">
                <span class="card-title">Card Title</span>
                <a class="btn-floating btn-large halfway-fab waves-effect waves-light red"><i class="material-icons">thumb_up</i></a>
            </div>
            <div class="card-content waves-block waves-effect waves-light">
                <p><a href="#" class="activator grey-text text-darken-4">Detalhes</a></p>
            </div>
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                <p>Here is some more information about this product that is only revealed once clicked on.</p>
            </div>
        </div>
    </div>
</div>


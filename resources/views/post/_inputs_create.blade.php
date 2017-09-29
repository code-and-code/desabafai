<form class="col s12" action="{{route('post.store')}}" method="POST" data-remote="true" id="form_post_create">
    <div class="row">
        <div class="input-field col s12">
            <input id="title_id" type="text" name="title" class="validate">
            <label for="title_id">Desabafo</label>
            @if(!$errors->has('title'))
                <span class="help-block">
                                        <strong class="red-text" id="title" >{{ $errors->first('title') }}</strong>
                                    </span>
            @endif
        </div>
        <div class="input-field col s12">
            <textarea id="body_id" class="materialize-textarea" name="body"></textarea>
            <label for="body_id">O que aconteceu?</label>
            @if(!$errors->has('body'))
                <span class="help-block">
                                        <strong class="red-text" id="body" >{{ $errors->first('body') }}</strong>
                                    </span>
            @endif
        </div>

        <div class="input-field col s12">
            <label for="txtEndereco">Onde Aconteceu?</label>
            <input type="text" id="txtEndereco" name="address"  />
        </div>

        <div id="mapa"></div>
        <input type="hidden" id="txtLatitude"  name="latitude" />
        <input type="hidden" id="txtLongitude" name="longitude" />

    </div>
    <button class="btn waves-effect waves-light right" type="submit">Desabafei!!

    </button>
</form>

<div id="apresentacao">

    <h1>Google Maps API v3: Busca de endereço e Autocomplete - Demo</h1>

    <form method="post" action="index.html">
        <fieldset>

            <legend>Google Maps API v3: Busca de endereço e Autocomplete - Demo</legend>

            <div class="campos">
                <label for="txtEndereco">Endereço:</label>
                <input type="text" id="txtEndereco" name="txtEndereco" />
                <input type="button" id="btnEndereco" name="btnEndereco" value="Mostrar no mapa" />
            </div>

            <div id="mapa"></div>



            <input type="hidden" id="txtLatitude" name="txtLatitude" />
            <input type="hidden" id="txtLongitude" name="txtLongitude" />

        </fieldset>
    </form>

    <div class="autores">
        <p>Criado por: <a href="http://twitter.com/rodolfoprr" target="_blank">Rodolfo Pereira</a> | Estilizado por: <a href="http://twitter.com/jofelipe_" target="_blank">Jonathan Felipe</a></p>
    </div>

</div>

<div id="modal1" class="modal">
    <div class="modal-content">
        <h4>Criar Desabafo</h4>
        <div class="row">
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" type="password" class="validate">
                        <label for="password">T�tulo</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="email" type="email" class="validate">
                        <label for="email">Desabafo</label>
                    </div>
                </div>
                <button class="btn waves-effect waves-light right" type="submit" name="action">Publicar

                </button>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Fechar</a>
    </div>
</div>
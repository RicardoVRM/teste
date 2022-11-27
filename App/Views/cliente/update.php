<h1>Alterar Cliente</h1>

<div class="">
    <form action="Cliente/update" method="POST">
    <input type="hidden" value="{{id}}" name="id" class="form-control"/>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                        <label for="validationDefault01" class="control-label"><b>Nome:</b></label>
                    <div>
                        <input type="text" value="{{name}}" name="name" class="form-control" required/>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                        <label for="validationDefault02" class="control-label"><b>CEP:</b></label>
                    <div>
                        <input type="number" value="{{cep}}" name="cep" class="form-control" required/>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                        <label for="validationDefault03" class="control-label"><b>logradouro:</b></label>
                    <div>
                        <input type="text" value="{{logradouro}}" name="logradouro" class="form-control" required/>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                        <label for="validationDefault04" class="control-label"><b>Número:</b></label>
                    <div>
                        <input type="number" value="{{numero}}" name="numero" class="form-control" required/>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                        <label for="validationDefault05" class="control-label"><b>Complemento:</b></label>
                    <div>
                        <input type="text" value="{{complemento}}" name="complemento" class="form-control"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                        <label for="validationDefault06" class="control-label"><b>Telefone:</b></label>
                    <div>
                        <input type="number" value="{{telefone}}" name="telefone" class="form-control" required/>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                        <label for="validationDefault07" class="control-label"><b>E-mail:</b></label>
                    <div>
                        <input type="email" value="{{email}}" name="email" class="form-control" required/>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="botoes-form">
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href='{{url}}cliente/listar/'> <button type="button" class="btn btn-danger">Voltar</button></a>
        </div>
    </form>
</div>

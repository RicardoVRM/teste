<h1>Listar Clientes</h1>
<main>
  {{mensagem}}

  <section>
      <a href="{{url}}cliente/create/">
      <button class="btn btn-success">Novo Cliente</button>
    </a>
  </section>

  <section>
    <table class="table bg-light mt-3">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>E-mail</th>
            <th>Data Criação</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
            {{resultados}}
        </tbody>
    </table>
  </section>
</main>

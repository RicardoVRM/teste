<?php

namespace App\Models\Entity;

use App\Models\ModelBase\ClienteModel;

class ClienteEntity
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var string
     */
    public $cep;

    /**
     *
     * @var string
     */
    public $logradouro;

    /**
     *
     * @var string
     */
    public $numero;

    /**
     *
     * @var string
     */
    public $complemento;

    /**
     *
     * @var string
     */
    public $telefone;

    /**
     *
     * @var string
     */
    public $email;

    /**
     * Carrega o objeto com os dados do formulário
     *
     */
    public function loadObject($post)
    {
        $this->id = isset($post['id']) ? $post['id'] : null;
        $this->name = $post['name'];
        $this->cep = $post['cep'];
        $this->logradouro = $post['logradouro'];
        $this->numero = $post['numero'];
        $this->complemento = $post['complemento'];
        $this->email = $post['email'];
        $this->telefone = $post['telefone'];

        return $this;
    }

    /**
     *
     */
    public function create()
    {
        $clienteModel = new ClienteModel;
        if ($clienteModel->createClient('tb_clientes', $this)) {
            return 'success';
        } else {
            return 'error';
        }

    }

    /**
     *
     */
    public function update()
    {
        $clienteModel = new ClienteModel;
        if ($clienteModel->updateClient('tb_clientes', $this, $this->id)) {
            return 'success';
        } else {
            return 'error';
        }

    }

    /**
     *
     */
    public static function getCliente($id)
    {
        #
        $cliente = ClienteModel::getInfo('tb_clientes', $id);
        return $cliente[0];

    }

    /**
     *
     */
    public function listar()
    {
        $clienteAll = ClienteModel::listClient('tb_clientes');
        return $clienteAll;
    }

    /**
     *
     */
    public function delete($id)
    {
        $clienteAll = new ClienteModel();
        if ($clienteAll->deleteClient('tb_clientes', $id)) {
            return 'success';
        } else {
            return 'error';
        }
    }

    /**
     *
     */
    public static function getResult($resultClientes)
    {
        $resultados = '';
        foreach ($resultClientes as $cliente) {
            $resultados .= '<tr>
                      <td>' . $cliente->id . '</td>
                      <td>' . $cliente->name . '</td>
                      <td>' . $cliente->telefone . '</td>
                      <td>' . $cliente->email . '</td>
                      <td>' . date('d/m/Y à\s H:i:s', strtotime($cliente->data_created)) . '</td>
                      <td>
                        <a href="' . URL . 'cliente/update/?id=' . $cliente->id . '">
                          <button type="button" class="btn btn-primary">Editar</button>
                        </a>
                        <a href="' . URL . 'cliente/delete/?id=' . $cliente->id . '">
                          <button type="button" class="btn btn-danger">Excluir</button>
                        </a>
                      </td>
                    </tr>';
        }

        $resultados = strlen($resultados) ? $resultados : '<tr>
                                                       <td colspan="6" class="text-center">
                                                              Nenhum cliente encontrado
                                                       </td>
                                                    </tr>';

        return $resultados;
    }
}

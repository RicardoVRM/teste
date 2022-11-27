<?php

namespace App\Controllers;

use App\Models\Entity\ClienteEntity;
use Utils\Page;
use Utils\View;

class Cliente
{
    /**
     *
     */
    public function listar()
    {
        $clientes = (new ClienteEntity)->listar();

        $mensagem = '';
        if (isset($_SESSION['mensagem']) && $_SESSION['mensagem'] == 'success') {
            $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
        } else if (isset($_SESSION['mensagem']) && $_SESSION['mensagem'] == 'error') {
            $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
        } else {
            $_SESSION['mensagem'] = '';
        }

        $content = View::render('cliente/listar', [
            'url' => URL,
            'mensagem' => $mensagem,
            'resultados' => ClienteEntity::getresult($clientes),
        ]);

        #Retorna a view
        $return = Page::getPage('Consultar Clientes', $content);
        echo $return;
        exit;
    }

    /**
     *
     */
    public function create()
    {
        #
        if (isset($_POST) && !empty($_POST)) {
            $cliente = new ClienteEntity;

            #Carrega os atributos do objeto
            $cliente->loadObject($_POST);

            #chamada para o metodo save
            $result = $cliente->create();

            #Mensagem de sucesso ou erro
            $_SESSION['mensagem'] = $result;

            (new View)->redirect(URL . 'Cliente/listar/');
        }

        $content = View::render('cliente/create', ['url' => URL]);

        #Retorna a view
        $return = Page::getPage('Novo Cliente', $content);
        echo $return;
    }

    /**
     *
     */
    public function update()
    {
        #
        if (isset($_POST) && !empty($_POST)) {
            $cliente = new ClienteEntity;

            #Carrega os atributos do objeto
            $cliente->loadObject($_POST);

            #chamada para o metodo save
            $result = $cliente->update();

            #Mensagem de sucesso ou erro
            $_SESSION['mensagem'] = $result;

            (new View)->redirect(URL . 'Cliente/listar/');
        }

        #
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $getCliente = ClienteEntity::getCliente($id);

        #
        $content = View::render('cliente/update', [
            'url' => URL,
            'id' => $getCliente->id,
            'name' => $getCliente->name,
            'cep' => $getCliente->cep,
            'logradouro' => $getCliente->logradouro,
            'complemento' => $getCliente->complemento,
            'numero' => $getCliente->numero,
            'telefone' => $getCliente->telefone,
            'email' => $getCliente->email,
        ]);

        #Retorna a view
        $return = Page::getPage('Alterar Cliente', $content);
        echo $return;
    }

    /**
     *
     */
    public function delete()
    {
        $cliente = new ClienteEntity;
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $result = $cliente->delete($id);

        #Mensagem de sucesso ou erro
        $_SESSION['mensagem'] = $result;

        (new View)->redirect(URL . 'Cliente/listar/');
    }

}

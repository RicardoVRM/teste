<?php

namespace Utils;

/*
 *  * @author rickv
 */

class View
{

    private static $vars = [];

    public static function init($vars = [])
    {
        self::$vars = $vars;
    }

    /*
     * Metodo responsavel por retornar o conteudo de uma view
     * @param string $view
     * @return string
     */

    private static function getContentView($view)
    {
        $file = __DIR__ . '/../App/Views/' . $view . '.php';

        return file_exists($file) ? file_get_contents($file) : '';
    }

    /**
     * Metodo responsavel por retornar o conteúdo renderizado de uma view
     * @param string $view
     * @param array $vars(string, numeric)
     * @return string
     */
    public static function render($view, $vars = [])
    {
        #Conteudo da view
        $contentView = self::getContentView($view);

        #
        $vars = array_merge(self::$vars, $vars);

        #Chaves do array
        $keys = array_keys($vars);
        $keys = array_map(function ($item) {
            return '{{' . $item . '}}';
        }, $keys);

        #retorna o conteudo  renderizado
        return str_replace($keys, array_values($vars), $contentView);
    }

    /**
     *
     */
    public function redirect($routeName)
    {
        header('location: ' . $routeName);
    }

    /**
     *
     */
    public function errorAction()
    {
        $this->render('errors/notFound');
    }

}

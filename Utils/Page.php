<?php

namespace Utils;

use Utils\View;

class Page {

    /**
     * Metodo para renderizar o header do app
     * @return string
     */
    private static function getHeader() {
        return View::render('layout/header');
    }

    /**
     * Metodo para renderizar o header do app
     * @return string
     */
    private static function getFooter() {
        return View::render('layout/footer');
    }

    /**
     * Metodo para retornar para o conteúdo (view) da página
     * @return string   
     */
    public static function getPage($title, $content) {

        return View::render('layout/page', [
                    'title' => $title,
                    'header' => self::getHeader(),
                    'content' => $content,
                    'footer' => self::getFooter(),
        ]);
    }

}

<?php
/**
 * Created by PhpStorm.
 * User: saanr
 * Date: 26-6-2018
 * Time: 17:14
 */
    namespace App\Controller;

    use Symfony\Component\HttpFoundation\Response;

    class ArticleController {
        public function index(){
            return new Response('<html><body>Hello</body></html>');
        }
    }
<?php
/**
 * Created by PhpStorm.
 * User: saanr
 * Date: 26-6-2018
 * Time: 17:14
 */

namespace App\Controller;

use App\Entity\Article;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArticleController extends Controller
{
    /**
     * @Route("/")
     * @Method({"GET"})
     */
    public function index()
    {
        $articles = $this->getDoctrine()->getRepository(Article::class)->findAll();

        return $this->render('articles/index.html.twig', array('articles' => $articles));
    }

    /**
     * @Route("/article/{id}", name="article_show")
     */
    public function show($id)
    {
        $article = $this->getDoctrine()->getRepository(Article::class)->find($id);

        return $this->render('articles/show.html.twig', array('article' => $article));

    }

//        /**
//         * @Route("/article/save")
//         */
//        public function save(){
//            $entityManager = $this->getDoctrine()->getManager();
//
//            $article  = new Article();
//            $article->setTitle(' Article Two');
//            $article->setBody('This is the body for article two');
//
//            $entityManager->persist($article);
//
//            $entityManager->flush();
//
//            return new Response('Saves an article with the id of'.$article->getId());
//        }
}
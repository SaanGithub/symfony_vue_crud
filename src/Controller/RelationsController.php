<?php
/**
 * Created by PhpStorm.
 * User: saanr
 * Date: 26-6-2018
 * Time: 17:14
 */

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Article;
use App\Entity\Picture;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;



class RelationsController extends Controller
{
    /**
     * @Route("/relations", name="relations_route")
     */
    public function relationsAction()
    {
        # Many-to-One Unidirectional
        # Many Articles can have one Category

        $em = $this->getDoctrine()->getManager();
//
//        $article = new Article();
//        $article->setDescription(' Some Description');
//        $article->setTitle(' Some Title');
//        $article->setContent('Some Content');
//
//        $category = new Category();
//        $category->setName('Programming');
//
//        $article->setCategory($category);
//
//        $em->persist($article);
//        $em->persist($category);

        # One-to-One Unidirectional
        # Only one article can have that picture

        $article = new Article();
        $article->setDescription(' Some Description');
        $article->setTitle(' Some Title');
        $article->setContent('Some Content');

        $picture = new Picture();
        $picture->setPath('some/path/name.png');
        $picture->setType('image/png');

        $article->setPicture($picture);

        $em->persist($picture);
        $em->persist($article);


        $em->flush();
        return new Response('greatdsad  success');
    }

}
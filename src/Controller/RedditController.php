<?php
/**
 * Created by PhpStorm.
 * User: saanr
 * Date: 26-6-2018
 * Time: 17:14
 */

namespace App\Controller;

use App\Entity\RedditPost;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class RedditController extends Controller
{
    /**
     * @Route("/reddit", name="reddit_posts")
     */
    public function index()
    {
        $posts = $this->getDoctrine()->getRepository(RedditPost::class)->findAll();
        return $this->render('reddit/index.html.twig', ['posts' => $posts]);
    }

    /**
     * @Route("/reddit/create/{text}", name="create_reddit_posts")
     */
    public function createAction($text)
    {
        $em = $this->getDoctrine()->getManager();

        $post = new RedditPost();
        $post->setTitle('hello ' . $text);

        $em->persist($post);
        $em->flush();

        return $this->redirectToRoute('reddit_posts');
    }


    /**
     * @Route("/reddit/update/{id}/{text}", name="update_reddit_posts")
     */
    public function updateAction($id,$text)
    {
        $em = $this->getDoctrine()->getManager();

        $post = $em->getRepository(RedditPost::class)->find($id);

        if(!$post){
            throw $this->createNotFoundException('you shall not pass this is not a record');
        }
        $post->setTitle($text);

        $em->flush();

        return $this->redirectToRoute('reddit_posts');
    }


    /**
     * @Route("/reddit/delete/{id}", name="delete_reddit_posts")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $post = $em->getRepository(RedditPost::class)->find($id);

        if(!$post){
            throw $this->createNotFoundException('you shall not pass this is not a record');
        }

        $post->remove($post);

        $em->flush();

        return $this->redirectToRoute('reddit_posts');
    }

}
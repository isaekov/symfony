<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    /**
     * @Route("/", name="home_index")
     */
    public function index()
    {
        return $this->render('base.html.twig');
    }

    /**
     * @Route("/admin", name="home_admin")
     */
    public function admin()
    {
        return new JsonResponse(["Hello"=>"Test text"]);
    }
}
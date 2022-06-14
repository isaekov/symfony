<?php

namespace App\Controller;

use App\Entity\Route;
use App\Form\RouteType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class SettingsController extends AbstractController
{
    /**
     * @Route("/settings", name="settings_index")
     */
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {

        $route = new Route();
        $form = $this->createForm(RouteType::class, $route);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $route->setUserId($this->getUser()->getId());
            $entityManager->persist($route);
            $entityManager->flush();
            return $this->redirectToRoute("settings_index");
        }
        return $this->render('settings/index.html.twig', [
            'routeForm' => $form->createView(),
        ]);
    }
}

<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function HomeController()
    {
        return $this->render('home.html.twig');
    }

    /**
     * @Route("/cart", name="cart")
     */
    public function CartController()
    {
        return $this->render('cart.html.twig');
    }
}

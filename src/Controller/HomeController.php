<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepage(ProductRepository $productRepository)
    {
        $products = $productRepository->findBy([], [], 6);

        return $this->render('home.html.twig', [
            'products' => $products
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
        return $this->render('contact.html.twig');
    }

    /**
     * @Route("/gallery", name="gallery")
     */
    public function gallery()
    {
        return $this->render('gallery.html.twig');
    }

    /**
     * @Route("/posts", name="posts")
     */
    public function posts()
    {
        return $this->render('posts.html.twig');
    }

    /**
     * @Route("/chocolats", name="chocolats")
     */
    public function chocolats()
    {
        return $this->render('chocolats.html.twig');
    }
}

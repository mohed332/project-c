<?php


namespace App\Controller;


use App\Entity\Order;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class OrderController
 * @package App\Controller
 * @Route("/order")
 */
class OrderController extends AbstractController
{

    /**
     * @Route("/{id}")
     * @param Order $order
     */
    public function order(Order $order)
    {
        # Récupération des contenus de la commande.
        $contents = $order->getContents();
    }

}
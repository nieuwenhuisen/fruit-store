<?php declare(strict_types=1);

namespace App\FruitStore\Infrastructure\UI\Http\Controller;

use App\FruitStore\Domain\Sales\OrderRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class OrderController extends AbstractController
{
    /**
     * @Route("/orders", methods={"GET"})
     */
    public function list(OrderRepositoryInterface $orderRepository): Response
    {
        $orders = $orderRepository->getAll();
        dd($orders);
        return new Response('test');
    }
}

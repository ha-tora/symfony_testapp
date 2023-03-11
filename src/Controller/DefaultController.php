<?php

namespace App\Controller;

use App\Form\GetProductFormType;
use App\Repository\ProductRepository;
use App\Request\GetProductRequest;
use App\Service\DefaultService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    public function __construct(
        private ProductRepository $productRepository,
        private DefaultService $defaultService
    ) { }

    #[Route('/', name: 'product_get')]
    public function index(Request $request): Response
    {
        $getProductRequest = new GetProductRequest();    
        $form = $this->createForm(GetProductFormType::class, $getProductRequest, [
            'products' => $this->productRepository->getAllProductNames()
        ]);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) 
        {
            $product = $this->defaultService->index($form);

            return $this->render('default/index.html.twig', [
                'form' => $form,
                'product' => $product
            ]);
        }
 
        return $this->render('default/index.html.twig', [
            'form' => $form
        ]);
    }
}

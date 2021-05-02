<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Form\SearchType;
use App\Repository\ProduitsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitsController extends AbstractController
{
    /**
     * @Route("/produits", name="produits")
     */
    public function index(ProduitsRepository $produit, Request $request): Response
    {
        $data= new SearchData();
        $data->page=$request->get('page', 1);
        $form = $this->createForm(SearchType::class, $data);
        $produits=$produit->findAll();
        $form -> handleRequest($request);
        // dd($data);
        $produits=$produit->Search($data);
        return $this->render('produits/index.html.twig', [
            'produits' => $produits,
            'prod' => $produit -> allProduits(),
            'form' => $form ->createView()
        ]);
    }
}

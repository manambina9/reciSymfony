<?php

namespace App\Controller;

use App\Entity\Ingredients;
use App\Form\IngredientType;
use App\Repository\IngredientsRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class IngredientController extends AbstractController
{
    /**
     * function permetant d'afficher les ingredients 
     *
     * @param IngredientsRepository $repository
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    #[Route('/ingredient', name: 'app_ingredient', methods:['GET'])]
    public function index(IngredientsRepository $repository, PaginatorInterface $paginator,  Request $request): Response
    {
        $ingredient = $paginator->paginate(
            $repository->findAll(), /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        );

        return $this->render('pages/ingredient/index.html.twig',[
            'ingredient'=> $ingredient
        ]);
    }

    #[Route('/ingredient/nouveau',name:'ingredient.new', methods:['GET', 'POST'])]
    public function new (): Response{

        $ingredient = new Ingredients();
        $form = $this->createForm(IngredientType::class, $ingredient);
        return $this->render('pages/ingredient/new.html.twig',[
            'form' => $form->createView()
        ]);

    }
}

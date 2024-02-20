<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\TypeCafeRepository;
use App\Form\TypeCafeType;
use App\Entity\TypeCafe;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class ListeController extends AbstractController
{
    #[Route('/liste-typecafe', name: 'app_liste_type')]
    public function index(TypeCafeRepository $TypeCafeRepository): Response
    {
        $TypeCafe = $TypeCafeRepository->findAll();
        return $this->render('liste/index.html.twig', [
            'typecafe' => $TypeCafe
        ]);
    }

    #[Route('/modifier-type/{id}', name: 'app_modifier_type')]
    public function modifierType(Request $request,TypeCafe $TypeCafe,EntityManagerInterface $em): Response
    {
        $form = $this->createForm(TypeCafeType::class, $TypeCafe);
        if($request->isMethod('POST')){
            $form->handleRequest($request);
            if ($form->isSubmitted()&&$form->isValid()){
            $em->persist($TypeCafe);
            $em->flush();
            $this->addFlash('notice','Catégorie modifiée');
            return $this->redirectToRoute('app_liste_type');
            }
            }
    return $this->render('liste/modifier-type.html.twig', [
        'form' => $form->createView()
    ]);
    }

    #[Route('/supprimer-type/{id}', name: 'app_supprimer_type')]
public function supprimerCategorie(Request $request,TypeCafe $TypeCafe,EntityManagerInterface $em): Response
{
if($TypeCafe!=null){
$em->remove($TypeCafe);
$em->flush();
$this->addFlash('notice','Catégorie supprimée');
}
return $this->redirectToRoute('app_liste_type');
}
}

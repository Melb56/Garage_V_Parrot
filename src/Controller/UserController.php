<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Form\UserPasswordType;
use App\Form\NouveauCompteType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserController extends AbstractController
{

    // #[IsGranted('ROLE_ADMIN')]
    // #[Security("is_granted('ROLE_ADMIN')")]
    #[Route('/compte/nouveau', name: 'user_new')]
    public function new(Request $request, EntityManagerInterface $manager): Response
    {
        $user = new User();
        $user->setRoles(['ROLE_USER']);

        $form = $this->createForm(NouveauCompteType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();

            $this->addFlash(
                'success',
                'Votre compte a bien été créé.'
            );

            $manager->persist($user);
            $manager->flush();

            return $this->redirectToRoute("login");
        }
        return $this->render('user/form.html.twig', [
            "form" => $form->createView(),  
        ]);
    }

    //#[Security("is_granted('ROLE_USER')")]
    #[Route('/compte/modifier/{id}', name: 'user.edit')]
    public function edit(Request $request, User $user, EntityManagerInterface $manager, UserPasswordHasherInterface $hasher): Response {

       /* if(!$this->getUser()) {

            return $this->redirectToRoute('login');
        }

        if(!$this->getUser() !== $user) {

            return $this->redirectToRoute('admin');
        }*/

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if ($hasher->isPasswordValid($user, $form->getData()->getPlainPassword())) {
                $user = $form->getData();
                $manager->persist($user);
                $manager->flush();

                $this->addFlash(
                    'success',
                    'Les informations de votre compte ont bien été modifiées.'
                );

                return $this->redirectToRoute('admin');
            } else {
                $this->addFlash(
                    'warning',
                    'Le mot de passe renseigné est incorrect.'
                );
            }
        }

        return $this->render('user\edit_user.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    //#[Security("is_granted('ROLE_USER')")]
    #[Route('/compte/edition-mot-de-passe/{id}', 'user.edit.password')]
    public function editPassword(User $user, Request $request, EntityManagerInterface $manager, UserPasswordHasherInterface $hasher): Response 
    {
        $form = $this->createForm(UserPasswordType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if ($hasher->isPasswordValid($user, $form->getData()['plainPassword'])) {
                /*$user->setPlainPassword(
                    $form->getData()['newPassword']*/
                $user->setPassword(
                    $hasher->hashPassword(
                        $user,
                        $form->getData()['newPassword']
                    )
                );

            $manager->persist($user);
            $manager->flush();

                $this->addFlash(
                    'success',
                    'Le mot de passe a été modifié.'
                );

                
                return $this->redirectToRoute('admin');
            } else {
                $this->addFlash(
                    'warning',
                    'Le mot de passe renseigné est incorrect.'
                );
            }
        }

        return $this->render('user/edit_password.html.twig', [
            'form' => $form->createView()
        ]);
    }


}

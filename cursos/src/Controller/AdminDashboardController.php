<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminDashboardController extends AbstractController
{
    #[Route('/admin/dashboard', name: 'app_admin_dashboard')]
    public function index(UserRepository $userRepository): Response
    {
        $arrayUser = array();
        $arrayUser = array_merge(
            $userRepository->findBy(User::ROLE_CON),
            $userRepository->findBy(User::ROLE_ADM),
            $userRepository->findBy(User::ROLE_CRE)
        );

        return $this->render('admin_dashboard/index.html.twig', [
            'userList' => $arrayUser,
        ]);
    }
}

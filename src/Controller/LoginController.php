<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function connectAction()
    {
        return $this->redirectToRoute('auth0_connect');
    }
}

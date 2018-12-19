<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Form\Model\EmailType;


use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Newsletter;

use Symfony\Component\HttpFoundation\Request;

use App\Service\TshirtService;
use App\Service\TranslateService;
use App\Service\UserAddressService;


class HomeController extends AbstractController
{
    /**
     * Page d'accueil du site
     * 
     * @Route("/", name="home")
     * 
     * @return render
     */
    public function index(SessionInterface $session, AuthenticationUtils $authenticationUtils, TshirtService $products, TranslateService $translate)
    {  
        $error = $authenticationUtils->getLastAuthenticationError();
        $auth_checker = $this->get('security.authorization_checker');
        if ($auth_checker->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('admin');
        }

        $product_type = "tshirt";
        $genderEN = "man";
        $genderFR = $translate->translateXXtoYY( $genderEN );
        $productsRand = $products->getRandomTshirtGender( $genderFR, 4 );

        return $this->render('home/index.html.twig', [
            'controller_name' => 'Accueil',
            'product_type' => TshirtService::_PRODUCT,
            'genderEN' => $genderEN,
            'genderFR' => $genderFR,
            'productsRand' => $productsRand,
        ]);
    }

    /**
     * Page a propos de nous & nos designers
     *
     * @Route("/about", name="about")
     * 
     * @return render
     */
    public function about(){
        return $this->render('home/about.html.twig', [
            'controller_name' => 'Designers',
            'aboutNav' => true,
        ]);
    }

    /**
     * Page 404
     *
     * @Route("/404", name="errorpage")
     * 
     * @return render
     */
    public function errorPage(){
        return $this->render('404/404.html.twig', [
            'controller_name' => '404',
        ]);
    }

}

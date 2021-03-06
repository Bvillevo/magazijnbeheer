<?php
//Namespace en uses, mag je vergeten. Moet er wel in staan!
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class homepageController extends Controller
{
/**
     * @Route("/loginpage", name="loginpage")
     */
     //dit is algemene loginpage
    public function loadHomePage(Request $request) {

        return $this->render('Homepage/loginpage.html.twig');
    }

         /**
         * @Route("/inkoper/home", name="homepageInkoper")
         */
         // dit is de homepage van de inkoper
        public function loadHomePageInkoper(Request $request) {

            return $this->render('Homepage/homepageInkoper.html.twig');
        }
           /**
           * @Route("/magazijnmeester/home", name="homepageMagazijnmeester")
           */
           //dit loginpage voor magazijnmeester
            public function loadHomePageMagazijnmeester(Request $request) {

                return $this->render('Homepage/homepageMagazijnmeester.html.twig');
            }

            /**
            * @Route("/admin/home", name="homepageAdmin")
            */
            //dit is de loginpage van de beheerder.
            public function loadHomePageAdmin(Request $request) {

                return $this->render('Homepage/homepageAdmin.html.twig');
            }

            /**
            * @Route("/verkoper/home", name="homepageVerkoper")
            */
            //dit is de homepage van verkoper.
            public function loadHomePageVerkoper(Request $request) {

                return $this->render('Homepage/homepageVerkoper.html.twig');
            }

            /**
             * @Route("/logout", name="security_logout")
             */
             // dit is de logout functie.
            public function logoutAction(Request $request)
            {
                return new Response($this->renderView('Homepage/logout.html.twig'), 401);
            }

}
?>

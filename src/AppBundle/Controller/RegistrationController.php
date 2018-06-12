<?php
/**
 * Created by PhpStorm.
 * User: Marice
 * Date: 26-05-18
 * Time: 14:00
 */

// src/AppBundle/Controller/RegistrationController.php
namespace AppBundle\Controller;

use AppBundle\Form\Type\UserType;
use AppBundle\Form\Type\UserWijzigType;
use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends Controller
{
    /**
     * @Route("admin/register", name="user_registration")
     */
     // functie om een nieuwe gebruiker te registreren
    public function registerAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        // 1) build the form
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            // 4) save the User!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user

            return $this->redirectToRoute('homepageAdmin');
        }

        return $this->render(
            'registration/register.html.twig', array('form' => $form->createView()) );
    }
    /**
      * @Route("/admin/wijzig/wachtwoord/{id}", name="wachtwoordwijzig")
      */
      public function wijzigWachtwoord (Request $request, $id, UserPasswordEncoderInterface $passwordEncoder){
        $bestaandeUser = $this->getDoctrine()->GetRepository("AppBundle:User")->find($id);
        $form = $this->createForm(UserWijzigType::class, $bestaandeUser);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

          $password = $passwordEncoder->encodePassword($bestaandeUser, $bestaandeUser->getPlainPassword());
          $bestaandeUser->setPassword($password);

          $em = $this->getDoctrine()->getManager();
          $em->persist($bestaandeUser);
          $em->flush();
          //Na het wijzigen als inkoper van een artikel wordt er weer verwezen naar alleartikelen. De inkoper heeft namelijk geen speciale rechten.
          return $this->redirect($this->generateurl("allegebruikers"));
       }
       return new Response($this->renderView ('form.html.twig', array('form' => $form->createView())));
     }
}

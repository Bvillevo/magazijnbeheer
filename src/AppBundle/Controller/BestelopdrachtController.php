<?php
//Namespace en uses, mag je vergeten. Moet er wel in staan!
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Bestelopdracht;
use AppBundle\Form\Type\BestelopdrachtType;

class BestelopdrachtController extends Controller
{
  /**
	 * @Route("/bestelopdracht/nieuw/", name="bestelopdrachtNieuw")
	 *
	 */
  // functie om een nieuwe bestelopdracht te maken 
	 public function nieuweBestelopdracht (Request $request){
		 $nieuweBestelopdracht = new Bestelopdracht ();
		 $form = $this->createForm(BestelopdrachtType::class, $nieuweBestelopdracht);

		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($nieuweBestelopdracht);
			$em->flush();
			$bestellingid = $form->get("bestelordernummer")->getData();

			return new Response($bestellingid);

    	return $this->redirect ($this->generateUrl("bestelartikel"));

		}
		return new Response($this->renderView ('Bestelopdracht/index.html.twig', array('form' => $form->createView())));
}

/**
         * @Route("/bestelorder/nieuw", name="nieuwebestelorder")
         */
        public function nieuweBestelorder(Request $request)
      {
        $nieuweBestelorder = new Bestelopdracht();
        $form = $this->createForm(BestelopdrachtType::class, $nieuweBestelorder);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
          $em = $this->getDoctrine()->getManager();
          $em->persist($nieuweBestelorder);
          $em->flush();
          {
            $laatstenr = $this->getDoctrine()->getRepository("AppBundle:Bestelopdracht")->findBy([], ['bestelordernummer' => 'ASC']);
            $tekst = "";
            foreach($laatstenr as $laat) {
            $tekst = $laat->getBestelordernummer();
          }
          }
         return $this->redirect("http://localhost/magazijnbeheer1/web/app_dev.php/bestelartikel/nieuw/$tekst");
        }
				// Rendert de functie in een .twig.
	return new Response($this->render('Bestelopdracht/index.html.twig', array('form' => $form->createView())));
	}



		/**
 	 * @Route("/bestelopdracht/{id}", name="allebestelopdrachten")
 	 */
 	 public function Bestelopdracht (Request $request, $id){
 		 $bestelopdracht = $this->getDoctrine()->GetRepository("AppBundle:Bestelopdracht")->find($id);
 		 $form = $this->createForm(BestelopdrachtType::class, $bestelopdracht);

 		$form->handleRequest($request);
 		if ($form->isSubmitted() && $form->isValid()) {
 			$em = $this->getDoctrine()->getManager();
 			$em->persist($bestelopdracht);
 			$em->flush();

 			return $this->redirect($this->generateurl("bestelopdrachtNieuw"));

 		}
 		return new Response($this->renderView ('Bestelopdracht/index.html.twig', array('form' => $form->createView())));
 }
}
?>

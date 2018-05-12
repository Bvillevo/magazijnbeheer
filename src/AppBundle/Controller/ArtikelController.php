<?php
//Namespace en uses, mag je vergeten. Moet er wel in staan!
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Artikel;
use AppBundle\Form\Type\ArtikelInkoperType;
use AppBundle\Form\Type\ArtikelMagazijnmeesterType;
use AppBundle\Form\Type\ArtikelType;

class ArtikelController extends Controller
{
/**
	 * @Route("/artikel/nieuw", name="artikelNieuw")
	 */
	 public function nieuweArtikel (Request $request){
		 $nieuweArtikel = new Artikel ();
		 $form = $this->createForm(ArtikelType::class, $nieuweArtikel);

		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			//Deze code is bedoeld voor het berekenen van de bestel serie. Dit betekent dus de minimumvoorraad min de actuele is wat er nog besteld moet worden.
			$nieuweArtikel->bestelserie = $nieuweArtikel->minimumVoorraad - $nieuweArtikel->voorraadInAantal;
			$em->persist($nieuweArtikel);
			$em->flush();
    	return $this->redirect ($this->generateUrl("artikelNieuw"));


		}
		return new Response($this->render('form.html.twig', array('form' => $form->createView())));
 }
 /**
 	 * @Route("/inkoper/artikel/wijzigen/{artikelnr}", name="inkoperartikelwijzigen")
 	 */
 	 public function wijzigInkoperartikel (Request $request, $artikelnr){
		 $bestaandeArtikel = $this->getDoctrine()->GetRepository("AppBundle:Artikel")->find($artikelnr);
		 $form = $this->createForm(ArtikelInkoperType::class, $bestaandeArtikel);

		 $form->handleRequest($request);
		 if ($form->isSubmitted() && $form->isValid()) {
			 $em = $this->getDoctrine()->getManager();
			 $bestaandeArtikel->bestelserie = $bestaandeArtikel->minimumVoorraad - $bestaandeArtikel->voorraadInAantal;
			 $em->persist($bestaandeArtikel);
			 $em->flush();
			 return $this->redirect($this->generateurl("artikelNieuw"));
		}
 		return new Response($this->render('form.html.twig', array('form' => $form->createView())));
  }

	/**
		* @Route("/artikel/wijzigen/{artikelnr}", name="artikelwijzigen")
		*/
		public function wijzigArtikel (Request $request, $artikelnr){
			$bestaandeArtikel = $this->getDoctrine()->GetRepository("AppBundle:Artikel")->find($artikelnr);
			$form = $this->createForm(ArtikelType::class, $bestaandeArtikel);

			$form->handleRequest($request);
			if ($form->isSubmitted() && $form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$bestaandeArtikel->bestelserie = $bestaandeArtikel->minimumVoorraad - $bestaandeArtikel->voorraadInAantal;
				$em->persist($bestaandeArtikel);
				$em->flush();
				return $this->redirect($this->generateurl("artikelNieuw"));
			 }
		 return new Response($this->render('form.html.twig', array('form' => $form->createView())));
	 }
	 /**
	 	 * @Route("/magazijnmeester/artikel/wijzigen/{artikelnr}", name="magazijnmeesterartikelwijzigen")
	 	 */
	 	 public function wijzigMagazijnmeesterartikel (Request $request, $artikelnr){
			 $bestaandeArtikel = $this->getDoctrine()->GetRepository("AppBundle:Artikel")->find($artikelnr);
			 $form = $this->createForm(ArtikelMagazijnmeesterType::class, $bestaandeArtikel);

			 $form->handleRequest($request);
			 if ($form->isSubmitted() && $form->isValid()) {
				 $em = $this->getDoctrine()->getManager();
				 $bestaandeArtikel->bestelserie = $bestaandeArtikel->minimumVoorraad - $bestaandeArtikel->voorraadInAantal;
				 $em->persist($bestaandeArtikel);
				 $em->flush();
				 return $this->redirect($this->generateurl("artikelNieuw"));
			}
	 		return new Response($this->render('form.html.twig', array('form' => $form->createView())));
	  }

}
?>

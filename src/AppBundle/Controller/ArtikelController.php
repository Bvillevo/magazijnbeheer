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
				 * @Route("alle/artikelen", name="alleartikelen")
				 */
			public function alleartikelen (Request $request){
				$artikelen = $this->getDoctrine()->GetRepository("AppBundle:Artikel")->findAll();

				return new Response($this->renderView ('artikelen.html.twig', array ('artikelen'=>$artikelen)));
			}


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
			//		$nieuweArtikel->bestelserie = $nieuweArtikel->minimumVoorraad - $nieuweArtikel->voorraadInAantal;
					$nieuweArtikel->setBestelserie($nieuweArtikel->getMinimumVoorraad() - $nieuweArtikel->getVoorraadInAantal());
					$em->persist($nieuweArtikel);
					$em->flush();
		    	return $this->redirect ($this->generateUrl("artikelNieuw"));


				}
				return new Response($this->renderView ('form.html.twig', array('form' => $form->createView())));
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
					 $bestaandeArtikel->setBestelserie($bestaandeArtikel->getMinimumVoorraad() - $bestaandeArtikel->getVoorraadInAantal());
					 $em->persist($bestaandeArtikel);
					 $em->flush();
					 return $this->redirect($this->generateurl("artikelNieuw"));
				}
		 		return new Response($this->renderView ('form.html.twig', array('form' => $form->createView())));
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
				$bestaandeArtikel->setBestelserie($bestaandeArtikel->getMinimumVoorraad() - $bestaandeArtikel->getVoorraadInAantal());
				$em->persist($bestaandeArtikel);
				$em->flush();
				return $this->redirect($this->generateurl("artikelNieuw"));
			 }
		 return new Response($this->renderView ('form.html.twig', array('form' => $form->createView())));
	 }
	 /**
			 * @Route("magazijnmeester/alle/artikelenn", name="alleArtikelenMagazijnmeester")
			 */
		public function alleArtikelenMagazijnmeester (Request $request){
			$artikelen = $this->getDoctrine()->GetRepository("AppBundle:Artikel")->findAll();

			return new Response($this->renderView ('artikelenMagazijnmeester.html.twig', array ('artikelen'=>$artikelen)));
		}
	 /**
			* @Route("magazijnmeester/artikel/nieuww", name="artikelMagazijnmeesterNieuw")
			*/
			public function nieuweMagazijnmeesterArtikel (Request $request){
				$nieuweMagazijnmeesterArtikel = new Artikel ();
				$form = $this->createForm(ArtikelMagazijnmeesterType::class, $nieuweMagazijnmeesterArtikel);

			 $form->handleRequest($request);
			 if ($form->isSubmitted() && $form->isValid()) {
				 $em = $this->getDoctrine()->getManager();
				 $nieuweMagazijnmeesterArtikel->setBestelserie($nieuweMagazijnmeesterArtikel->getMinimumVoorraad() - $nieuweMagazijnmeesterArtikel->getVoorraadInAantal());
				 $em->persist($nieuweMagazijnmeesterArtikel);
				 $em->flush();
				 return $this->redirect ($this->generateUrl("artikelMagazijnmeesterNieuw"));


			 }
			 return new Response($this->renderView ('form.html.twig', array('form' => $form->createView())));
	 }
	 /**
	 	 * @Route("/magazijnmeester/artikel/wijzigenn/{artikelnr}", name="magazijnmeesterArtikelWijzigen")
	 	 */
	 	 public function wijzigMagazijnmeesterartikel (Request $request, $artikelnr){
			 $bestaandeArtikel = $this->getDoctrine()->GetRepository("AppBundle:Artikel")->find($artikelnr);
			 $form = $this->createForm(ArtikelMagazijnmeesterType::class, $bestaandeArtikel);

			 $form->handleRequest($request);
			 if ($form->isSubmitted() && $form->isValid()) {
				 $em = $this->getDoctrine()->getManager();
				 $bestaandeArtikel->setBestelserie($bestaandeArtikel->getMinimumVoorraad() - $bestaandeArtikel->getVoorraadInAantal());
				 $em->persist($bestaandeArtikel);
				 $em->flush();
				 return $this->redirect($this->generateurl("artikelNieuw"));
			}
	 		return new Response($this->renderView ('form.html.twig', array('form' => $form->createView())));
	  }
		/**
		* @Route("/artikel/verwijder/{artikelnr}", name="artikelverwijderen")
		*/
		 	 public function verwijderArtikel (Request $request, $artikelnr){
				 $em = $this->getDoctrine()->getManager();
		 		 $bestaandeArtikel = $em->GetRepository("AppBundle:Artikel")->find($artikelnr);
				 $em->remove($bestaandeArtikel);
				 $em->flush();

		 	 return $this->redirect($this->generateurl("alleartikelen"));
		  }
}
?>

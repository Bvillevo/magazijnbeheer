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

<<<<<<< HEAD
				//functie show alle actieve artikelen
			public function alleActieveArtikelen (Request $request){
				$artikelen = $this->getDoctrine()->GetRepository("AppBundle:Artikel")->findBy(["status" => 1], ["artikelnr" => 'ASC']);

							return new Response($this->renderView ('Artikelen/artikelenActieven.html.twig', array ('artikelen'=>$artikelen)));
				}

				/**
					 * @Route("alle/deactieve/artikelen", name="alledeactieveartikelen")
					 */

					//functie show alle deaactieve artikelen
				public function alleDeactieveArtikelen (Request $request){
					$artikelen = $this->getDoctrine()->GetRepository("AppBundle:Artikel")->findBy(["status" => 0]);

								return new Response($this->renderView ('Artikelen/artikelenDeactieven.html.twig', array ('artikelen'=>$artikelen)));
					}
=======
				return new Response($this->renderView ('artikelen.html.twig', array ('artikelen'=>$artikelen)));
			}
>>>>>>> 98c8e38bca58e18d853cc615d18e60c5430ef903


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
					 return $this->redirect($this->generateurl("alleartikelen"));
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

			return new Response($this->renderView ('Artikelen/artikelenMagazijnmeester.html.twig', array ('artikelen'=>$artikelen)));
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
				 return $this->redirect($this->generateurl("alleArtikelenMagazijnmeester"));
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
<<<<<<< HEAD
//Na het verzenden van de opdracht zal de gebruiker door gestuurd worden naar alleartikelen.
		 	 return $this->redirect($this->generateurl("Artikelen/alledeactieveartikelen"));
		  }

			/**
			* @Route("/artikel/deactiveren/{artikelnr}", name="artikeldeactiveren")
			*/
			 	 public function deactiveerArtikel (Request $request, $artikelnr){
					 $em = $this->getDoctrine()->getManager();
			 		 $bestaandeArtikel = $em->GetRepository("AppBundle:Artikel")->find($artikelnr);
					 $bestaandeArtikel->status = 0;
					 $em->persist($bestaandeArtikel);
					 $em->flush();
//Na het verzenden van de opdracht zal de gebruiker door gestuurd worden naar alleartikelen.
			 	 return $this->redirect($this->generateurl("alleactieveartikelen"));
			  }



				/**
	 			* @Route("verkoper/artikelomschrijving", name="omschrijvingArtikelenVerkoper")
	 			*/
				public function alleArtikelenVerkoper (Request $request){
				$em = $this->getDoctrine()->getManager();
				$zoekwaarde = $request->request->get('zoekwaarde');

				$query1 = $em->createQuery(         // <== deze function is voor het zoeken van de omschrijving van het artikel.
=======

		 	 return $this->redirect($this->generateurl("alleartikelen"));
		  }

			/**
	 			 * @Route("verkoper/artikelomschrijving", name="omschrijvingArtikelenVerkoper")
	 			 */
	 	 	public function alleArtikelenVerkoper (Request $request){
				$em = $this->getDoctrine()->getManager();
 		   	$zoekwaarde = $request->request->get('zoekwaarde');

				$query1 = $em->createQuery(			// <== deze function is voor het zoeken van de omschrijving van het artikel.
>>>>>>> 98c8e38bca58e18d853cc615d18e60c5430ef903
				"SELECT o
				FROM AppBundle:Artikel o
				WHERE o.omschrijving LIKE :omschrijving
				ORDER BY o.artikelnr ASC")->setParameter('omschrijving', '%' . $zoekwaarde . '%');

<<<<<<< HEAD
				$query2 = $em->createQuery(         // <== deze query is voor het zoeken naar het artikelnummer van het artikeln.
=======
				$query2 = $em->createQuery(			// <== deze query is voor het zoeken naar het artikelnummer van het artikeln.
>>>>>>> 98c8e38bca58e18d853cc615d18e60c5430ef903
				"SELECT p
				FROM AppBundle:Artikel p
				WHERE p.artikelnr = :artikelnr
				ORDER BY p.artikelnr ASC")->setParameter('artikelnr', $zoekwaarde);

				$code1 = $query1->getResult(); // Code1 en code 2 is voor het ophalen van de resultaten
				$code2 = $query2->getResult();

				$artikelen = $code1 + $code2; // hier voegen wij de code's samen.

<<<<<<< HEAD
				return new Response($this->renderView ('Artikelen/artikelenVerkoper.html.twig', array ('artikelen'=>$artikelen)));
}
=======
	 			return new Response($this->renderView ('artikelenVerkoper.html.twig', array ('artikelen'=>$artikelen)));
	 		}
>>>>>>> 98c8e38bca58e18d853cc615d18e60c5430ef903
}
?>

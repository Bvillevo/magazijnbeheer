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
				 * @Route("alle/actieve/artikelen", name="alleactieveartikelen")
				 */

				//functie show alle actieve artikelen
			public function alleActieveArtikelen (Request $request){
				$artikelen = $this->getDoctrine()->GetRepository("AppBundle:Artikel")->findBy(["status" => 1]);

							return new Response($this->renderView ('Artikelen/artikelenActieven.html.twig', array ('artikelen'=>$artikelen)));
				}

				/**
					 * @Route("alle/deactieve/artikelen", name="alledeactieveartikelen")
					 */

					//functie show alle deaactieve artikelen
				public function alleDeactieveArtikelen (Request $request){
					$artikelen = $this->getDoctrine()->GetRepository("AppBundle:Artikel")->findBy(["status" => 0]);

								return new Response($this->renderView ('artikelenDeactieven.html.twig', array ('artikelen'=>$artikelen)));
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
				//Functie om bestelserie te berekenen voor het toevoegen van een nieuw artikel als een inkoper.
					 if ($nieuweArtikel->getMinimumvoorraad() > $nieuweArtikel->getVoorraadInAantal()){
							 $nieuweArtikel->setBestelserie($nieuweArtikel->getMinimumvoorraad() - $nieuweArtikel->getVoorraadInAantal());
					 } else{
							 $nieuweArtikel->setBestelserie(0);
						 			}
					$em->persist($nieuweArtikel);
					$em->flush();
					//Na het aanmaken van een nieuw artikel wordt er weer verwezen naar alleartikelen.
		    	return $this->redirect ($this->generateUrl("alleactieveartikelen"));


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
					 //Functie om bestelserie te berekenen voor het wijzigen van een artikel als een inkoper.
 				 				if ($bestaandeArtikel->getMinimumvoorraad() > $bestaandeArtikel->getVoorraadInAantal()){
		 								$bestaandeArtikel->setBestelserie($bestaandeArtikel->getMinimumvoorraad() - $bestaandeArtikel->getVoorraadInAantal());
 							} else{
		 								$bestaandeArtikel->setBestelserie(0);
 										}
					 $em->persist($bestaandeArtikel);
					 $em->flush();
					 //Na het wijzigen als inkoper van een artikel wordt er weer verwezen naar alleartikelen. De inkoper heeft namelijk geen speciale rechten.
					 return $this->redirect($this->generateurl("alleactieveartikelen"));
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
				//Functie om bestelserie te berekenen voor het wijzigen van een artikel.
						 if ($bestaandeArtikel->getMinimumvoorraad() > $bestaandeArtikel->getVoorraadInAantal()){
								 $bestaandeArtikel->setBestelserie($bestaandeArtikel->getMinimumvoorraad() - $bestaandeArtikel->getVoorraadInAantal());
					 } else{
								 $bestaandeArtikel->setBestelserie(0);
								 }
				$em->persist($bestaandeArtikel);
				$em->flush();
				//Na het wijzigen van een artikel wordt er weer verwezen naar alleartikelen.
				return $this->redirect($this->generateurl("alleactieveartikelen"));
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
			* @Route("magazijnmeester/artikel/locatiewijzigen", name="artikelMagazijnmeesterLocatie")
			*/
			public function nieuweMagazijnmeesterArtikel (Request $request){
				$nieuweMagazijnmeesterArtikel = new Artikel ();
				$form = $this->createForm(ArtikelMagazijnmeesterType::class, $nieuweMagazijnmeesterArtikel);
			 $form->handleRequest($request);
			 if ($form->isSubmitted() && $form->isValid()) {
				 $em = $this->getDoctrine()->getManager();
				 $em->persist($nieuweMagazijnmeesterArtikel);
				 $em->flush();
				 //Na het maken van een nieuw artikel als magazijnmeester zal er een nieuwe overzicht gegeven worden waardoor de magazijnmeester een nieuwartikel kan toevoegen
				 //met zijnn specifieke rechten
				 return $this->redirect ($this->generateUrl("artikelMagazijnmeesterNieuw"));


			 }
			 return new Response($this->renderView ('form.html.twig', array('form' => $form->createView())));
	 }
	 /**
	 	 * @Route("/magazijnmeester/artikel/wijzigenn/{artikelnr}", name="magazijnmeesterLocatieWijzigen")
	 	 */
	 	 public function wijzigMagazijnmeesterartikel (Request $request, $artikelnr){
			 $bestaandeArtikel = $this->getDoctrine()->GetRepository("AppBundle:Artikel")->find($artikelnr);
			 $form = $this->createForm(ArtikelMagazijnmeesterType::class, $bestaandeArtikel);

			 $form->handleRequest($request);
			 if ($form->isSubmitted() && $form->isValid()) {
				 $em = $this->getDoctrine()->getManager();
				 $em->persist($bestaandeArtikel);
				 $em->flush();
				 //Na het verzenden van de opdracht zal de magazijnmeester doorgestuurd worden naar zijn eigen overzicht van alle artikelen.
				 return $this->redirect($this->generateurl("alleArtikelenMagazijnmeester"));
			}
	 		return new Response($this->renderView ('form.html.twig', array('form' => $form->createView())));
	  }
		/**
		* @Route("/artikel/activeren/{artikelnr}", name="artikelactiveren")
		*/
		 	 public function verwijderArtikel (Request $request, $artikelnr){
				 $em = $this->getDoctrine()->getManager();
		 		 $bestaandeArtikel = $em->GetRepository("AppBundle:Artikel")->find($artikelnr);
				 $bestaandeArtikel->status = 1;
				 $em->persist($bestaandeArtikel);
				 $em->flush();
//Na het verzenden van de opdracht zal de gebruiker door gestuurd worden naar alleartikelen.
		 	 return $this->redirect($this->generateurl("alledeactieveartikelen"));
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
	"SELECT o
	FROM AppBundle:Artikel o
	WHERE o.omschrijving LIKE :omschrijving
	ORDER BY o.artikelnr ASC")->setParameter('omschrijving', '%' . $zoekwaarde . '%');

	$query2 = $em->createQuery(         // <== deze query is voor het zoeken naar het artikelnummer van het artikeln.
	"SELECT p
	FROM AppBundle:Artikel p
	WHERE p.artikelnr = :artikelnr
	ORDER BY p.artikelnr ASC")->setParameter('artikelnr', $zoekwaarde);

	$code1 = $query1->getResult(); // Code1 en code 2 is voor het ophalen van de resultaten
	$code2 = $query2->getResult();

	$artikelen = $code1 + $code2; // hier voegen wij de code's samen.

	return new Response($this->renderView ('artikelenVerkoper.html.twig', array ('artikelen'=>$artikelen)));
}
}
?>

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
				 //Deze functie is bedoeld om een nieue bestelorder toe tevoegen.
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
					//Hier worden bestelordernmmers opgehaald in een ascend format. En je gaat dan de bestelorder loopen tot hij bij de ID komt
					// hij neemt de ID mee naar het volgende scherm.
          {
            $laatstenr = $this->getDoctrine()->getRepository("AppBundle:Bestelopdracht")->findBy([], ['bestelordernummer' => 'ASC']);
            $tekst = "";
            foreach($laatstenr as $laat) {
            $tekst = $laat->getBestelordernummer();
          }
          }
         return $this->redirect("/demo/web/app_dev.php/inkoper/home");
        }
				// Rendert de functie in een .twig.
	return new Response($this->renderView('Bestelopdracht/index.html.twig', array('form' => $form->createView())));
	}

 /**
		* @Route("alle/bestelopdrachten/", name="allebestelopdrachten")
		*/

	 //deze functie laat alle bestelopdrachten zien
 public function alleBestelopdrachten (Request $request){
	 $bestelregel = $this->getDoctrine()->GetRepository("AppBundle:Bestelregel")->findAll();

	 $em = $this->getDoctrine()->getManager();

	 // Deze query selecteert de bestelordnummer bestellingsid van de tabel bestelopdracht en bestelregel.
	 $RAW_QUERY = "SELECT bestelordernummer, bestellingid, leverancier   FROM bestelopdracht, bestelregel WHERE bestelopdracht.bestelordernummer = bestelregel.bestellingid";

	 // Dit voert de query uit.
	 $statement = $em->getConnection()->prepare($RAW_QUERY);
	 $statement->execute();

	 // Dit haalt het resultaat binnen van de code.
	 $result = $statement->fetchAll();

	 return new Response($this->renderView ('Bestelopdracht/overzicht.html.twig', array ('bestelregel'=> $bestelregel, 'query' => $result)));
	 }

	 /**
		* @Route("overzicht/bestelopdrachten/", name="overzichtbestelopdrachten")
		*/

	 //deze functie laat alle bestelopdrachten zien
 public function overzichtBestelopdrachten (Request $request){
	 $bestelregel = $this->getDoctrine()->GetRepository("AppBundle:Bestelregel")->findAll();

	 $em = $this->getDoctrine()->getManager();

	 // Deze query selecteert de bestelordnummer bestellingsid van de tabel bestelopdracht en bestelregel.
	 $RAW_QUERY = "SELECT bestelordernummer, bestellingid, leverancier   FROM bestelopdracht, bestelregel WHERE bestelopdracht.bestelordernummer = bestelregel.bestellingid";

	 // Dit voert de query uit.
	 $statement = $em->getConnection()->prepare($RAW_QUERY);
	 $statement->execute();

	 // Dit haalt het resultaat binnen van de code.
	 $result = $statement->fetchAll();

	 return new Response($this->renderView ('Bestelopdracht/overzichtverkoper.html.twig', array ('bestelregel'=> $bestelregel, 'query' => $result)));
	 }

	   /**
		 * @Route("/inkoper/bestelorder/wijzigen/{bestellingid}", name="inkoperbestelorderwijzigen")
		 */
		 //deze functie kan de bestelorder bekeken worden.
		 public function wijzigInkoperbestelorder (Request $request, $bestellingid){
			 $artikel = $this->getDoctrine()->GetRepository("AppBundle:Artikel")->findAll();

			 // Roept de database manager aan.
              $em = $this->getDoctrine()->getManager();

              // Deze query selecteert de data die nodig is voor het tonen op het scherm
              $RAW_QUERY = "SELECT bestelregel.keuringseis, bestelregel.hoeveelheid, bestelregel.bestellingid, bestelregel.artikelnr, bestelregel.hoeveelheid, artikel.omschrijving, bestelregel.ontvangstdatum
							FROM bestelregel, artikel
							WHERE bestelregel.artikelnr = artikel.artikelnr  AND bestelregel.bestellingid =$bestellingid";

              // DIt voert de query uit.
              $statement = $em->getConnection()->prepare($RAW_QUERY);
              $statement->execute();

              // Dit haalt het resultaat binnen van de code.
              $result = $statement->fetchAll();
							//id
							$link = $_SERVER['PHP_SELF'];
							$link_array = explode('/',$link);
							$page = end($link_array);

							$RAW_QUERY2 = "SELECT  leverancier FROM bestelopdracht WHERE bestelordernummer = $bestellingid ";

                  // DIt voert de query uit.
                  $statement2 = $em->getConnection()->prepare($RAW_QUERY2);
                  $statement2->execute();

                  // Dit haalt het resultaat binnen van de code.
                  $result2 = $statement2->fetchAll();

						 $RAW_QUERY3 = "SELECT  bestelordernummer FROM bestelopdracht WHERE bestelordernummer = $bestellingid ";

		                  // DIt voert de query uit.
		                  $statement3 = $em->getConnection()->prepare($RAW_QUERY3);
		                  $statement3->execute();

		                  // Dit haalt het resultaat binnen van de code.
		                  $result3 = $statement3->fetchAll();


				 return new Response($this->renderView ('Bestelopdracht/formulier.html.twig', array('artikel' => $result, 'id' => $page, 'query' => $result2, 'bestel' => $result3)));

			}

			/**
		 * @Route("/verkoper/bestelorder/wijzigen/{bestellingid}", name="verkoperbestelorderwijzigen")
		 */
		 //deze functie kan de bestelorder bekeken worden.
		 public function wijzigVerkoperbestelorder (Request $request, $bestellingid){
			 $artikel = $this->getDoctrine()->GetRepository("AppBundle:Artikel")->findAll();

			 // Roept de database manager aan.
              $em = $this->getDoctrine()->getManager();

              // Deze query selecteert de data die nodig is voor het tonen op het scherm
              $RAW_QUERY = "SELECT bestelregel.keuringseis, bestelregel.hoeveelheid, bestelregel.bestellingid, bestelregel.artikelnr, bestelregel.hoeveelheid, artikel.omschrijving, bestelregel.ontvangstdatum
							FROM bestelregel, artikel
							WHERE bestelregel.artikelnr = artikel.artikelnr  AND bestelregel.bestellingid =$bestellingid";

              // DIt voert de query uit.
              $statement = $em->getConnection()->prepare($RAW_QUERY);
              $statement->execute();

              // Dit haalt het resultaat binnen van de code.
              $result = $statement->fetchAll();
							//id
							$link = $_SERVER['PHP_SELF'];
							$link_array = explode('/',$link);
							$page = end($link_array);

							$RAW_QUERY2 = "SELECT  leverancier FROM bestelopdracht WHERE bestelordernummer = $bestellingid ";

                  // DIt voert de query uit.
                  $statement2 = $em->getConnection()->prepare($RAW_QUERY2);
                  $statement2->execute();

                  // Dit haalt het resultaat binnen van de code.
                  $result2 = $statement2->fetchAll();

						 $RAW_QUERY3 = "SELECT  bestelordernummer FROM bestelopdracht WHERE bestelordernummer = $bestellingid ";

		                  // DIt voert de query uit.
		                  $statement3 = $em->getConnection()->prepare($RAW_QUERY3);
		                  $statement3->execute();

		                  // Dit haalt het resultaat binnen van de code.
		                  $result3 = $statement3->fetchAll();


				 return new Response($this->renderView ('Bestelopdracht/formulier.html.twig', array('artikel' => $result, 'id' => $page, 'query' => $result2, 'bestel' => $result3)));

			}
}
?>

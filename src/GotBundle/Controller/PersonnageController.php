<?php
namespace GotBundle\Controller;

use GotBundle\Entity\Personnage;
use GotBundle\GotBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PersonnageController extends Controller
{
    /**
     * @Route("/{nom}/{prenom}/{sexe}/{bio}/{id}")
     */
    public function addPersoAction($nom, $prenom, $sexe, $bio, $id)
    {

        $em = $this->getDoctrine()->getManager();

        $personnage = new Personnage();
        $personnage->setNom($nom);
        $personnage->setPrenom($prenom);
        $personnage->setSexe($sexe);
        $personnage->setBio($bio);
        $royaume = $em->getRepository('GotBundle:Royaume')
            ->find($id);

        $personnage->setRoyaume($royaume);


        $em->persist($personnage);
        $em->flush();

        return $this->render('GotBundle:Default:index.html.twig', array('personnage' => $personnage));
    }

    /**
     * @Route("/{id}")
     */
    public function showPersonnageAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $personnage = $em->getRepository('GotBundle:Personnage')
            ->find($id);

        return $this->render('GotBundle:Default:showPersonnage.html.twig', array('personnage' => $personnage));


    }

    /**
     * @Route("/all/{sexe}")
     */
    public function listPersonnageAction($sexe)
    {
        $em = $this->getDoctrine()->getManager();
        $personnages = $em->getRepository('GotBundle:Personnage')
            ->findBySexe($sexe);

        return $this->render('GotBundle:Default:showAll.html.twig', array('personnages' => $personnages));

    }

    /**
     * @Route("/change/{idPerso}/{idRoyaume}")
     */
    public function changePersoRoyaumeAction($idPerso, $idRoyaume)
    {
        $em = $this->getDoctrine()->getManager();
        $personnage = $em->getRepository('GotBundle:Personnage')
            ->find($idPerso);
        $royaume = $em->getRepository('GotBundle:Royaume')
            ->find($idRoyaume);
        $personnage->setRoyaume($royaume);

        $em->flush();

        return $this->render('GotBundle:Default:changeRoyaume.html.twig', array('personnage' => $personnage, 'royaume' => $royaume));

    }

    /**
     * @Route("/delete/{idPerso}")
     */
    public function deletePersoAction($idPerso)
    {
        $em = $this->getDoctrine()->getManager();
        $personnage = $em->getRepository('GotBundle:Personnage')
            ->find($idPerso);
        $em->remove($personnage);

        $em->flush();

        return $this->render('GotBundle:Default:delete.html.twig', array('personnage' => $personnage));
    }
}
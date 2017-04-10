<?php
namespace GotBundle\Controller;

use GotBundle\Entity\Royaume;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class RoyaumeController extends Controller
{
    /**
     * @Route("/royaume/{nom}/{capitale}/{nbhabitant}")
     */
    public function addRoyaumeAction($nom, $capitale, $nbhabitant)
    {

        $em = $this->getDoctrine()->getManager();

        $royaume = new Royaume();
        $royaume->setNom($nom);
        $royaume->setCapitale($capitale);
        $royaume->setnbhabitant($nbhabitant);


        $em->persist($royaume);
        $em->flush();

        return $this->render('GotBundle:Default:index2.html.twig', array('royaume'=>$royaume));
    }
}

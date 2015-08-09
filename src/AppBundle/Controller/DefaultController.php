<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
		return $this->redirect('home');
    }
    
    //Für alle Basisinhaltseiten bei denen nur einer Ausgabe von Text bzgl. eines bestimmten Bereichs erfolgen soll.
    /**
	 * @Route("/{content}", requirements={"content"="home|werdegang|kenntnisse|motivation|projekte|impressum"})
     */
    public function contentAction($content)
    {
		$contentTemplatesPath = 'content/';
		
		$contentTemplate = $contentTemplatesPath . 'home.html.twig';

		if($content == 'werdegang') {
			$contentTemplate = $contentTemplatesPath . 'werdegang.html.twig';
		} else if($content == 'kenntnisse') {
			$contentTemplate = $contentTemplatesPath . 'kenntnisse.html.twig' ;
		} else if($content == 'motivation') {
			$contentTemplate = $contentTemplatesPath . 'motivation.html.twig';
		} else if($content == 'projekte') {
			$contentTemplate = $contentTemplatesPath . 'projekte.html.twig';
		} else if($content == 'impressum') {
			$contentTemplate = $contentTemplatesPath . 'impressum.html.twig';
		}
		
		return $this->render('default/index.html.twig', array('contentTemplate' => $contentTemplate));
    }
}

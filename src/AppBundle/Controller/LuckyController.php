<?php
// src/AppBundle/Controller/LuckyController.php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class LuckyController extends Controller
{
	/**
	 * @Route("/lucky/number", name="lucky number")
	 */
	public function numberAction()
	{
		$number = rand(0, 100);
	
		return new Response(
				'<html><body>Lucky number: '.$number.'</body></html>'
		);
	}
	
	/**
	 * @Route("/lucky/number/{count}", name="lucky number with parameter")
	 */
	public function numberWithParameterAction($count)
	{
		$numbers = array();
		for ($i = 0; $i < $count; $i++) {
			$numbers[] = rand(0, 100);
		}
		$numbersList = implode(', ', $numbers);
	
		return new Response(
				'<html><body>Lucky numbers: '.$numbersList.'</body></html>'
		);
	}
	
	/**
	 * @Route("/notfound", name="not found exception page")
	 */
	public function NotFoundHttpException()
	{
		throw $this->createNotFoundException('The Page is not found');
	}
}
?>

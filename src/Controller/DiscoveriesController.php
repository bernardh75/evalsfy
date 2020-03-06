<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DiscoveriesController extends AbstractController
{
	/**
	 * @Route("/discoveries", name="discoveries.index")
	 */
	public function index(Request $request):Response
	{
		$userAgent = $request->server->get('HTTP_USER_AGENT');

		return $this->render('discoveries/index.html.twig', [
			'param' => $userAgent
		]);
    }
}









<?php declare(strict_types=1);


namespace PartViewedProducts\Controller;

use Shopware\Storefront\Controller\StorefrontController;
use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\Routing\Annotation\RouteScope;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @RouteScope(scopes={"storefront"})
 */
class GetViewedProductsController extends AbstractController
{

    public function __construct()
    {
    }
    /**
     * @Route("/partviewedproducts/get", name="partviewedproducts.get", defaults={"XmlHttpRequest": true}, methods={"GET"})
     */
    public function getViewedProducts(Request $request, SessionInterface $session) : Response
    {
        $viewedProducts = $session->get('viewedproducts') ?? false;
        if ($viewedProducts){
            return new Response(
                $this->renderView('@PartViewedProducts/storefront/viewedproducts/viewedproducts.html.twig', [
                    'XMLProducts'=> $viewedProducts,

                ])
            );
        }
        else {
            return new Response(
                Response::HTTP_NO_CONTENT
            );
        }

    }

}

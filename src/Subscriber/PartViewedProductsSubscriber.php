<?php declare(strict_types=1);

namespace PartViewedProducts\Subscriber;

use Shopware\Storefront\Page\Product\ProductPageLoadedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class PartViewedProductsSubscriber implements EventSubscriberInterface/**
 * Returns an array of event names this subscriber wants to listen to.
 *
 * The array keys are event names and the value can be:
 *
 *  * The method name to call (priority defaults to 0)
 *  * An array composed of the method name to call and the priority
 *  * An array of arrays composed of the method names to call and respective
 *    priorities, or 0 if unset
 *
 * For instance:
 *
 *  * ['eventName' => 'methodName']
 *  * ['eventName' => ['methodName', $priority]]
 *  * ['eventName' => [['methodName1', $priority], ['methodName2']]]
 *
 * @return array The event names to listen to
 */
{
    /**
     * @var array
     */
    private $viewedProducts;
    private $session;
    public function __construct($session)
    {
        $this->session=$session;
        $this->viewedProducts = $this->session->get('viewedproducts') ?? [];
        $this->viewedProductIds = $this->session->get('viewedProductIds') ?? [];
    }
    public static function getSubscribedEvents(): array
    {
        return [
            ProductPageLoadedEvent::class => 'updateRecentlyViewedProducts'
        ];
    }

    public function updateRecentlyViewedProducts(ProductPageLoadedEvent $event)
    {
        $viewedProduct = $event->getPage()->getProduct();
        $viewedProductId = $viewedProduct->getId();
        if (!in_array($viewedProductId, $this->viewedProductIds)){
            array_unshift($this->viewedProducts, $viewedProduct);
            array_push($this->viewedProductIds, $viewedProductId );
            $this->session->set('viewedproducts',$this->viewedProducts);
            $this->session->set('viewedProductIds',$this->viewedProductIds);
        }

    }


}

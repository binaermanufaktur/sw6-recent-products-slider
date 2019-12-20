<?php declare(strict_types=1);

namespace PartViewedProducts\Subscriber;

use Shopware\Core\Content\Product\ProductEvents;
use Shopware\Core\Framework\DataAbstractionLayer\Event\EntityLoadedEvent;
use Shopware\Storefront\Page\PageLoadedEvent;
use Shopware\Storefront\Page\Product\ProductPageLoadedEvent;
use Shopware\Storefront\Pagelet\Footer\FooterPageletLoadedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Twig\Environment;

class PartViewedProductsPageSubscriber implements EventSubscriberInterface/**
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
    private $viewedProducts;
    public function __construct()
    {
        $this->viewedProducts = $_SESSION['viewedproducts'] ?? [];
    }
    public static function getSubscribedEvents(): array
    {
        return [
            FooterPageletLoadedEvent::class =>'addRecentlyViewedProductsToPageAssets'
        ];
    }

    public function addRecentlyViewedProductsToPageAssets(FooterPageletLoadedEvent $event)
    {
        $event->getPagelet()->assign(['viewedProducts'=> $this->viewedProducts]);
    }
}

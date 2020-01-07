<?php declare(strict_types=1);

namespace PartViewedProducts\Subscriber;


use Shopware\Storefront\Pagelet\Footer\FooterPageletLoadedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

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
    private $session;
    public function __construct(SessionInterface $session)
    {
        $this->session= $session;
        $this->viewedProducts = $this->session->get('viewedproducts') ?? [];
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

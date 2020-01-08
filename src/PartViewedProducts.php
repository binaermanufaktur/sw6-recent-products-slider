<?php declare(strict_types=1);

namespace PartViewedProducts;

use Shopware\Core\Framework\Plugin;

class PartViewedProducts extends Plugin
{
    public function getStorefrontScriptPath(): string
    {
        return 'Resources/app/storefront/dist/storefront/js';
    }
}

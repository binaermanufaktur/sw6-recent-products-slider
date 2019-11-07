# Part Viewed Products SW6 Plugin
The plugin after activation listens to ProductPageLoad Events and adds loaded products to php session storage.

A twig template in /src/Resources/views/viewedproducts/viewedproducts.html.twig can be included with


    {% sw_include '@Storefront/viewedproducts/viewedproducts.html.twig'%}

    
and creates a product slider.

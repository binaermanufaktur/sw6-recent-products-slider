import './component';
import './preview';

Shopware.Service('cmsService').registerCmsBlock({
    name: 'recent-products-slider',
    label: 'sw-cms.blocks.commerce.recentProductsSlider.label',
    category: 'commerce',
    component: 'sw-cms-block-recent-products-slider',
    previewComponent: 'sw-cms-preview-recent-products-slider',
    defaultConfig: {
        marginBottom: '20px',
        marginTop: '20px',
        marginLeft: '20px',
        marginRight: '20px',
        sizingMode: 'boxed'
    }
});

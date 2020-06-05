import './component';
import './preview';

Shopware.Service('cmsService').registerCmsBlock({
    name: 'recent-product-slider',
    label: 'sw-cms.blocks.commerce.recentProductSlider.label',
    category: 'commerce',
    component: 'sw-cms-block-recent-product-slider',
    previewComponent: 'sw-cms-preview-recent-product-slider',
    defaultConfig: {
        marginBottom: '20px',
        marginTop: '20px',
        marginLeft: '20px',
        marginRight: '20px',
        sizingMode: 'boxed'
    },
    slots: {
        productSlider: 'product-slider'
    }
});

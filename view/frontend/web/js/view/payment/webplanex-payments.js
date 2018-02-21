/*browser:true*/
/*global define*/
define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/renderer-list'
    ],
    function (
        Component,
        rendererList
    ) {
        'use strict';
        rendererList.push(
            {
                type: 'webplanex_fort_cc',
                component: 'WebPlanex_Fort/js/view/payment/method-renderer/webplanex_fort_cc-method'
            }
           
        );
        /** Add view logic here if needed */
        return Component.extend({});
    }
);
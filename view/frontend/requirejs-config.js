var config = {
    map: {
        '*': {
            "merchantPage": 'WebPlanex_Fort/js/MerchantPage'
        }
    },
    shim: {
        //dependency third-party lib
        "merchantPage": {
             deps: [
                'jquery' //dependency jquery will load first
            ]
        }
    }
};
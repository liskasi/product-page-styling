define(['ko', 'uiComponent'], function (ko, Component) {
    'use strict';
    return Component.extend({
        defaults: {
            template: "Magento_Catalog/input-counter"
        }, initialize: function () {
            this._super();
            this.qty = ko.observable(this.qty);
            return this;
        }, getDataValidator: function () {
            return JSON.stringify(this.dataValidate);
        }, decreaseQty: function () {
            let newQty = Number(this.qty()) - 1;
            if (newQty < 1) {
                newQty = 1;
            }
            this.qty(newQty);
        }, increaseQty: function () {
            let newQty = Number(this.qty()) + 1;
            this.qty(newQty);
        }
    });
});


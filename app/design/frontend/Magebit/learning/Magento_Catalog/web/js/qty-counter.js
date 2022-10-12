/**
 * This file is part of the Magento Catalog package.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento Catalog
 * to newer versions in the future.
 *
 * @copyright Copyright (c) 2019 Magento, Ltd. (https://vendor.com/)
 * @license   GNU General Public License ("GPL") v3.0
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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


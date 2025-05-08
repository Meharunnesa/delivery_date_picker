jQuery(document).ready(function ($) {
    $("#delivery_date").datepicker({
        dateFormat: "yy-mm-dd",
        minDate: 0,
        showAnim: "fadeIn",
    });

    

    window.easycommerceFilters = window.easycommerceFilters || {};
    const existingFilter = window.easycommerceFilters["easycommerce_order_info"];

    window.easycommerceFilters["easycommerce_order_info"] = function (orderData, order) {

        const deliveryDate = {
            label: "Delivery Date",
            value: order?.delivery_date || "N/A",
            className: "text-[#0073aa]",
        };
        
        const deliveryTime = {
            label: "Delivery Time",
            value: order?.delivery_time || "N/A",
            className: "text-[#0073aa]",
        };


        return existingFilter
        ? existingFilter(orderData, order).concat(deliveryDate, deliveryTime)
        : orderData.concat(deliveryDate, deliveryTime);

    };

});
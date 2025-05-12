jQuery(document).ready(function ($) {
    $("#delivery_date").datepicker({
        dateFormat: "yy-mm-dd",
        minDate: 0,
        showAnim: "fadeIn",
    });

    //Store date and time in frontend

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

    // store date and time in backend

    window.easycommerceFilters = window.easycommerceFilters || {};

    const existingFilters = window.easycommerceFilters["easycommerce_admin_side_order_infos"];

    window.easycommerceFilters["easycommerce_admin_side_order_infos"] = function (orderData, order) {
        return (existingFilters ? existingFilters(orderData, order) : orderData).concat([
            {
                icon: "https://cdn-icons-png.flaticon.com/512/747/747310.png", 
                key: "Delivery Date",
                value: order?.delivery_date
                    ? order.delivery_date
                    : "Not selected//",
            },
            {
                icon: "https://cdn-icons-png.flaticon.com/512/61/61112.png", 
                key: "Delivery Time",
                value: order?.delivery_time
                    ? order.delivery_time
                    : "Not selected//",
            },
        ]);
    };

});
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
                icon: EASYCOMMERCE.delivery_date_localized.delivery_date_icon_url, 
                key: "Delivery Date",
                value: React.createElement(
                    'p',
                    {
                        className:
                            'text-ec-body font-inter font-medium text-base leading-[26px] text-[#0073aa]',
                    },
                    order?.delivery_date
                    ? order.delivery_date
                    : "N/A"
                ),
            },
            {
                icon: EASYCOMMERCE.delivery_date_localized.delivery_clock_icon_url, 
                key: "Delivery Time",
                value: React.createElement(
                    'p',
                    {
                        className:
                            'text-ec-body font-inter font-medium text-base leading-[26px] text-[#0073aa]',
                    },
                    order?.delivery_time
                    ? order.delivery_time
                    : "N/A"
                ),
            },
        ]);
    };

});
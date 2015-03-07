jQuery(document).on("adding_to_cart", function(event, thisbutton, data) {
    jQuery('.post-' + data.product_id).addClass('alreadyincart')
});

jQuery(document).ready(function(){
    jQuery.scrollUp({
        scrollName: 'scrollUp', // Element ID
        topDistance: '1200', // Distance from top before showing element (px)
        topSpeed: 300, // Speed back to top (ms)
        animation: 'fade', // Fade, slide, none
        animationInSpeed: 1500, // Animation in speed (ms)
        animationOutSpeed: 1500, // Animation out speed (ms)
        scrollText: '<i class="el-icon-chevron-up scroll-icon"></i>', // Text for element
        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
    });

    jQuery('#commentform').validate({
        rules: {
            author: {
                required: true,
                minlength: 2
            },
            
            email: {
                required: true,
                email: true
            },
            
            url: {
                url: true
            },
            
            comment: {
                required: true,
                minlength: 20
            }
        },
        
        messages: {
            author: "Please enter a valid name.",
            email: "Please enter a valid email address.",
            url: "Please use a valid website address.",
            comment: "Message must be at least 20 characters."
        }
    });

    jQuery("#nav").tinyNav();
});
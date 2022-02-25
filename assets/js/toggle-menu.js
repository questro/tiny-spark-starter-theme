
// anonymous function to use regular $ syntax

(function($) {

    // $(document).ready(function() {
    //       alert("Hello world!");
    // });


    // toggle mobile/desktop menu

    function menuToggle() {
        if ( $( window ).width() >= 1000 ) {
            $( '.mobile-menu' ).hide();
            $( '.primary-menu' ).show();
        } else {
            $( '.primary-menu' ).hide();
            $( '.mobile-menu' ).show(); 
        }
    }

    //set the menu to display on page load
    menuToggle();

    // when browser is resized, call function again
    $( window ).on('resize', function() {
        menuToggle();
    }); 

    function openMobileMenu () { 
        
        if ('button#nav-toggle-btn') {

            $('button#nav-toggle-btn').on('click', function(){
                $('.mobile-menu-wrapper').css({
                    'display': 'block',
                    'opacity': 1,
                    'visibility': 'visible'
                })

                let $closeToggle = $('<button class="nav-toggle-btn close"> Close X </button> ');

                // insert the close btn before the mobile menu
                $('.mobile-menu').before($closeToggle)

                $('button.nav-toggle-btn.close').on('click', function(){
                    $('.mobile-menu-wrapper').css({
                        'display': 'none',
                        'opacity': 0,
                        'visibility': 'hidden'
                    })
                    $($closeToggle).remove()
                })

                $( window ).on('resize', function() {
                    $('.mobile-menu-wrapper').css({
                        'display': 'block',
                        'opacity': 0,
                        'visibility': 'hidden'
                    })
                    $($closeToggle).remove()
                })

                 
            })
        }
    }

    openMobileMenu();

})( jQuery ); 
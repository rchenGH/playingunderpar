(function ($) {

    const app = () => {

        const dropdownButton = () => {

            for(let i = 0; i <= $('.faq-row').length; i++) {
                $(`#question-${i}`).click(function(e) {
                    console.log('clicked') 
                    setTimeout(function () {
                        if($(`#question-${i}`).attr('aria-expanded') === "false") {
                            $(e.target).find('.dropdown-arrow').css({'transform': 'rotate(0deg)'})
                        } else {
                            $(e.target).find('.dropdown-arrow').css({'transform': 'rotate(180deg)'})
                        }
                    }, 200)
                })

            }
        }
        
        const navBlack = () => {
            $('.navbar-toggler').on('click', function() {
                if(!$('.nav-menu').hasClass('show')) {
                    $('.navbar').css({'background-color': 'black', 'transition': '0.5s' })
                    $('.line-1').css({'transform': 'rotate(45deg) translate(15px, 15px)', 'transition': '0.5s' })
                    $('.line-2').css({'opacity': '0', 'transition': '0.25s' })
                    $('.line-3').css({'transform': 'rotate(-45deg) translate(5px, -5px)', 'transition': '0.5s' })

                    if( !$('body.home').length ){
                        $('.nav-logo').css({'filter': 'brightness(1)' })
                        $('.hamburger-line').css({'background-color': 'white' })
                    }

                } else {
                    $('.navbar').css('background-color','transparent')
                    $('.line-1').css({'transform': 'initial', 'transition': '0.5s' })
                    $('.line-2').css({'opacity': 'initial', 'transition': '0.5s' })
                    $('.line-3').css({'transform': 'initial', 'transition': '0.5s' })

                    if( !$('body.home').length ){
                        $('.nav-logo').css({'filter': 'brightness(0)' });
                        $('.hamburger-line').css({'background-color': 'black' })
                    }
                }
            });
        }

        const frontpage = () => {
            $('.audio-on').on('click', function() {
                $("video").prop('muted', false);

                if( $("video").prop('muted') ) {
                    $("video").prop('muted', true);
                } else {
                    $("video").prop('muted', false);
                }
            })
        }

        const testimonialSlider = () => {

            const $testimonialSectionContainer = $('.testimonial-section-container');

            $testimonialSectionContainer.slick({
              dots: false,
              infinite: true,
              speed: 300,
              slidesToShow: 1,
              adaptiveHeight: true,
            });
            
        }

        const join = () => {

            if(document.querySelector('.dropbtn')) {
                document.querySelector('.dropbtn').addEventListener('click', function() {
                    document.getElementById("myDropdown").classList.toggle("show");
                })
            }

            window.onclick = function(event) {
                if (!event.target.matches('.dropbtn') ) {
                    var dropdowns = document.getElementsByClassName("dropdown-content");
                    var i;
                    for (i = 0; i < dropdowns.length; i++) {
                        var openDropdown = dropdowns[i];
                        if (openDropdown.classList.contains('show')) {
                            openDropdown.classList.remove('show');
                        }
                    }
                }
            }

            $('#discount_code_button').val("Apply Discount Code")
            $('#pmpro_btn-submit').val('Create Account')
        }


        const account = () => {
         
            // player profile
            $('#city_div').before('<h4 class="section-title medium">Location</h4>')
            $('#driver_div').before('<h4 class="section-title medium">Distances</h4>')


            // membership

            $('.pmpro_account-membership-levelname').addClass("section-title small");
            $('.pmpro_actionlinks').appendTo($('#pmpro_account-membership'))

            $('#pmpro_account-membership').prepend('<h2 class="section-title medium">Membership Details</h2>')
            $('#pmpro_account-invoices').prepend('<h2 class="section-title medium">Past Transactions</h2>')

            $('#pmpro_account-invoices .pmpro_table tr td:nth-child(1)').prepend('<span>Date: </span>')
            $('#pmpro_account-invoices .pmpro_table tr td:nth-child(2)').addClass('section-title small');

            $('#pmpro_account-invoices .pmpro_table tr td:nth-child(3)').prepend('<span>Amount: </span>')
            $('#pmpro_account-invoices .pmpro_table tr td:nth-child(3)').addClass('section-title smaller')

            $('#pmpro_account-invoices .pmpro_table tr td:nth-child(4)').prepend('<span>Payment Status: </span>')
            $('#pmpro_account-invoices .pmpro_table tr td:nth-child(4)').addClass('section-title')

            $('.pmpro_billing_wrap').prepend('<h2 class="section-title medium">Payment Details</h2>')

            $('.pmpro_checkout-field-bstate label').text('State/Province');
            $('.pmpro_checkout-field-bzipcode label').text('Postal Code/Zip Code');

        }

        const session = () => {
            $('.acf-true-false').change(function(e) {
                
                if($(e.target).on('change')) {
                    setTimeout(function() {
                        $(e.target).parents().find($('.acf-form-submit .acf-button')).trigger('click')
                    }, 100)
                }
                
            })

            $('.top-right-image-wrapper').appendTo($('.column-wrapper.top-right'));

        }

        const siteSearch = () => {
            const $loading = $('.search-body').find('.loading');

            // Search ajax funciton
            $('form.search-form [name=s]').keyup(function() {
                $(this).parents('form').submit();
            })

            let searchAjax = false;

            $('form.search-form').submit(function (e) {
                e.preventDefault();

                if(searchAjax) {
                    searchAjax.abort();
                }

                const s = $('[name=s]', this).val();

                if(s) {
                    $('#search .results').html('').show();
                    $('.drills-category-row').hide();
                    $('.pagination-row').hide();
                } else {
                    $('#search .results').hide();
                    $('.drills-category-row').show();
                    $('.pagination-row').show();
                    $loading.hide();
                    return false;
                }

                searchAjax = $.post(
                    "/wp-admin/admin-ajax.php",
                    {
                        action: 'search_ajax',
                        s: s
                    },
                    function(response) {
                        searchAjax = false;
                        if(response) {
                            $('#search .results').html(response);
                            $loading.hide();

                            if($('#search .results .post-component-column').length === 0) {
                                $('.no-content').show();
                            } else {
                                $('.no-content').hide();
                            }
                        } else {
                            $('.no-content').hide();

                             $loading.hide();
                         }
                    }
                )
            })
        }



        dropdownButton();
        navBlack();
        frontpage();
        testimonialSlider();
        join();
        account();
        session();
        siteSearch();
    };

    $(function () {
        app();
    });
})(jQuery);
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>Realshed - @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fav Icon -->
    <link rel="icon" href="{{ asset('frontend') }}/assets/images/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
        integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Stylesheets -->
    <link href="{{ asset('frontend') }}/assets/css/font-awesome-all.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/css/flaticon.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/css/owl.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/css/bootstrap.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/css/animate.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/css/jquery-ui.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/css/nice-select.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/css/color/theme-color.css" id="jssDefault" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/css/switcher-style.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/css/style.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/css/responsive.css" rel="stylesheet">
    @routes()
</head>
<!-- page wrapper -->

<body>
    <div class="boxed_wrapper">
        <!-- preloader -->
        {{-- @include('frontend.layouts.includes.loader') --}}
        <!-- preloader end -->


        <!-- switcher menu -->

        <!-- end switcher menu -->

        @include('frontend.layouts.includes.header')

        @yield('main')

        <!-- main-footer -->
        @include('frontend.layouts.includes.footer')
        <!-- main-footer end -->

        <!--Scroll to top-->
        <button class="scroll-top scroll-to-target" data-target="html">
            <span class="fal fa-angle-up"></span>
        </button>
    </div>


    <!-- jequery plugins -->
    <script src="{{ asset('frontend') }}/assets/js/jquery.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/popper.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/bootstrap.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/owl.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/wow.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/validation.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/jquery.fancybox.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/appear.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/scrollbar.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/isotope.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/jquery.nice-select.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/jQuery.style.switcher.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/jquery-ui.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/jquery.paroller.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/product-filter.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/nav-tool.js"></script>
    <!-- map script -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-CE0deH3Jhj6GN4YvdCFZS7DpbXexzGU"></script>
    <script src="{{ asset('frontend') }}/assets/js/gmaps.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/map-helper.js"></script>
    <!-- main-js -->
    <script src="{{ asset('frontend') }}/assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @stack('frontend_script')


    <!-- all ajax script-->
    <script>

        // limit functin
        function strLimit(text, limit = 100, end = "...") {
            return text.length > limit ? text.substring(0, limit) + end : text;
        }



        // add to wishlist
        function addToWishlist(id) {
            $.ajax({
                type: "POST",
                url: route('wishlist.store'),
                data: {
                    id: id
                },
                dataType: "json",
                success: function(response) {
                    allWishlist(); //calling wishlist
                    // sweetalert
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        // iconColor: 'white',
                        customClass: {
                            popup: 'colored-toast',
                        },
                        showConfirmButton: false,
                        timer: 2500,
                        timerProgressBar: true,
                    });
                    if (response.success) {
                        Toast.fire({
                            icon: 'success',
                            title: response.success,
                        })
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: response.error,
                        })
                    }
                    // sweetalert  end

                }
            });
        }

        // wishlist product show
        function allWishlist() {
            $.ajax({
                type: "GET",
                url: route('wishlist.data'),
                // data: "data",
                dataType: "json",
                success: function(response) {
                    var wishlist = '';

                    $.each(response.wishlistproperty, function(key, value) {
                        wishlist += `

                             <div class="deals-list-content list-item">
                                <div class="deals-block-one">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image"><img
                                                    src="${value.property.thumbnail}"
                                                    style="height:370px;object-fit:cover;"
                                                    alt=""></figure>
                                            <div class="batch"><i class="icon-11"></i></div>
                                            <span class="category">${value.property.propertycategory.category_name}</span>
                                            <div class="buy-btn"><a href="property-details.html">For ${value.property.buy_rent_type}</a></div>
                                        </div>
                                        <div class="lower-content">
                                            <div class="title-text">
                                                <h4><a href="/property/details/${value.property.property_slug}">${value.property.property_name}</a></h4>
                                            </div>
                                            <div class="price-box clearfix">
                                                <div class="price-info pull-left">
                                                    <h6>Start From</h6>
                                                    ${value.property.discount_price
                                                    ? ` <h4>$${value.property.discount_price}</h4>
                                                                                    <h4 class="text-secondary"><del>$${value.property.price}</del></h4>`
                                                    :`
                                                                                     <h4>$${value.property.price}</h4>

                                                                                    `
                                                    }

                                                </div>
                                                <div class="author-box pull-right">
                                                    <figure class="author-thumb">
                                                        <img src="${value.property.users.photo}" alt="">
                                                        <span>${value.property.users.name}</span>
                                                    </figure>
                                                </div>
                                            </div>
                                            <p> ${strLimit(value.property.property_descriptions, 100)}</p>
                                            <ul class="more-details clearfix">
                                                <li><i class="icon-14"></i>${value.property.bedroom} Beds</li>
                                                <li><i class="icon-15"></i>${value.property.bath_rooms} Baths</li>
                                                <li><i class="icon-16"></i>${value.property.property_size}</li>
                                            </ul>
                                            <div class="other-info-box clearfix">
                                                <div class="btn-box pull-left">
                                                    <a href="/property/details/${value.property.property_slug}"
                                                        class="theme-btn btn-two">See Details</a></div>
                                                <ul class="other-option pull-right clearfix">

                                                    <li><a type="button" id="${value.id}" onclick="removeWishlist(this.id)"><i class="far fa-trash"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    `;
                });
                $('#wishlist_holder').html(wishlist);
                }
            });
        }
        allWishlist(); //calling wishlist

        // remove to wishlis
        function removeWishlist(id) {
           $.ajax({
                type: "POST",
                url: route('wishlist.remove'),
                data: {
                    id: id
                },
                dataType: "json",
                success: function(response) {
                    allWishlist(); //calling wishlist
                    // sweetalert
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        // iconColor: 'white',
                        customClass: {
                            popup: 'colored-toast',
                        },
                        showConfirmButton: false,
                        timer: 2500,
                        timerProgressBar: true,
                    });
                    if (response.success) {
                        Toast.fire({
                            icon: 'success',
                            title: response.success,
                        })
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: response.error,
                        })
                    }
                    // sweetalert  end
                }
            });
        }






        // add to compare
        function addTocompare(id) {
            $.ajax({
                type: "POST",
                url: route('compare.store'),
                data: {
                    id: id
                },
                dataType: "json",
                success: function(response) {
                    allcomparest(); //calling compare list
                    // sweetalert
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        // iconColor: 'white',
                        customClass: {
                            popup: 'colored-toast',
                        },
                        showConfirmButton: false,
                        timer: 2500,
                        timerProgressBar: true,
                    });
                    if (response.success) {
                        Toast.fire({
                            icon: 'success',
                            title: response.success,
                        })
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: response.error,
                        })
                    }
                    // sweetalert  end

                }
            });
        }

        // wishlist product show
        function allcomparest() {
            $.ajax({
                type: "GET",
                url: route('compare.data'),
                // data: "data",
                dataType: "json",
                success: function(response) {
                    var compare = '';

                    $.each(response.compareproperty, function(key, value) {
                        compare += `

                             <div class="deals-list-content list-item">
                                <div class="deals-block-one">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image"><img
                                                    src="${value.property.thumbnail}"
                                                    style="height:370px;object-fit:cover;"
                                                    alt=""></figure>
                                            <div class="batch"><i class="icon-11"></i></div>
                                            <span class="category">${value.property.propertycategory.category_name}</span>
                                            <div class="buy-btn"><a href="property-details.html">For ${value.property.buy_rent_type}</a></div>
                                        </div>
                                        <div class="lower-content">
                                            <div class="title-text">
                                                <h4><a href="/property/details/${value.property.property_slug}">${value.property.property_name}</a></h4>
                                            </div>
                                            <div class="price-box clearfix">
                                                <div class="price-info pull-left">
                                                    <h6>Start From</h6>
                                                    ${value.property.discount_price
                                                    ? ` <h4>$${value.property.discount_price}</h4>
                                                                                    <h4 class="text-secondary"><del>$${value.property.price}</del></h4>`
                                                    :`
                                                                                     <h4>$${value.property.price}</h4>

                                                                                    `
                                                    }

                                                </div>
                                                <div class="author-box pull-right">
                                                    <figure class="author-thumb">
                                                        <img src="${value.property.users.photo}" alt="">
                                                        <span>${value.property.users.name}</span>
                                                    </figure>
                                                </div>
                                            </div>
                                            <p> ${strLimit(value.property.property_descriptions, 100)}</p>
                                            <ul class="more-details clearfix">
                                                <li><i class="icon-14"></i>${value.property.bedroom} Beds</li>
                                                <li><i class="icon-15"></i>${value.property.bath_rooms} Baths</li>
                                                <li><i class="icon-16"></i>${value.property.property_size}</li>
                                            </ul>
                                            <div class="other-info-box clearfix">
                                                <div class="btn-box pull-left">
                                                    <a href="/property/details/${value.property.property_slug}"
                                                        class="theme-btn btn-two">See Details</a></div>
                                                <ul class="other-option pull-right clearfix">

                                                    <li><a type="button" id="${value.id}" onclick="removeCompare(this.id)"><i class="far fa-trash"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    `;
                });
                $('#compare_holder').html(compare);
                }
            });
        }
        allcomparest(); //calling compare

        // remove to compare
        function removeCompare(id) {
           $.ajax({
                type: "POST",
                url: route('compare.remove'),
                data: {
                    id: id
                },
                dataType: "json",
                success: function(response) {
                    allcomparest(); //calling wishlist
                    // sweetalert
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        // iconColor: 'white',
                        customClass: {
                            popup: 'colored-toast',
                        },
                        showConfirmButton: false,
                        timer: 2500,
                        timerProgressBar: true,
                    });
                    if (response.success) {
                        Toast.fire({
                            icon: 'success',
                            title: response.success,
                        })
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: response.error,
                        })
                    }
                    // sweetalert  end
                }
            });
        }


    </script>
    <!-- all ajax script end-->

</body><!-- End of .page_wrapper -->

</html>

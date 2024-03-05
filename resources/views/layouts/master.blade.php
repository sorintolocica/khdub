<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HKDUB România | Suntem o echipă care dublează orice! </title>
    <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet"
          href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/style.css')}}">
    <link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css')}}" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome JS -->
    <script defer src="{{asset('https://use.fontawesome.com/releases/v5.0.13/js/solid.js')}}"
            integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
            crossorigin="anonymous"></script>
    <script defer src="{{asset('https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js')}}"
            integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
            crossorigin="anonymous"></script>

    <!-- JQUERY -->
    <script src='{{asset('https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js')}}' type='text/javascript'></script>

    <script type='text/javascript'>
        (function($) {
            $(document).ready(function(){
                $('ul.xo-tab-links li').click(function(){
                    var tab_id = $(this).attr('data-tab');

                    // Make the old tab inactive.
                    $('ul.xo-tab-links li').removeClass('current');
                    $('.xo-tab-content').removeClass('current');

                    // Make the clicked tab active.
                    $(this).addClass('current');
                    $("#"+tab_id).addClass('current');
                })
            })
        })(jQuery);
    </script>
</head>
<body>
<div class="immagine-destra"></div>
<!-- Header -->
<div class="header">
    @include('partials.header')
</div>
<br>
@yield('content');
<!-- Footer -->
<footer class="footer">
    @include('partials.footer')
</footer>
<script>
    // Obține elementul de link pentru înregistrare
    const signupLink = document.getElementById('signupLink');

    // Obține modalul de înregistrare
    const signupModal = new bootstrap.Modal(document.getElementById('signupModal'));

    // Adaugă un ascultător de eveniment pentru clic pe linkul de înregistrare
    signupLink.addEventListener('click', function (event) {
        // Previne acțiunea implicită a linkului
        event.preventDefault();
        // Deschide modalul de înregistrare
        signupModal.show();
    });
</script>
<script src="{{asset('https://code.jquery.com/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.anime-carousel').owlCarousel({
            loop: true,
            margin: 20,
            nav: false,
            autoplay: true, // adaugă autoplay
            autoplayTimeout: 5000, // setează timeout-ul pentru autoplay la 5 secunde
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                },
                1300: {
                    items: 7
                }
            },
            navText: [ // adaugă butoanele prev și next
                "<i class='fa fa-chevron-left'></i>",
                "<i class='fa fa-chevron-right'></i>"
            ]
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('.filme-carousel').owlCarousel({
            loop: true,
            margin: 20,
            dots: false,
            nav: false,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                },
                1300: {
                    items: 5
                }
            }
        });
        var owl = $(".filme-carousel");
        owl.owlCarousel();
        $(".next-btn").click(function () {
            owl.trigger("next.owl.carousel");
        });
        $(".prev-btn").click(function () {
            owl.trigger("prev.owl.carousel");
        });
        $(".prev-btn").addClass("disabled");
        $(owl).on("translated.owl.carousel", function (event) {
            if ($(".owl-prev").hasClass("disabled")) {
                $(".prev-btn").addClass("disabled");
            } else {
                $(".prev-btn").removeClass("disabled");
            }
            if ($(".owl-next").hasClass("disabled")) {
                $(".next-btn").addClass("disabled");
            } else {
                $(".next-btn").removeClass("disabled");
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('.seriale-carousel').owlCarousel({
            loop: true,
            margin: 20,
            nav: true,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                },
                1300: {
                    items: 5
                }
            }
        });
        var owl = $(".seriale-carousel");
        owl.owlCarousel();
        $(".seriale-next-btn").click(function () {
            owl.trigger("next.owl.carousel");
        });
        $(".seriale-prev-btn").click(function () {
            owl.trigger("prev.owl.carousel");
        });
        $(".seriale-prev-btn").addClass("disabled");
        $(owl).on("translated.owl.carousel", function (event) {
            if ($(".owl-prev").hasClass("disabled")) {
                $(".prev-btn").addClass("disabled");
            } else {
                $(".prev-btn").removeClass("disabled");
            }
            if ($(".owl-next").hasClass("disabled")) {
                $(".next-btn").addClass("disabled");
            } else {
                $(".next-btn").removeClass("disabled");
            }
        });
    });
</script>
<script>
    function toggleDropdown() {
        var dropdownMenu = document.getElementById("dropdown-menu");
        dropdownMenu.classList.toggle("show");
    }
</script>
<script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js')}}"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>

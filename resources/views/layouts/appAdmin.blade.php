<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tourist Guide</title>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/roboto.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/material-fullpalette.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/ripples.min.css">
        <link href="{{ asset('css/slider.css') }}" rel="stylesheet">
        
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    
    <style>
            #login{
                color: red;
            } 
    </style>

    @yield('css')

</head>
<body>
    <div id="app">
        
        
        

        @yield('content')
    </div>
    
</body>

    

    
    <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/material.min.js') }}"></script>
    <script src="{{ asset('js/ripples.min.js') }}"></script>
    <script src="{{ asset('js/geocomplete.js') }}"></script>

    <script>
        $.material.init()
    </script>
    <!-- Scripts -->
    

    {{-- check to enable input --}}
    <script>
            $(function () {
                $("#bus").click(function () {
                    if ($(this).is(":checked")) {
                        $("#busrent").removeAttr("disabled");
                        $("#busrent").focus();
                    } else {
                        $("#busrent").attr("disabled", "disabled");
                    }
                });
                $("#train").click(function () {
                    if ($(this).is(":checked")) {
                        $("#trainrent").removeAttr("disabled");
                        $("#trainrent").focus();
                    } else {
                        $("#trainrent").attr("disabled", "disabled");
                    }
                });
                $("#air").click(function () {
                    if ($(this).is(":checked")) {
                        $("#airrent").removeAttr("disabled");
                        $("#airrent").focus();
                    } else {
                        $("#airrent").attr("disabled", "disabled");
                    }
                });
                $("#ship").click(function () {
                    if ($(this).is(":checked")) {
                        $("#shiprent").removeAttr("disabled");
                        $("#shiprent").focus();
                    } else {
                        $("#shiprent").attr("disabled", "disabled");
                    }
                });
    
                setTimeout(function() {
                    $('#successMessage').fadeOut('fast');
                    }, 1000);
                    
                    $("#successMessage").fadeTo(1000, 500).slideUp(500, function(){
                        $("#successMessage").alert('close');
                    });
            });
        </script>

        {{-- only one check box checked --}}
    <script>
        $('.PlaceType').click(function() {
            $('.PlaceType').not(this).prop('checked', false);
        }); 
    </script>
    
    {{-- place autocomplete --}}
    <script>
            
            function initAutocomplete() {
                var input = document.getElementById('autocompleteA');
                var searchBox = new google.maps.places.SearchBox(input);
                searchBox.addListener('places_changed', function() {
                    var places = searchBox.getPlaces();
                    
                    
                });
            }
    </script>
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmrAS_-ei8sdgIFHpKTFGp_xGtKfP5F2c&signed_in=true&libraries=places&callback=initMap" async defer></script>
    
    {{-- map --}}
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmrAS_-ei8sdgIFHpKTFGp_xGtKfP5F2c&libraries=places&callback=initAutocomplete" async defer></script>
    
    
    {{-- dynamic input field --}}
    <script type="text/javascript">
        $(function() {
            $('a.pl').click(function(e) {
                e.preventDefault();
                $('#hotel').append('<tr><td><input class="form-control" type="text" name="hotel_name[]" style="width: 110px; margin-right: 5px;" placeholder="Hotel Name"></td><td><select name="hotel_type[]" id="" class="form-control" style="background-color: #5bc0de;"><option value="">  Hotel Type</option><option value="High">High</option><option value="Medium">Medium</option><option value="Low">Low</option></select></td><td><input class="form-control" type="text" name="hotel_price[]" style="width: 50px; margin-left: 5px;" placeholder="500 Tk"></td></tr>');
            });
            $('a.mi').click(function (e) {
                e.preventDefault();
                if ($('#hotel input').length > 1) {
                    $('#hotel').children().last().remove();
                }
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    
    
    @yield('script')

    
</html>


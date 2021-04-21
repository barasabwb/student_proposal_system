<!doctype html>

<html>

<head>

    @include('includes.head')

</head>

<body>
@include('includes.adminheader')


        @yield('content')


    <footer class="row">

        @include('includes.footer')

    </footer>

</div>
<script>
    $("#menu-toggle").click(function(e) {

        e.preventDefault();
        $("#wrapper").toggleClass("toggled");

    });
    $("#formButton").click(function(){
        $("#form1").toggle();
    });
</script>


</body>

</html>

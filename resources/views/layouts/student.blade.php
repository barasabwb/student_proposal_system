<!doctype html>

<html>

<head>

    @include('includes.head')

</head>

<body>
@include('includes.students.studentheader')

    @yield('content')





<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
    $("#menu-toggle").click(function(e) {

        e.preventDefault();
        $("#wrapper").toggleClass("toggled");

    });
    $("#formButton").click(function(){
        $("#form1").toggle();
    });
</script>


    @include('includes.footer')


</body>

</html>

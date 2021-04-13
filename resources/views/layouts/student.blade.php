<!doctype html>

<html>

<head>

    @include('includes.head')

</head>

<body>
@include('includes.students.studentheader')

<div class="container-fluid">
    <h1 class="mt-4">STUDENT MODULE</h1>
    @yield('content')
    {{--            <p>The starting state of the menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will change.</p>--}}
    {{--            <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>. The top navbar is optional, and just for demonstration. Just create an element with the <code>#menu-toggle</code> ID which will toggle the menu when clicked.</p>--}}
</div>
</div>
<!-- /#page-content-wrapper -->

</div>


    <div id="main" class="row">



    </div>

    <footer class="row">

        @include('includes.footer')

    </footer>


<!-- /#wrapper -->

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {

        e.preventDefault();
        $("#wrapper").toggleClass("toggled");

    });
</script>


</body>

</html>


<!doctype html>

<html>

<head>

    @include('includes.head')

</head>

<body>
@include('includes.supervisors.supervisorheader')

@yield('content')


<div id="main" class="row">



</div>




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
    const dropdown = document.getElementsByClassName("dropdown-btn");
    let i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            const dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }
</script>


    @include('includes.footer')



</body>

</html>

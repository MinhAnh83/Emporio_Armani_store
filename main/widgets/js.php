    <!-- Script -->
    <script type="text/javascript">
$(document).ready(function() {
    $('.next').click(function() {
        $('.paginations').find('.page-numbers.active').next().addClass('active');
        $('.paginations').find('.page-numbers.active').prev().removeClass('active');
    })
    $('.prev').click(function() {
        $('.paginations').find('.page-numbers.active').prev().addClass('active');
        $('.paginations').find('.page-numbers.active').next().removeClass('active');
    })
})
    </script>
    <script src="public/src/js/jquery-3.3.1.min.js"></script>
    <script src="public/src/js/popper.min.js"></script>
    <script src="public/src/js/bootstrap.min.js"></script>
    <script src="public/src/js/jquery.sticky.js"></script>
    <script src="public/src/js/main.js"></script>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.4.0/mdb.min.js"></script>
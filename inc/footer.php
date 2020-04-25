<footer class="mt-5">
  <div class="container text-center" id="footer1">
    <div class="row ">
      <div class="col-md-8 mx-auto pt-4">
        <div class="d-flex flex-row justify-content-around align-items-center">

          <div>
            <a href="https://www.facebook.com/ranceviodkonoplje/" class="text-white">
              <i class="fab fa-2x fa-facebook"></i>
            </a>
          </div>
          <div>
            <a href="https://www.instagram.com/hemp_packs/" class="text-white">
              <i class="fab fa-2x fa-instagram"></i>
            </a>
          </div>
          <div>
            <a href="http://linkedin.com" class="text-white">
              <i class="fab fa-2x fa-linkedin"></i>
            </a>
          </div>

        </div>
      </div>
    </div>
    <div class="footer-copyright text-center text-white py-4">© 2020 Copyright: Milan Sumonja</div>

  </div>
</footer>


<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>



<script>
  'use strict';

  var numberOfItems = $("#content-row .item").length;
  var limitPerPage = 12;
  $("#content-row .item:gt(" + (limitPerPage - 1) + ")").hide();
  var totalPages = Math.ceil(numberOfItems / limitPerPage);

  $(".pagination").append("<li class='page-item current-page active'><a class='page-link' href='#'>" + 1 + "</a></li>");

  for (var i = 2; i <= totalPages; i++) {
    $(".pagination").append("<li class='page-item current-page'><a class='page-link' href='#'>" + i + "</a></li>")
  }

  $(".pagination").append("<li id='next-page' class='page-item'><a class='page-link' href='#'>Next</a></li>");

  $(".pagination li.current-page").on("click", function() {

    if ($(this).hasClass("active")) {
      return false;
    } else {

      var currentPage = $(this).index();
      $(".pagination li").removeClass("active");
      $(this).addClass("active");
      $("#content-row .item").hide();

      var grandTotal = limitPerPage * currentPage;

      for (var i = grandTotal - limitPerPage; i < grandTotal; i++) {
        $("#content-row .item:eq(" + i + ")").show();
      }
    }


  });

  $("#next-page").on("click", function() {
    var currentPage = $(".pagination li.active").index();
    if (currentPage == totalPages) {
      return false;
    } else {
      currentPage++;
      $(".pagination li").removeClass("active");
      $("#content-row .item").hide();

      var grandTotal = limitPerPage * currentPage;

      for (var i = grandTotal - limitPerPage; i < grandTotal; i++) {
        $("#content-row .item:eq(" + i + ")").show();
      }
      $(".pagination li.current-page:eq(" + (currentPage - 1) + ")").addClass("active");

    }
  });

  $("#previous-page").on("click", function() {
    var currentPage = $(".pagination li.active").index();
    if (currentPage == 1) {
      return false;
    } else {
      currentPage--;
      $(".pagination li").removeClass("active");
      $("#content-row .item").hide();

      var grandTotal = limitPerPage * currentPage;

      for (var i = grandTotal - limitPerPage; i < grandTotal; i++) {
        $("#content-row .item:eq(" + i + ")").show();
      }
      $(".pagination li.current-page:eq(" + (currentPage - 1) + ")").addClass("active");

    }
  });
</script>


<script>
  $(".navbar-toggler").on("click", function() {
    $(".cart-button").toggleClass("invisibleClass");
  });
</script>





</body>

</html>
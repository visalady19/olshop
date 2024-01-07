<!-- /.col-md-6 -->
</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</div>

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; Tugas Tecnopreneurship</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script>
  document.getElementById("search-button").addEventListener("click", function () {
      // Get the user's search input
      var searchTerm = document.getElementById("search-input").value;

      // Redirect to the search results page with the search term as a query parameter
      window.location.href = "<?php echo base_url('home/search?q='); ?>" + searchTerm;
  });

  // Get the search input field and search button
  var searchInput = document.getElementById("search-input");
    var searchButton = document.getElementById("search-button");

    // Add an event listener to the search input
    searchInput.addEventListener("keyup", function(event) {
        // Check if the Enter key (key code 13) is pressed
        if (event.keyCode === 13) {
            // Get the user's search input
            var searchTerm = searchInput.value;

            // Redirect to the search results page with the search term as a query parameter
            window.location.href = "<?php echo base_url('home/search?q='); ?>" + searchTerm;
        }
    });

    // Add an event listener to the search button
    searchButton.addEventListener("click", function() {
        // Get the user's search input
        var searchTerm = searchInput.value;

        // Redirect to the search results page with the search term as a query parameter
        window.location.href = "<?php echo base_url('home/search?q='); ?>" + searchTerm;
    });

  window.setTimeout(function(){
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove();
    });
  }, 3000)
</script>
</body>
</html>
<html lang="en">
  <!-- HEADER of the site -->
  <?php include 'header.php'; ?>
  
  <body>
    <!-- NAVIGATION of the site -->
    <?php include 'navbar.php'; ?>
    
    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>

          <!-- Intertion of the map -->
          <h1>ONGômetro</h1>
          <div id="map"></div>

          <div class="row">
           
          </div><!--/row-->
        </div><!--/span-->

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
          <div class="list-group">
            <a href="#" class="list-group-item active">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
          </div>
        </div><!--/span-->
      </div><!--/row-->

      <hr>
      <footer>
        <p>&copy; Company 2013</p>
      </footer>

    </div><!--/.container-->

    <script type="text/javascript">
     
    google.load('visualization', '1', {packages: ['geochart']});

    function drawVisualization() {
      var data = google.visualization.arrayToDataTable([
        ['State', 'Foo Factor'],
        ['BR-DF', 200],
        ['BR-AC', 300],
        ['BR-AL', 100],
        ['BR-AP', 150]
      ]);
     
      var geochart = new google.visualization.GeoChart(
        document.getElementById('map'));
        geochart.draw(data, {width: 800, height: 600, region: "BR", resolution: "provinces"});
        google.visualization.events.addListener(geochart, 'select', function() {
          var selection = geochart.getSelection();
          var row = selection[0].row; 
          var nomeEstado = data.getValue(row,0);
          
          alert(nomeEstado);
        });
      }
    
    google.setOnLoadCallback(drawVisualization);
      
    </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="dist/js/offcanvas.js"></script>
  </body>
</html>

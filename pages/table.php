<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Table Super Series</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
    <?php include('../fragment/navbar.php')?>
    <div class="fluid-container" style="margin-left: auto; margin-right: auto; width: 80%">
    <section class="content">
    <?php
          if(isset($_GET['pesan'])){
            if($_GET['pesan'] =="berhasil"){
              echo "<div class='alert alert-success' role='alert' align='center'>Selamat Datang Admin</div>";
            }
          }
  	?>
    <img src="https://upload.wikimedia.org/wikipedia/en/0/0e/BWF_Super_Series_Premier.png" alt="logoku" class="rounded mx-auto d-block" style="height: 10%; width: 10%;">
      <div class="container-fluid">
      <div class="card">
              <div class="card-header" style="margin-left: auto; margin-right: auto">
                <h2 class="card-title">Super Series Table</h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Player</th>
                      <th>MS</th>
                      <th>WS</th>s
                      <th>MD</th>
                      <th>WD</th>
                      <th>XD</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                      $connect = mysqli_connect("localhost", "root", "", "studi-kasus");
                      $fill = mysqli_query($connect, "select * from superseries");
                      while($f = mysqli_fetch_array($fill)){
                          ?>
                          <tr>
                              <td><?php echo $f['Player']; ?></td>
                              <td><?php echo $f['MS']; ?></td>
                              <td><?php echo $f['WS']; ?></td>
                              <td><?php echo $f['MD']; ?></td>
                              <td><?php echo $f['WD']; ?></td>
                              <td><?php echo $f['XD']; ?></td>
                              <td><?php echo $f['Total']; ?></td>
                          </tr>
                        <?php
                      }
                      ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
      </div><!-- /.container-fluid -->
    </section>
    </div>
    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/blog-home.css" rel="stylesheet">

  </head>

  <body>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <h1 class="my-4">PradosBlog </h1>
          <?php foreach($posts as $post) : ?>
              <!-- Blog Post -->
              <div class="card mb-4">
                <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
                <div class="card-body">
                  <h2 class="card-title"> <?= $post->titular?> </h2>
                  <p class="card-text"> <?= $post->texto?> </p>
                </div>
                <div class="card-footer text-muted">
                  <?= $post->creado?>
                </div>
              </div>
          <?php endforeach; ?>
          

          <!-- Pagination -->
          <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
              <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">Newer &rarr;</a>
            </li>
          </ul>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-2">

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                <?php foreach($categorias as $categoria) : ?>
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href ="index.php?r=site/categoria&id=<?=$categoria->id?>"> <?= $categoria->nombre?> </a>
                    </li>
                  </ul>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
        <!-- Sidebar Widgets Column -->
        <div class="col-md-2">

          <!-- Autores Widget -->
          <div class="card my-4">
            <h5 class="card-header">Autores</h5>
            <div class="card-body">
              <div class="row">
                <?php foreach($users as $user) : ?>
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href ="index.php?r=site/user&id=<?=$user->id?>"> <?= $user->username?> </a>
                    </li>
                  </ul>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>

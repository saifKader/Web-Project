<?php require 'header.php'; ?>

  <!-- store -->
  <section id="store" class="store py-5">
    <div class="container">
      <!-- section title -->
      <div class="row">
        <div class="col-10 mx-auto col-sm-6 text-center">
          <h1 class="text-capitalize">more <strong class="banner-title ">Products</strong></h1>
        </div>
      </div>
      <!-- end of section title -->
      <!--filter buttons -->
      <div class="row">
        <div class=" col-lg-8 mx-auto d-flex justify-content-around my-2 sortBtn flex-wrap">
          <a href="#store" class="btn btn-outline-secondary btn-black text-uppercase filter-btn m-2" data-filter="all"> all</a>
          
        </div>
      </div>
      <!-- search box -->
      <div class="row">

        <div class="col-10 mx-auto col-md-6">
          <form>
            <div class="input-group mb-3">
              <div class="input-group-prepend ">
                <span class="input-group-text search-box" id="search-icon"><i class="fas fa-search"></i></span>
              </div>
              <input type="text" class="form-control" placeholder='item....' id="search-item">
            </div>

          </form>
        </div>
      </div>
      <!--end of filter buttons -->
      <!-- store  items-->
      <script>
        document.getElementById("search-item").addEventListener("keyup", (e)=>{
if (e.key =="Enter") {
console.log(document.getElementById("search-item").value)
  window.location.href = "index.php?searchByName=" +  document.getElementById("search-item").value;

}

        })
        </script>
      <?php 
                                    
                                    $products ;
                                    
                                    if (isset($_GET["searchByName"])){

                                        $cat = '%' . $_GET["searchByName"] . '%';
                                        $products = $DB->query('SELECT * FROM products where `name` like :cat ;', array("cat"=>$cat));
                                    } else {
                                        $products = $DB->query('SELECT * FROM products;');
                                    }
                                    
                                    
        
                                    ?>
        

  
      <div class=" row mx-auto  store-item sweets" data-item="sweets">
      <?php foreach ($products as $product): ?>
          <div style="width: 20rem;" class="card ml-3 shadow-lg p-3 mb-5 bg-white rounded">
            <div class="img-container">
              <img style="height: 250px;" src="back/images/products/<?= $product->id ?>.jpg" class="card-img-top store-img" alt="">
              <span class="store-item-icon">
                <a href="addpanier.php?id=<?= $product->id; ?>">
                <i class="fas fa-shopping-cart"></i>
                add
              </a>
              </span>
              </div>
            
            <div class="card-body">
              <div class="card-text d-flex justify-content-between text-capitalize">
                <h5 id="store-item-name"><?= $product->name; ?></h5>
                <h5 class="store-item-value">$ <strong id="store-item-price" class="font-weight-bold">
                  <?= number_format ($product->price,2); ?></strong></h5>

              </div>
            </div>


          </div> 
          <!--###########################################-->
            
          <?php endforeach ?>
          <!-- end of card-->
        </div>
        <!--end of single store item-->
       


  <!-- modal-container -->
  <div class="container-fluid ">
    <div class="row lightbox-container align-items-center">
      <div class="col-10 col-md-10 mx-auto text-right lightbox-holder">
        <span class="lightbox-close"><i class="fas fa-window-close"></i></span>
        <div class="lightbox-item"></div>
        <span class="lightbox-control btnLeft"><i class="fas fa-caret-left"></i></span>
        <span class="lightbox-control btnRight"><i class="fas fa-caret-right"></i></span>
      </div>

    </div>
  </div>


  <!-- jquery -->
  <script src="js/jquery-3.3.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.bundle.min.js"></script>
  <!-- script js -->
  <script src="js/app.js"></script>
</body>

</html>
<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add New Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
        <!-- Form Start -->
        <?php 
        if(isset($_POST['save'])){
            include("config.php");
            $category_id =
            $category_name = $_POST['category_name'];
            $query = "INSERT INTO category(category_name) VALUES('$category_name')";
            $result = mysqli_query($connection,$query);
            if($result){   
               header("location: category.php");
            }

            
        }
        
        ?>
                  <form action="" method="POST" autocomplete="off">
              
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="category_name" class="form-control" placeholder="Category Name" required>
                      </div>
                      <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                  </form>
                  <!-- /Form End -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>

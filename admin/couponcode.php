<?php include 'inc/header.php'; ?>
<?php include 'inc/menubar.php'; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
          <li class="breadcrumb-item active">Coupon</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <!-- your main code here -->
        <div class="row">
            <div class="col-lg-5">
                <!-- add form for a new brand -->
                <div class="card">
                    <div class="card-body">

                      <h5 class="card-title">Set a new Coupon Code</h5>
                        <form method="POST" enctype="multipart/form-data" action="core/insert.php">
                            <div class="form-group mb-3">
                                <label>Set Code</label>
                                <input type="text" name="coupon_code" placeholder="Enter a brand name ..." class="form-control" id="coupon" />
                                <!-- <small id="random_number"></small> -->
                                <button class="btn btn-md btn-success mt-3" id="generate_string">Generate Random</button>
                            </div>
                            <div class="form-group">
                              <label>Enter Discount Amount</label>
                              <input type="number" name="amount" placeholder="Discount Amount" class="form-control" />
                            </div>
                            <div class="form-group mt-3">
                              <label>Select Discount Type</label>
                              <select class="form-control" name="discount_type">
                                <option value="1" selected>Percentage Discount (%)</option>
                                <option value="0">Fixed discount on total price</option>
                              </select>
                            </div>
                            <div class="row mt-3">
                              <div class="col-lg-6">
                                  <div class="form-group">
                                    <label>Starting Date</label>
                                    <input type="date" name="starting_date" class="form-control">
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="form-group">
                                    <label>Ending Date</label>
                                    <input type="date" name="expire_date" class="form-control">
                                  </div>
                              </div>
                            </div>
                            <div class="form-group mt-3">
                               <label>Discount On</label>
                                <select class="form-control" name="dis_on_type" onchange="showList(this.value)">
                                  <option value="0">Select from here</option>
                                  <option value="1">Specific Product</option>
                                  <option value="2">Specific Category</option>
                                  <option value="3">Specific Brand</option>
                                  <option value="4">All Products</option>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label>Select your desire options</label>
                                <!-- ajax -->
                                <select id="discounton" class="form-control" name="discounton[]" multiple>
                                    
                                </select>
                                <small>Press CRTL for multiple select</small>
                            </div>
                            <div>
                                <input type="submit" name="add_coupon" value="Add a new brand" class="btn btn-md btn-danger mt-3" /> 
                                
                            </div>
                        </form>

                        <script type="text/javascript">
                          // Declare all required characters
const all_characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

let randomNumber = document.querySelector('#random_number');
let generateStringBtn = document.querySelector('#generate_string');

const generateRandomString = (length) => {
    let result_string = '';
    const characters_length = all_characters.length;
    for (let i = 0; i < length; i++ ) {
        result_string += all_characters.charAt(Math.floor(Math.random() * characters_length));
    }
    
    return result_string;
}
document.getElementById('coupon').value = generateRandomString(8);
randomNumber.innerHTML = generateRandomString(8);

// Generate String on button click
generateStringBtn.addEventListener('click', () => randomNumber.innerHTML = generateRandomString(8));
                        </script>
                          
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <!-- show all brands info -->
                <div>
                    <div class="card">
            <div class="card-body">
              <h5 class="card-title">Coupon List</h5>

              <!-- Table with hoverable rows -->
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Code</th>
                    <th scope="col">Stating</th>
                    <th scope="col">Ending</th>
                    <th scope="col">Discount On</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  
               <?php 

               $serial = 0;

               $all_coupons = "SELECT * FROM mart_coupon";
               $all_coupons_res = mysqli_query($db,$all_coupons);

               while($row = mysqli_fetch_assoc($all_coupons_res)){
                  $ID             = $row['ID'];
                  $coupon         = $row['coupon'];
                  $amount         = $row['amount'];
                  $dis_type       = $row['dis_type'];
                  $starting_date  = $row['starting_date'];
                  $expire_date    = $row['expire_date'];
                  $dis_on_type    = $row['dis_on_type'];
                  $discount_on    = $row['discount_on'];
                  $serial++;
                  ?>
                  <tr>
                    <td><?php echo $serial;?></td>
                    <td>
                      <?php 
                      if($dis_type == 1){
                        $type = '%';
                      }
                      if($dis_type == 0){
                        $type = 'flat';
                      }
                        echo $coupon.'('.$type.')';
                        ?>
                    </td>
                    <td><?php echo $starting_date;?></td>
                    <td><?php echo $expire_date;?></td>
                    <td>
                      <?php 
                      if($dis_on_type == 1){
                        echo '<span class="badge bg-success">Specific Product</span>';
                      }
                      if($dis_on_type == 2){
                        echo '<span class="badge bg-success">Category</span>';
                      }
                      if($dis_on_type == 3){
                        echo '<span class="badge bg-success">Brand</span>';
                      }
                      if($dis_on_type == 4){
                        echo '<span class="badge bg-success">All Products</span>';
                      }
                      ?>
                    </td>
                    <td>
                      <a href="couponcode.php?delete_id=<?php echo $ID;?>"><i class="bi bi-trash text-danger"></i></a>
                    </td>
                  </tr>
                  <?php
               }

               ?>


                
                 
                </tbody>
              </table>

            </div>
          </div>
                </div>

    <?php 

        if(isset($_GET['delete_id'])){
            $delid = $_GET['delete_id'];

            delete('mart_coupon','ID',$delid,'couponcode.php');

        }
    
    ?>
            </div>
        </div>
    </section>

  </main><!-- End #main -->

  <script>
    function showList(value){
      if (value == "") {
        document.getElementById("discounton").innerHTML = "";
        return;
      } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("discounton").innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET","ajax/getcouponon.php?q="+value,true);
        xmlhttp.send();
      }
    }
  </script>

<?php include 'inc/footer.php'; ?>
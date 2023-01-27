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
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group mb-3">
                                <label>Set Code</label>
                                <input type="text" name="brand_name" placeholder="Enter a brand name ..." class="form-control" id="coupon" />
                                <!-- <small id="random_number"></small> -->
                                <button class="btn btn-md btn-success mt-3" id="generate_string">Generate Random</button>
                            </div>
                            <div class="form-group">
                              <label>Enter Discount Amount</label>
                              <input type="number" name="amount" placeholder="Discount Amount" class="form-control" />
                            </div>
                            <div class="form-group mt-3">
                              <label>Select Discount Type</label>
                              <select class="form-control">
                                <option value="1" selected>Percentage Discount (%)</option>
                                <option value="0">Fixed discount on total price</option>
                              </select>
                            </div>
                            <div class="row mt-3">
                              <div class="col-lg-6">
                                  <div class="form-group">
                                    <label>Starting Date</label>
                                    <input type="date" name="" class="form-control">
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="form-group">
                                    <label>Ending Date</label>
                                    <input type="date" name="" class="form-control">
                                  </div>
                              </div>
                            </div>
                            <div class="form-group mt-3">
                               <label>Discount On</label>
                                <select class="form-control">
                                  <option value="1" selected>Specific Product</option>
                                  <option >Specific Category</option>
                                  <option >Specific Brand</option>
                                </select>
                            </div>
                            <div>
                                <input type="submit" name="add_brand" value="Add a new brand" class="btn btn-md btn-danger mt-3" /> 
                                
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
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  
               
                
                 
                </tbody>
              </table>

            </div>
          </div>
                </div>
            </div>
        </div>
    </section>

  </main><!-- End #main -->

<?php include 'inc/footer.php'; ?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/menubar.php'; ?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
        <li class="breadcrumb-item active">Users</li>
      </ol>
    </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
      <!-- your main code here -->
      <?php
      $data = isset($_GET['data']) ? $_GET['data'] : 'view';
      if($data == 'view'){
        ?>
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">All Users Information</h5>
              
              <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                <div class="dataTable-top">
                  <div class="dataTable-dropdown">
                    <label>
                      <select class="dataTable-selector">
                        <option value="5">5</option>
                        <option value="10" selected="">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="25">25</option>
                      </select> entries per page</label>
                    </div>
                    <div class="dataTable-search">
                      <input class="dataTable-input" placeholder="Search..." type="text">
                    </div>
                  </div>
                  <div class="dataTable-container">
                    <table class="table datatable dataTable-table">
                      <thead>
                        <tr>
                          <th scope="col" style="width: 3%;">#</th>
                          <th scope="col" data-sortable="" style="width: 10%;"><a href="#" class="dataTable-sorter">Image</a></th>
                          <th scope="col" data-sortable="" style="width: 20%;"><a href="#" class="dataTable-sorter">Name</a></th>
                          <th scope="col" data-sortable="" style="width: 13%;"><a href="#" class="dataTable-sorter">Email</a></th>
                          <th scope="col" data-sortable="" style="width: 13%;"><a href="#" class="dataTable-sorter">Phone</a></th>
                          <th scope="col" data-sortable="" style="width: 21%;"><a href="#" class="dataTable-sorter">address</a></th>
                          <th scope="col" data-sortable="" style="width: 10%;"><a href="#" class="dataTable-sorter">Status</a></th>
                          <th scope="col" style="width: 10%;">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 

                        $serial = 0;
                        $users = mysqli_query($db,"SELECT * FROM mart_users");
                        while($row = mysqli_fetch_assoc($users)){
                            $id             = $row['ID'];
                            $firstname      = $row['firstname'];
                            $lastname       = $row['lastname'];
                            $username       = $row['username'];
                            $email          = $row['email'];
                            $pass           = $row['pass'];
                            $address        = $row['address'];
                            $photo          = $row['photo'];
                            $phone          = $row['phone'];
                            $status          = $row['status'];

                            $serial++;
                            ?>
                            <tr>
                              <td><?php echo $serial;?></td>
                              <td>
                                <?php 
                            if(empty($photo)){
                                ?>
                                <img src="assets/img/products/brand/letter-b.png" width="50"/>
                                <?php
                            }else{
                                ?>
                                <img src="assets/img/users/<?php echo $photo;?>" width="50">
                                <?php
                            }
                            ?>
                              </td>
                              <td><?php echo $username;?></td>
                              <td><?php echo $email;?></td>
                              <td><?php echo $phone;?></td>
                              <td><?php echo $address;?></td>
                              <td>
                                <?php 
                            if($status == 1){
                                echo '<span class="badge bg-success">Active</span>';
                            }else{
                                echo '<span class="badge bg-danger">Inactive</span>'; 
                            }
                            ?>
                              </td>
                              <td>
                                <a href="users.php?data=edit&editid=<?php echo $id;?>"><i class="bi bi-pencil-square text-dark"></i></a>
                              <a href="" data-bs-toggle="modal" data-bs-target="#deleteid<?php echo $id;?>"><i class="bi bi-trash text-danger"></i></a>
                                    <!-- Modal -->
                              <div class="modal fade" id="deleteid<?php echo $id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center py-5">
                                        <h2 class="mb-2">Are you sure?</h2>
                                        <a class="btn btn-md btn-danger" href="users.php?data=delete&deleteid=<?php echo $id;?>">Confirm</a>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                    </div>
                                </div>
                              </div>
                              </td>
                            </tr>
                            <?php
                        }

                        ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="dataTable-bottom">
                    <div class="dataTable-info">Showing 1 to 5 of 5 entries</div>
                    <nav class="dataTable-pagination">
                    <ul class="dataTable-pagination-list"></ul></nav>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
      }
      if($data == 'add'){
      ?>
      <form method="POST" enctype="multipart/form-data" action="core/insert.php">
          <div class="row" style="overflow-x: hidden;">
            <div class="col-lg-9">
              <div class="card p-3">
                <div class="card-body">
                  <div class="form-group mb-3">
                    <label>User Name</label>
                    <input type="text" placeholder="User Name" class="form-control" name="user-name" required>
                  </div>
                  <div class="form-group mb-3">
                    <label>User Email</label>
                    <input type="email" placeholder="User Email" class="form-control" name="user-email" required>
                  </div>
                  
                  <div class="row mb-3">
                    <div class="col-md-6"> 
                      <label for="inputEmail5" class="form-label">Set Password</label> 
                      <input type="text" class="form-control" id="generatePass" name="password" required>
                      <button class="btn btn-md btn-success mt-3" id="generate_string">Generate Password</button>

                    </div>
                    <div class="col-md-6"> 
                      <label for="inputEmail5" class="form-label">Phone</label> 
                      <input type="number" class="form-control" id="inputEmail5" name="phone">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <textarea rows="4" class="form-control" placeholder="Short Address" name="address">
                      
                    </textarea>
                  </div>
                  <div class="form-group mb-3">
                    <div class="image-input c-img">
                        <p class="mb-2 d-inline-block">Upload Images</p><br>
                        <input type="file" id="choose-file" name="choose-file" accept="image/*"  />
                        <label for="choose-file">Select File</label>
                        <div id="img-preview"></div>
                    </div>
                  </div>
                  <div class="my-3">
                    <input type="submit" class="btn btn-md btn-md btn-success rounded-1 text-light" value="Add New User" name="add_user">
                  </div>
                </div>
              </div>
            </div>
          
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
document.getElementById('generatePass').value = generateRandomString(8);
randomNumber.innerHTML = generateRandomString(8);

// Generate String on button click
generateStringBtn.addEventListener('click', () => randomNumber.innerHTML = generateRandomString(8));
                        </script>
      <?php
      }
      if($data == 'edit'){
      
      }
      if($data == 'update'){
        
      }
      if($data == 'delete'){
        if(isset($_GET['deleteid'])){
            $deleteid = $_GET['deleteid'];
            // delete category image
            delete_file('photo','mart_users','ID',$deleteid,'assets/img/users/');

            delete('mart_users','ID',$deleteid,'users.php');
          }
      }
      
      ?>
      </section>
      </main><!-- End #main -->
      <?php include 'inc/footer.php'; ?>
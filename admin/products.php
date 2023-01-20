<?php include 'inc/header.php'; ?>
<?php include 'inc/menubar.php'; ?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
        <li class="breadcrumb-item active">Products</li>
      </ol>
    </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
      <!-- your main code here -->
      <?php
      $data = isset($_GET['data']) ? $_GET['data'] : 'view';
      if($data == 'view'){
      // view
      ?>
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">All Products</h5>
              
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
                          <th scope="col" data-sortable="" style="width: 10%;"><a href="#" class="dataTable-sorter">Price</a></th>
                          <th scope="col" data-sortable="" style="width: 13%;"><a href="#" class="dataTable-sorter">Category</a></th>
                          <th scope="col" data-sortable="" style="width: 15%;"><a href="#" class="dataTable-sorter">Brand</a></th>
                          <th scope="col" data-sortable="" style="width: 9%;"><a href="#" class="dataTable-sorter">Quantity</a></th>
                          <th scope="col" data-sortable="" style="width: 10%;"><a href="#" class="dataTable-sorter">Status</a></th>
                          <th scope="col" style="width: 10%;">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Brandon Jacob</td>
                          <td>Designer</td>
                          <td>28</td>
                          <td>28</td>
                          <td>28</td>
                          <td>28</td>
                          <td>28</td>
                          <td>2016-05-25</td>
                        </tr>
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
        // add
        ?>
        <form method="POST" enctype="multipart/form-data" action="">
          <div class="row" style="overflow-x: hidden;">
            <div class="col-lg-9">
              <div class="card p-3">
                <div class="card-body">
                  <div class="form-group mb-3">
                    <label>Product Name</label>
                    <input type="text" placeholder="Product Name" class="form-control" name="">
                  </div>
                  <div class="form-group mb-3">
                    <label>Product Description</label>
                      <div class="ql-toolbar ql-snow">
                        <!-- <span class="ql-formats">
                          <span class="ql-font ql-picker">
                            <span class="ql-picker-label" tabindex="0" role="button" aria-expanded="false" aria-controls="ql-picker-options-1">
                              <svg viewBox="0 0 18 18">
                                <polygon class="ql-stroke" points="7 11 9 13 11 11 7 11"></polygon>
                                <polygon class="ql-stroke" points="7 7 9 5 11 7 7 7"></polygon>
                              </svg>
                            </span>
                            <span class="ql-picker-options" aria-hidden="true" tabindex="-1" id="ql-picker-options-1">
                              <span tabindex="0" role="button" class="ql-picker-item"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="serif"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="monospace"></span>
                            </span>
                          </span>
                          <select class="ql-font" style="display: none;">
                            <option selected="selected"></option>
                            <option value="serif"></option>
                            <option value="monospace"></option>
                          </select>
                          <span class="ql-size ql-picker">
                            <span class="ql-picker-label" tabindex="0" role="button" aria-expanded="false" aria-controls="ql-picker-options-2">
                              <svg viewBox="0 0 18 18">
                                <polygon class="ql-stroke" points="7 11 9 13 11 11 7 11"></polygon>
                                <polygon class="ql-stroke" points="7 7 9 5 11 7 7 7"></polygon>
                              </svg>
                            </span>
                            <span class="ql-picker-options" aria-hidden="true" tabindex="-1" id="ql-picker-options-2">
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="small"></span>
                              <span tabindex="0" role="button" class="ql-picker-item"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="large"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="huge"></span>
                            </span>
                          </span>
                          <select class="ql-size" style="display: none;">
                            <option value="small"></option>
                            <option selected="selected"></option>
                            <option value="large"></option>
                            <option value="huge"></option>
                          </select>
                        </span>
                        <span class="ql-formats">
                          <button type="button" class="ql-bold">
                            <svg viewBox="0 0 18 18">
                              <path class="ql-stroke" d="M5,4H9.5A2.5,2.5,0,0,1,12,6.5v0A2.5,2.5,0,0,1,9.5,9H5A0,0,0,0,1,5,9V4A0,0,0,0,1,5,4Z"></path>
                              <path class="ql-stroke" d="M5,9h5.5A2.5,2.5,0,0,1,13,11.5v0A2.5,2.5,0,0,1,10.5,14H5a0,0,0,0,1,0,0V9A0,0,0,0,1,5,9Z"></path>
                            </svg>
                          </button>
                          <button type="button" class="ql-italic">
                            <svg viewBox="0 0 18 18">
                              <line class="ql-stroke" x1="7" x2="13" y1="4" y2="4"></line>
                              <line class="ql-stroke" x1="5" x2="11" y1="14" y2="14"></line>
                              <line class="ql-stroke" x1="8" x2="10" y1="14" y2="4"></line>
                            </svg>
                          </button>
                          <button type="button" class="ql-underline">
                            <svg viewBox="0 0 18 18">
                              <path class="ql-stroke" d="M5,3V9a4.012,4.012,0,0,0,4,4H9a4.012,4.012,0,0,0,4-4V3"></path>
                              <rect class="ql-fill" height="1" rx="0.5" ry="0.5" width="12" x="3" y="15"></rect>
                            </svg>
                          </button>
                          <button type="button" class="ql-strike">
                            <svg viewBox="0 0 18 18">
                              <line class="ql-stroke ql-thin" x1="15.5" x2="2.5" y1="8.5" y2="9.5"></line>
                              <path class="ql-fill" d="M9.007,8C6.542,7.791,6,7.519,6,6.5,6,5.792,7.283,5,9,5c1.571,0,2.765.679,2.969,1.309a1,1,0,0,0,1.9-.617C13.356,4.106,11.354,3,9,3,6.2,3,4,4.538,4,6.5a3.2,3.2,0,0,0,.5,1.843Z"></path>
                              <path class="ql-fill" d="M8.984,10C11.457,10.208,12,10.479,12,11.5c0,0.708-1.283,1.5-3,1.5-1.571,0-2.765-.679-2.969-1.309a1,1,0,1,0-1.9.617C4.644,13.894,6.646,15,9,15c2.8,0,5-1.538,5-3.5a3.2,3.2,0,0,0-.5-1.843Z"></path>
                            </svg>
                          </button>
                        </span>
                        <span class="ql-formats">
                          <span class="ql-color ql-picker ql-color-picker">
                            <span class="ql-picker-label" tabindex="0" role="button" aria-expanded="false" aria-controls="ql-picker-options-3">
                              <svg viewBox="0 0 18 18">
                                <line class="ql-color-label ql-stroke ql-transparent" x1="3" x2="15" y1="15" y2="15"></line>
                                <polyline class="ql-stroke" points="5.5 11 9 3 12.5 11"></polyline>
                                <line class="ql-stroke" x1="11.63" x2="6.38" y1="9" y2="9"></line>
                              </svg>
                            </span>
                            <span class="ql-picker-options" aria-hidden="true" tabindex="-1" id="ql-picker-options-3">
                              <span tabindex="0" role="button" class="ql-picker-item ql-primary"></span>
                              <span tabindex="0" role="button" class="ql-picker-item ql-primary" data-value="#e60000" style="background-color: rgb(230, 0, 0);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item ql-primary" data-value="#ff9900" style="background-color: rgb(255, 153, 0);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item ql-primary" data-value="#ffff00" style="background-color: rgb(255, 255, 0);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item ql-primary" data-value="#008a00" style="background-color: rgb(0, 138, 0);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item ql-primary" data-value="#0066cc" style="background-color: rgb(0, 102, 204);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item ql-primary" data-value="#9933ff" style="background-color: rgb(153, 51, 255);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#ffffff" style="background-color: rgb(255, 255, 255);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#facccc" style="background-color: rgb(250, 204, 204);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#ffebcc" style="background-color: rgb(255, 235, 204);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#ffffcc" style="background-color: rgb(255, 255, 204);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#cce8cc" style="background-color: rgb(204, 232, 204);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#cce0f5" style="background-color: rgb(204, 224, 245);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#ebd6ff" style="background-color: rgb(235, 214, 255);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#bbbbbb" style="background-color: rgb(187, 187, 187);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#f06666" style="background-color: rgb(240, 102, 102);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#ffc266" style="background-color: rgb(255, 194, 102);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#ffff66" style="background-color: rgb(255, 255, 102);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#66b966" style="background-color: rgb(102, 185, 102);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#66a3e0" style="background-color: rgb(102, 163, 224);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#c285ff" style="background-color: rgb(194, 133, 255);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#888888" style="background-color: rgb(136, 136, 136);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#a10000" style="background-color: rgb(161, 0, 0);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#b26b00" style="background-color: rgb(178, 107, 0);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#b2b200" style="background-color: rgb(178, 178, 0);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#006100" style="background-color: rgb(0, 97, 0);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#0047b2" style="background-color: rgb(0, 71, 178);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#6b24b2" style="background-color: rgb(107, 36, 178);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#444444" style="background-color: rgb(68, 68, 68);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#5c0000" style="background-color: rgb(92, 0, 0);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#663d00" style="background-color: rgb(102, 61, 0);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#666600" style="background-color: rgb(102, 102, 0);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#003700" style="background-color: rgb(0, 55, 0);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#002966" style="background-color: rgb(0, 41, 102);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#3d1466" style="background-color: rgb(61, 20, 102);"></span>
                            </span>
                          </span>
                          <select class="ql-color" style="display: none;">
                            <option selected="selected"></option>
                            <option value="#e60000"></option>
                            <option value="#ff9900"></option>
                            <option value="#ffff00"></option>
                            <option value="#008a00"></option>
                            <option value="#0066cc"></option>
                            <option value="#9933ff"></option>
                            <option value="#ffffff"></option>
                            <option value="#facccc"></option>
                            <option value="#ffebcc"></option>
                            <option value="#ffffcc"></option>
                            <option value="#cce8cc"></option>
                            <option value="#cce0f5"></option>
                            <option value="#ebd6ff"></option>
                            <option value="#bbbbbb"></option>
                            <option value="#f06666"></option>
                            <option value="#ffc266"></option>
                            <option value="#ffff66"></option>
                            <option value="#66b966"></option>
                            <option value="#66a3e0"></option>
                            <option value="#c285ff"></option>
                            <option value="#888888"></option>
                            <option value="#a10000"></option>
                            <option value="#b26b00"></option>
                            <option value="#b2b200"></option>
                            <option value="#006100"></option>
                            <option value="#0047b2"></option>
                            <option value="#6b24b2"></option>
                            <option value="#444444"></option>
                            <option value="#5c0000"></option>
                            <option value="#663d00"></option>
                            <option value="#666600"></option>
                            <option value="#003700"></option>
                            <option value="#002966"></option>
                            <option value="#3d1466"></option>
                          </select>
                          <span class="ql-background ql-picker ql-color-picker">
                            <span class="ql-picker-label" tabindex="0" role="button" aria-expanded="false" aria-controls="ql-picker-options-4">
                              <svg viewBox="0 0 18 18">
                                <g class="ql-fill ql-color-label">
                                  <polygon points="6 6.868 6 6 5 6 5 7 5.942 7 6 6.868"></polygon>
                                  <rect height="1" width="1" x="4" y="4"></rect>
                                  <polygon points="6.817 5 6 5 6 6 6.38 6 6.817 5"></polygon>
                                  <rect height="1" width="1" x="2" y="6"></rect>
                                  <rect height="1" width="1" x="3" y="5"></rect>
                                  <rect height="1" width="1" x="4" y="7"></rect>
                                  <polygon points="4 11.439 4 11 3 11 3 12 3.755 12 4 11.439"></polygon>
                                  <rect height="1" width="1" x="2" y="12"></rect>
                                  <rect height="1" width="1" x="2" y="9"></rect>
                                  <rect height="1" width="1" x="2" y="15"></rect>
                                  <polygon points="4.63 10 4 10 4 11 4.192 11 4.63 10"></polygon>
                                  <rect height="1" width="1" x="3" y="8"></rect>
                                  <path d="M10.832,4.2L11,4.582V4H10.708A1.948,1.948,0,0,1,10.832,4.2Z"></path>
                                  <path d="M7,4.582L7.168,4.2A1.929,1.929,0,0,1,7.292,4H7V4.582Z"></path>
                                  <path d="M8,13H7.683l-0.351.8a1.933,1.933,0,0,1-.124.2H8V13Z"></path>
                                  <rect height="1" width="1" x="12" y="2"></rect>
                                  <rect height="1" width="1" x="11" y="3"></rect>
                                  <path d="M9,3H8V3.282A1.985,1.985,0,0,1,9,3Z"></path>
                                  <rect height="1" width="1" x="2" y="3"></rect>
                                  <rect height="1" width="1" x="6" y="2"></rect>
                                  <rect height="1" width="1" x="3" y="2"></rect>
                                  <rect height="1" width="1" x="5" y="3"></rect>
                                  <rect height="1" width="1" x="9" y="2"></rect>
                                  <rect height="1" width="1" x="15" y="14"></rect>
                                  <polygon points="13.447 10.174 13.469 10.225 13.472 10.232 13.808 11 14 11 14 10 13.37 10 13.447 10.174"></polygon>
                                  <rect height="1" width="1" x="13" y="7"></rect>
                                  <rect height="1" width="1" x="15" y="5"></rect>
                                  <rect height="1" width="1" x="14" y="6"></rect>
                                  <rect height="1" width="1" x="15" y="8"></rect>
                                  <rect height="1" width="1" x="14" y="9"></rect>
                                  <path d="M3.775,14H3v1H4V14.314A1.97,1.97,0,0,1,3.775,14Z"></path>
                                  <rect height="1" width="1" x="14" y="3"></rect>
                                  <polygon points="12 6.868 12 6 11.62 6 12 6.868"></polygon>
                                  <rect height="1" width="1" x="15" y="2"></rect>
                                  <rect height="1" width="1" x="12" y="5"></rect>
                                  <rect height="1" width="1" x="13" y="4"></rect>
                                  <polygon points="12.933 9 13 9 13 8 12.495 8 12.933 9"></polygon>
                                  <rect height="1" width="1" x="9" y="14"></rect>
                                  <rect height="1" width="1" x="8" y="15"></rect>
                                  <path d="M6,14.926V15H7V14.316A1.993,1.993,0,0,1,6,14.926Z"></path>
                                  <rect height="1" width="1" x="5" y="15"></rect>
                                  <path d="M10.668,13.8L10.317,13H10v1h0.792A1.947,1.947,0,0,1,10.668,13.8Z"></path>
                                  <rect height="1" width="1" x="11" y="15"></rect>
                                  <path d="M14.332,12.2a1.99,1.99,0,0,1,.166.8H15V12H14.245Z"></path>
                                  <rect height="1" width="1" x="14" y="15"></rect>
                                  <rect height="1" width="1" x="15" y="11"></rect>
                                </g>
                                <polyline class="ql-stroke" points="5.5 13 9 5 12.5 13"></polyline>
                                <line class="ql-stroke" x1="11.63" x2="6.38" y1="11" y2="11"></line>
                              </svg>
                            </span>
                            <span class="ql-picker-options" aria-hidden="true" tabindex="-1" id="ql-picker-options-4">
                              <span tabindex="0" role="button" class="ql-picker-item ql-primary" data-value="#000000" style="background-color: rgb(0, 0, 0);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item ql-primary" data-value="#e60000" style="background-color: rgb(230, 0, 0);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item ql-primary" data-value="#ff9900" style="background-color: rgb(255, 153, 0);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item ql-primary" data-value="#ffff00" style="background-color: rgb(255, 255, 0);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item ql-primary" data-value="#008a00" style="background-color: rgb(0, 138, 0);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item ql-primary" data-value="#0066cc" style="background-color: rgb(0, 102, 204);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item ql-primary" data-value="#9933ff" style="background-color: rgb(153, 51, 255);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#facccc" style="background-color: rgb(250, 204, 204);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#ffebcc" style="background-color: rgb(255, 235, 204);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#ffffcc" style="background-color: rgb(255, 255, 204);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#cce8cc" style="background-color: rgb(204, 232, 204);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#cce0f5" style="background-color: rgb(204, 224, 245);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#ebd6ff" style="background-color: rgb(235, 214, 255);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#bbbbbb" style="background-color: rgb(187, 187, 187);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#f06666" style="background-color: rgb(240, 102, 102);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#ffc266" style="background-color: rgb(255, 194, 102);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#ffff66" style="background-color: rgb(255, 255, 102);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#66b966" style="background-color: rgb(102, 185, 102);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#66a3e0" style="background-color: rgb(102, 163, 224);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#c285ff" style="background-color: rgb(194, 133, 255);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#888888" style="background-color: rgb(136, 136, 136);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#a10000" style="background-color: rgb(161, 0, 0);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#b26b00" style="background-color: rgb(178, 107, 0);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#b2b200" style="background-color: rgb(178, 178, 0);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#006100" style="background-color: rgb(0, 97, 0);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#0047b2" style="background-color: rgb(0, 71, 178);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#6b24b2" style="background-color: rgb(107, 36, 178);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#444444" style="background-color: rgb(68, 68, 68);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#5c0000" style="background-color: rgb(92, 0, 0);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#663d00" style="background-color: rgb(102, 61, 0);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#666600" style="background-color: rgb(102, 102, 0);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#003700" style="background-color: rgb(0, 55, 0);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#002966" style="background-color: rgb(0, 41, 102);"></span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="#3d1466" style="background-color: rgb(61, 20, 102);"></span>
                            </span>
                          </span>
                          <select class="ql-background" style="display: none;">
                            <option value="#000000"></option>
                            <option value="#e60000"></option>
                            <option value="#ff9900"></option>
                            <option value="#ffff00"></option>
                            <option value="#008a00"></option>
                            <option value="#0066cc"></option>
                            <option value="#9933ff"></option>
                            <option selected="selected"></option>
                            <option value="#facccc"></option>
                            <option value="#ffebcc"></option>
                            <option value="#ffffcc"></option>
                            <option value="#cce8cc"></option>
                            <option value="#cce0f5"></option>
                            <option value="#ebd6ff"></option>
                            <option value="#bbbbbb"></option>
                            <option value="#f06666"></option>
                            <option value="#ffc266"></option>
                            <option value="#ffff66"></option>
                            <option value="#66b966"></option>
                            <option value="#66a3e0"></option>
                            <option value="#c285ff"></option>
                            <option value="#888888"></option>
                            <option value="#a10000"></option>
                            <option value="#b26b00"></option>
                            <option value="#b2b200"></option>
                            <option value="#006100"></option>
                            <option value="#0047b2"></option>
                            <option value="#6b24b2"></option>
                            <option value="#444444"></option>
                            <option value="#5c0000"></option>
                            <option value="#663d00"></option>
                            <option value="#666600"></option>
                            <option value="#003700"></option>
                            <option value="#002966"></option>
                            <option value="#3d1466"></option>
                          </select>
                        </span>
                        <span class="ql-formats">
                          <button type="button" class="ql-script" value="super">
                            <svg viewBox="0 0 18 18">
                              <path class="ql-fill" d="M15.5,7H13.861a4.015,4.015,0,0,0,1.914-2.975,1.8,1.8,0,0,0-1.6-1.751A1.922,1.922,0,0,0,12.021,3.7a0.5,0.5,0,1,0,.957.291,0.917,0.917,0,0,1,1.053-.725,0.81,0.81,0,0,1,.744.762c0,1.077-1.164,1.925-1.934,2.486A1.423,1.423,0,0,0,12,7.5a0.5,0.5,0,0,0,.5.5h3A0.5,0.5,0,0,0,15.5,7Z"></path>
                              <path class="ql-fill" d="M9.651,5.241a1,1,0,0,0-1.41.108L6,7.964,3.759,5.349a1,1,0,1,0-1.519,1.3L4.683,9.5,2.241,12.35a1,1,0,1,0,1.519,1.3L6,11.036,8.241,13.65a1,1,0,0,0,1.519-1.3L7.317,9.5,9.759,6.651A1,1,0,0,0,9.651,5.241Z"></path>
                            </svg>
                          </button>
                          <button type="button" class="ql-script" value="sub">
                            <svg viewBox="0 0 18 18">
                              <path class="ql-fill" d="M15.5,15H13.861a3.858,3.858,0,0,0,1.914-2.975,1.8,1.8,0,0,0-1.6-1.751A1.921,1.921,0,0,0,12.021,11.7a0.50013,0.50013,0,1,0,.957.291h0a0.914,0.914,0,0,1,1.053-.725,0.81,0.81,0,0,1,.744.762c0,1.076-1.16971,1.86982-1.93971,2.43082A1.45639,1.45639,0,0,0,12,15.5a0.5,0.5,0,0,0,.5.5h3A0.5,0.5,0,0,0,15.5,15Z"></path>
                              <path class="ql-fill" d="M9.65,5.241a1,1,0,0,0-1.409.108L6,7.964,3.759,5.349A1,1,0,0,0,2.192,6.59178Q2.21541,6.6213,2.241,6.649L4.684,9.5,2.241,12.35A1,1,0,0,0,3.71,13.70722q0.02557-.02768.049-0.05722L6,11.036,8.241,13.65a1,1,0,1,0,1.567-1.24277Q9.78459,12.3777,9.759,12.35L7.316,9.5,9.759,6.651A1,1,0,0,0,9.65,5.241Z"></path>
                            </svg>
                          </button>
                        </span>
                        <span class="ql-formats">
                          <button type="button" class="ql-list" value="ordered">
                            <svg viewBox="0 0 18 18">
                              <line class="ql-stroke" x1="7" x2="15" y1="4" y2="4"></line>
                              <line class="ql-stroke" x1="7" x2="15" y1="9" y2="9"></line>
                              <line class="ql-stroke" x1="7" x2="15" y1="14" y2="14"></line>
                              <line class="ql-stroke ql-thin" x1="2.5" x2="4.5" y1="5.5" y2="5.5"></line>
                              <path class="ql-fill" d="M3.5,6A0.5,0.5,0,0,1,3,5.5V3.085l-0.276.138A0.5,0.5,0,0,1,2.053,3c-0.124-.247-0.023-0.324.224-0.447l1-.5A0.5,0.5,0,0,1,4,2.5v3A0.5,0.5,0,0,1,3.5,6Z"></path>
                              <path class="ql-stroke ql-thin" d="M4.5,10.5h-2c0-.234,1.85-1.076,1.85-2.234A0.959,0.959,0,0,0,2.5,8.156"></path>
                              <path class="ql-stroke ql-thin" d="M2.5,14.846a0.959,0.959,0,0,0,1.85-.109A0.7,0.7,0,0,0,3.75,14a0.688,0.688,0,0,0,.6-0.736,0.959,0.959,0,0,0-1.85-.109"></path>
                            </svg>
                          </button>
                          <button type="button" class="ql-list" value="bullet">
                            <svg viewBox="0 0 18 18">
                              <line class="ql-stroke" x1="6" x2="15" y1="4" y2="4"></line>
                              <line class="ql-stroke" x1="6" x2="15" y1="9" y2="9"></line>
                              <line class="ql-stroke" x1="6" x2="15" y1="14" y2="14"></line>
                              <line class="ql-stroke" x1="3" x2="3" y1="4" y2="4"></line>
                              <line class="ql-stroke" x1="3" x2="3" y1="9" y2="9"></line>
                              <line class="ql-stroke" x1="3" x2="3" y1="14" y2="14"></line>
                            </svg>
                          </button>
                          <button type="button" class="ql-indent" value="-1">
                            <svg viewBox="0 0 18 18">
                              <line class="ql-stroke" x1="3" x2="15" y1="14" y2="14"></line>
                              <line class="ql-stroke" x1="3" x2="15" y1="4" y2="4"></line>
                              <line class="ql-stroke" x1="9" x2="15" y1="9" y2="9"></line>
                              <polyline class="ql-stroke" points="5 7 5 11 3 9 5 7"></polyline>
                            </svg>
                          </button>
                          <button type="button" class="ql-indent" value="+1">
                            <svg viewBox="0 0 18 18">
                              <line class="ql-stroke" x1="3" x2="15" y1="14" y2="14"></line>
                              <line class="ql-stroke" x1="3" x2="15" y1="4" y2="4"></line>
                              <line class="ql-stroke" x1="9" x2="15" y1="9" y2="9"></line>
                              <polyline class="ql-fill ql-stroke" points="3 7 3 11 5 9 3 7"></polyline>
                            </svg>
                          </button>
                        </span>
                        <span class="ql-formats">
                          <button type="button" class="ql-direction">
                            <svg viewBox="0 0 18 18">
                              <polygon class="ql-stroke ql-fill" points="3 11 5 9 3 7 3 11"></polygon>
                              <line class="ql-stroke ql-fill" x1="15" x2="11" y1="4" y2="4"></line>
                              <path class="ql-fill" d="M11,3a3,3,0,0,0,0,6h1V3H11Z"></path>
                              <rect class="ql-fill" height="11" width="1" x="11" y="4"></rect>
                              <rect class="ql-fill" height="11" width="1" x="13" y="4"></rect>
                            </svg>
                            <svg viewBox="0 0 18 18">
                              <polygon class="ql-stroke ql-fill" points="15 12 13 10 15 8 15 12"></polygon>
                              <line class="ql-stroke ql-fill" x1="9" x2="5" y1="4" y2="4"></line>
                              <path class="ql-fill" d="M5,3A3,3,0,0,0,5,9H6V3H5Z"></path>
                              <rect class="ql-fill" height="11" width="1" x="5" y="4"></rect>
                              <rect class="ql-fill" height="11" width="1" x="7" y="4"></rect>
                            </svg>
                          </button>
                          <span class="ql-align ql-picker ql-icon-picker">
                            <span class="ql-picker-label" tabindex="0" role="button" aria-expanded="false" aria-controls="ql-picker-options-5">
                              <svg viewBox="0 0 18 18">
                                <line class="ql-stroke" x1="3" x2="15" y1="9" y2="9"></line>
                                <line class="ql-stroke" x1="3" x2="13" y1="14" y2="14"></line>
                                <line class="ql-stroke" x1="3" x2="9" y1="4" y2="4"></line>
                              </svg>
                            </span>
                            <span class="ql-picker-options" aria-hidden="true" tabindex="-1" id="ql-picker-options-5">
                              <span tabindex="0" role="button" class="ql-picker-item">
                                <svg viewBox="0 0 18 18">
                                  <line class="ql-stroke" x1="3" x2="15" y1="9" y2="9"></line>
                                  <line class="ql-stroke" x1="3" x2="13" y1="14" y2="14"></line>
                                  <line class="ql-stroke" x1="3" x2="9" y1="4" y2="4"></line>
                                </svg>
                              </span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="center">
                                <svg viewBox="0 0 18 18">
                                  <line class="ql-stroke" x1="15" x2="3" y1="9" y2="9"></line>
                                  <line class="ql-stroke" x1="14" x2="4" y1="14" y2="14"></line>
                                  <line class="ql-stroke" x1="12" x2="6" y1="4" y2="4"></line>
                                </svg>
                              </span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="right">
                                <svg viewBox="0 0 18 18">
                                  <line class="ql-stroke" x1="15" x2="3" y1="9" y2="9"></line>
                                  <line class="ql-stroke" x1="15" x2="5" y1="14" y2="14"></line>
                                  <line class="ql-stroke" x1="15" x2="9" y1="4" y2="4"></line>
                                </svg>
                              </span>
                              <span tabindex="0" role="button" class="ql-picker-item" data-value="justify">
                                <svg viewBox="0 0 18 18">
                                  <line class="ql-stroke" x1="15" x2="3" y1="9" y2="9"></line>
                                  <line class="ql-stroke" x1="15" x2="3" y1="14" y2="14"></line>
                                  <line class="ql-stroke" x1="15" x2="3" y1="4" y2="4"></line>
                                </svg>
                              </span>
                            </span>
                          </span>
                          <select class="ql-align" style="display: none;">
                            <option selected="selected"></option>
                            <option value="center"></option>
                            <option value="right"></option>
                            <option value="justify"></option>
                          </select>
                        </span>
                        <span class="ql-formats">
                          <button type="button" class="ql-link">
                            <svg viewBox="0 0 18 18">
                              <line class="ql-stroke" x1="7" x2="11" y1="7" y2="11"></line>
                              <path class="ql-even ql-stroke" d="M8.9,4.577a3.476,3.476,0,0,1,.36,4.679A3.476,3.476,0,0,1,4.577,8.9C3.185,7.5,2.035,6.4,4.217,4.217S7.5,3.185,8.9,4.577Z"></path>
                              <path class="ql-even ql-stroke" d="M13.423,9.1a3.476,3.476,0,0,0-4.679-.36,3.476,3.476,0,0,0,.36,4.679c1.392,1.392,2.5,2.542,4.679.36S14.815,10.5,13.423,9.1Z"></path>
                            </svg>
                          </button>
                          <button type="button" class="ql-image">
                            <svg viewBox="0 0 18 18">
                              <rect class="ql-stroke" height="10" width="12" x="3" y="4"></rect>
                              <circle class="ql-fill" cx="6" cy="7" r="1"></circle>
                              <polyline class="ql-even ql-fill" points="5 12 5 11 7 9 8 10 11 7 13 9 13 12 5 12"></polyline>
                            </svg>
                          </button>
                          <button type="button" class="ql-video">
                            <svg viewBox="0 0 18 18">
                              <rect class="ql-stroke" height="12" width="12" x="3" y="3"></rect>
                              <rect class="ql-fill" height="12" width="1" x="5" y="3"></rect>
                              <rect class="ql-fill" height="12" width="1" x="12" y="3"></rect>
                              <rect class="ql-fill" height="2" width="8" x="5" y="8"></rect>
                              <rect class="ql-fill" height="1" width="3" x="3" y="5"></rect>
                              <rect class="ql-fill" height="1" width="3" x="3" y="7"></rect>
                              <rect class="ql-fill" height="1" width="3" x="3" y="10"></rect>
                              <rect class="ql-fill" height="1" width="3" x="3" y="12"></rect>
                              <rect class="ql-fill" height="1" width="3" x="12" y="5"></rect>
                              <rect class="ql-fill" height="1" width="3" x="12" y="7"></rect>
                              <rect class="ql-fill" height="1" width="3" x="12" y="10"></rect>
                              <rect class="ql-fill" height="1" width="3" x="12" y="12"></rect>
                            </svg>
                          </button>
                        </span> -->
                        <!-- <span class="ql-formats">
                          <button type="button" class="ql-clean">
                            <svg class="" viewBox="0 0 18 18">
                              <line class="ql-stroke" x1="5" x2="13" y1="3" y2="3"></line>
                              <line class="ql-stroke" x1="6" x2="9.35" y1="12" y2="3"></line>
                              <line class="ql-stroke" x1="11" x2="15" y1="11" y2="15"></line>
                              <line class="ql-stroke" x1="15" x2="11" y1="11" y2="15"></line>
                              <rect class="ql-fill" height="1" rx="0.5" ry="0.5" width="7" x="2" y="14"></rect>
                            </svg>
                          </button>
                        </span> -->
                      </div>
                      <div class="quill-editor-full ql-container ql-snow" style="min-height: 300px;">
                        <div class="ql-editor" data-gramm="false" contenteditable="true">
                          <p>Hello World!</p>
                          <p>This is Quill <strong>full</strong> editor </p>
                        </div>
                        <div class="ql-clipboard" contenteditable="true" tabindex="-1"></div>
                        <div class="ql-tooltip ql-hidden">
                          <a class="ql-preview" rel="noopener noreferrer" target="_blank" href="about:blank"></a>
                          <input type="text" data-formula="e=mc^2" data-link="https://quilljs.com" data-video="Embed URL" name="short_description">
                          <a class="ql-action"></a>
                          <a class="ql-remove"></a>
                        </div>
                      </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-md-6"> 
                      <label for="inputEmail5" class="form-label">Regular Price</label> <input type="number" class="form-control" id="inputEmail5" name="regular_price">
                    </div>
                    <div class="col-md-6"> 
                      <label for="inputEmail5" class="form-label">Offer Price</label> 
                      <input type="number" class="form-control" id="inputEmail5" name="offer_price">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Product Short Description</label>
                    <textarea rows="4" class="form-control" placeholder="Short Description" name="short_description">
                      
                    </textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="card p-3">
                <div class="card-body">
                  <div class="form-group mb-3">
                    <label class="mb-2">Select Category</label>
                    <select class="form-control" name="category">
                      <?php 
                        $category_sql = "SELECT * FROM mart_category WHERE c_status='1'";
                        $category_res = mysqli_query($db,$category_sql);
                        $serial = 0;
                        while($row = mysqli_fetch_assoc($category_res)){
                            $cat_id     = $row['ID'];
                            $cat_name   = $row['c_name'];
                            $cat_parent = $row['is_parent'];
                            ?>
                            <option value="<?php echo $cat_id;?>"><?php echo $cat_name;?></option>
                            <?php
                        }
                      ?>
                    </select>
                  </div>
                  <div class="form-group mb-3">
                    <label class="mb-2">Select Brand</label>
                    <select class="form-control" name="category">
                      <?php 
                        $allBrandsSql = "SELECT * FROM mart_brand WHERE b_status='1'";
                $allBrandsSqlResult = mysqli_query($db, $allBrandsSql);
                while($row = mysqli_fetch_assoc($allBrandsSqlResult)){
                    $brand_id       = $row['ID'];
                    $brand_name     = $row['b_name'];
                    $brand_logo     = $row['b_logo'];
                    $brand_status   = $row['b_status'];
                   
                            ?>
                            <option value="<?php echo $brand_id;?>"><?php echo $brand_name;?></option>
                            <?php
                        }
                      ?>
                    </select>
                  </div>
                  <div class="form-group mb-3">
                    <div class="image-input c-img">
                        <small class="mb-2 d-inline-block">Select Featured Images</small><br>
                        <input type="file" id="choose-file" name="choose-file" accept="image/*"/>
                        <label for="choose-file">Select File</label>
                        <div id="img-preview"></div>
                    </div>
                  </div>
                  <div class="form-group multimg">
                    <label class="mb-3">Select Gallery Images</label>
                    <input type="file" id="files" name="files" multiple>
                  </div>

                  <div class="my-3">
                    <input type="submit" class="btn btn-md btn-lg btn-info rounded-1 text-light" value="Publish" name="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
  
        <?php
        }
        if($data == 'edit'){
        // edit
        }
        if($data == 'update'){
        // update
        }
        if($data == 'delete'){
        // detele
        }
        
        ?>
      </section>
      </main><!-- End #main -->
      <?php include 'inc/footer.php'; ?>
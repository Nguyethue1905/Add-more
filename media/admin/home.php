<body class="dashboard dashboard_1">
   <div class="full_container">
      <div class="inner_container">

         <div id="content">
            <div class="midde_cont">
               <div class="container-fluid">
                  <div class="row column_title">
                     <div class="col-md-12">
                        <div class="page_title">
                           <h2>Dashboard</h2>
                        </div>
                     </div>
                  </div>

                  <div class="row column1">
                     <div class="col-md-6 col-lg-3">
                        <div class="full counter_section margin_bottom_30">
                           <div class="couter_icon">
                              <div>
                                 <i class="fa fa-comments-o red_color"></i>
                              </div>
                           </div>
                           <div class="counter_no">
                              <div>
                                 <p class="total_no">54</p>
                                 <p class="head_couter">Lượt Share</p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-lg-3">
                        <div class="full counter_section margin_bottom_30">
                           <div class="couter_icon">
                              <div>
                                 <i class="fa fa-comments-o red_color"></i>
                              </div>
                           </div>
                           <div class="counter_no">
                              <div>
                                 <p class="total_no">54</p>
                                 <p class="head_couter">Comments</p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-lg-3">
                        <div class="full counter_section margin_bottom_30">
                           <div class="couter_icon">
                              <div>
                                 <i class="fa fa-user yellow_color"></i>
                              </div>
                           </div>
                           <?php
                           $listuser = new home();
                           $selecct =  $listuser->getCount();
                           foreach ($selecct as $item) {
                              echo '
                           <div class="counter_no">
                              <div>
                                 <p class="total_no">'. $item['count'].'</p>
                                 <p class="head_couter">user</p>
                              </div>
                           </div>
                           ';
                           }
                           ?>
                        </div>
                     </div>
                     <div class="col-md-6 col-lg-3">
                        <div class="full counter_section margin_bottom_30">
                           <div class="couter_icon">
                              <div>
                                 <i class="fa fa-user yellow_color"></i>
                              </div>
                           </div>
                           <div class="counter_no">
                              <div>
                                 <p class="total_no">2500</p>
                                 <p class="head_couter">Lượt Yêu thích</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <!-- graph -->
                  <div class="row column2 graph margin_bottom_30">
                     <div class="col-md-l2 col-lg-12">
                        <div class="white_shd full">
                           <div class="full graph_head">
                              <div class="heading1 margin_0">
                                 <h2>Extra Area Chart</h2>
                              </div>
                           </div>
                           <div class="full graph_revenue">
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="content">

                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- end graph -->
               </div>
               <!-- footer -->
            </div>
         </div>
      </div>
   </div>
   <!-- jQuery -->

</body>

</html>
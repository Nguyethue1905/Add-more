<body class="dashboard dashboard_1">
   <div class="full_container">
      <div class="inner_container">
         <div id="content">
            <div class="midde_cont">
               <div class="container-fluid">
                  <div class="row column_title">
                     <div class="col-md-12">
                        <div class="page_title">
                           <h2>BlackList</h2>
                        </div>
                     </div>
                  </div>
                  <div class="row column2 graph margin_bottom_30">
                     <div class="col-md-l2 col-lg-12">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Danh Sách Tài Khoản Bị Khóa</h2>

                                 </div>
                              </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                    <table class="table">
                                       <thead>
                                          <tr>
                                          <tr>
                                             <th class="font-weight-bold">#</th>
                                             <th class="font-weight-bold">Mã tài khoản</th>
                                             <th class="font-weight-bold">Tài khoản</th>

                                             <th class="font-weight-bold">Mật Khâủ</th>
                                             </th>
                                             <th class="font-weight-bold">Email</th>                                             
                                          </tr>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <?php
                                          $tl = 1;
                                          $listuser = new User();
                                          $selecct =$listuser->getUser();
                                          foreach ($selecct as $item) {
                                            $user_status = $item['user_status'];
                                            if($user_status == 3)
                                             echo '
                                             <tr>
                                                <td>'.$tl++.'</td>
                                                <td>'.$item['user_id'].'</td>
                                                <td>'.$item['username'].'</td>
                                                <td>'.$item['password'].'</td>
                                                <td>'.$item['email'].'</td>
                                                <td>
                                                    <form action="" method="post">
                                                    <a href="index.php?act=unlock&id='.$item['user_id'].'"><button type="button" class="btn btn-info">Mở khóa</button></a>
                                                    </form>
                                                    </td>
                                               </tr>
                                          ';
                                    
                                         
                                        }

                                      
                                          ?>     
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- footer -->
            </div>
            <!-- end dashboard inner -->
         </div>
      </div>
   </div>
   <!-- jQuery -->
   <script src="js/jquery.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <!-- wow animation -->
   <script src="js/animate.js"></script>
   <!-- select country -->
   <script src="js/bootstrap-select.js"></script>
   <!-- owl carousel -->
   <script src="js/owl.carousel.js"></script>
   <!-- chart js -->
   <script src="js/Chart.min.js"></script>
   <script src="js/Chart.bundle.min.js"></script>
   <script src="js/utils.js"></script>
   <script src="js/analyser.js"></script>
   <!-- nice scrollbar -->
   <script src="js/perfect-scrollbar.min.js"></script>
   <script>
      var ps = new PerfectScrollbar('#sidebar');
   </script>
   <!-- custom js -->
   <script src="js/chart_custom_style1.js"></script>
   <script src="js/custom.js"></script>
</body>

</html>
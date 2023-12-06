<body class="dashboard dashboard_1">
   <div class="full_container">
      <div class="inner_container">

         <div id="content">

            <div class="midde_cont">
               <div class="container-fluid">
                  <div class="row column_title">
                     <div class="col-md-12">
                        <div class="page_title">
                           <h2>Quản Lý Bài Đăng</h2>
                        </div>
                     </div>
                  </div>

                  <div class="row column2 graph margin_bottom_30">
                     <div class="col-md-l2 col-lg-12">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Quản Lý Bài Đăng</h2>
                                 </div>
                              </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                    <table class="table">
                                       <thead>
                                          <tr>
                                          <th class="font-weight-bold">STT</th>
                                             <th class="font-weight-bold">Tên Người Đăng</th>
                                             <th class="font-weight-bold">Số Lượng</th>
                                             
                                             <th></th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <?php
                                          $tl = 1;
                                          $listuser = new post();
                                          $selecct =  $listuser->getCount();
                                          foreach ($selecct as $item) {
                                             $count = $item['count'];
                                             if ($count == 0){
                                                echo"";
                                             }else{
                                             echo '
                                          <tr>
                                          <td>' . $tl++ . '</td>
                                             <td>' . $item['username'] . '</td>
                                             <td>' . $item['count'] . '</td>
                                             <td><a href="index.php?act=Ct_Post&id=' . $item['user_id'] . '"><button type="button" style="margin-left: 5%;" class="btn btn-info">Chi Tiết</button></a></td>
                                          </tr>
                                          ';
                                       }
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
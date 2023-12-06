<body class="dashboard dashboard_1">
   <div class="full_container">
      <div class="inner_container">
         <div id="content">
            <div class="midde_cont">
               <div class="container-fluid">
                  <div class="row column_title">
                     <div class="col-md-12">
                        <div class="page_title">
                           <h2>Quản Lý Tài khoản</h2>

                        </div>
                     </div>
                  </div>
                  <div class="row column2 graph margin_bottom_30">
                     <div class="col-md-l2 col-lg-12">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Quản Lý Tài khoản</h2>
                                    <a href="index.php?act=black"> <button type="button" class="btn btn-success" style="background-color: #508D69; margin-left: 504%;">BlackList</button></a>
                                 </div>
                              </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                    <table class="table">
                                       <thead>
                                          <tr>
                                          <tr>
                                             <th class="font-weight-bold">#</th>
                                             <th class="font-weight-bold">Tài khoản</th>

                                             <th class="font-weight-bold">Mật Khẩu</th>
                                             </th>
                                             <th class="font-weight-bold">Email</th>
                                             <th class="font-weight-bold">Thông tin</th>
                                             
                                          </tr>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <?php
                                          $listuser = new User();
                                          $selecct =$listuser->getUser();
                                          foreach($selecct as $item){
                                             $user_status = $item['user_status'];
                                             if ($user_status == 3){
                                               echo "";
                                             }else{
                                                echo ' <tr>
                                                <td>'.$item['user_id'].'</td>
                                                <td>'.$item['username'].'</td>
                                                <td>'.$item['password'].'</td>
                                                <td>'.$item['email'].'</td>
                                                <td><a href="index.php?act=Ct_user&id='.$item['user_id'].'"><button type="button" class="btn btn-info">Xem</button></a></td>
                                               </tr>';
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
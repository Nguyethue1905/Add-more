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
                                 <i class="fa-solid fa-comments fa-beat-fade" style="color: #f8300d;"></i>
                              </div>
                           </div>
                           <?php
                           $listuser = new home();
                           $selecct =  $listuser->getCountposts();
                           foreach ($selecct as $item) {
                              echo '
                           <div class="counter_no">
                              <div>
                                 <p class="total_no">' . $item['count'] . '</p>
                                 <p class="head_couter">Comment</p>
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
                                 <i class="fa-solid fa-address-card fa-beat-fade" style="color: #fd9149;"></i>
                              </div>
                           </div>
                           <?php
                           $listuser = new home();
                           $selecct =  $listuser->getCountposts();
                           foreach ($selecct as $item) {
                              echo '
                           <div class="counter_no">
                              <div>
                                 <p class="total_no">' . $item['count'] . '</p>
                                 <p class="head_couter">Posts</p>
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
                                 <i class="fa-solid fa-user-large fa-beat-fade" style="color: #41f8fb;"></i>
                              </div>
                           </div>
                           <?php
                           $listuser = new home();
                           $selecct =  $listuser->getCount();
                           foreach ($selecct as $item) {
                              echo '
                           <div class="counter_no">
                              <div>
                                 <p class="total_no">' . $item['count'] . '</p>
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
                                 <h2>Thông Kế giới tính của tất cả User</h2>
                              </div>
                           </div>
                           <div class="full graph_revenue">
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="area_chart">
                                       <?php
                                       $db = new home();
                                       $result = $db->getCountgander();
                                       // var_dump($resuft); exit();
                                       // Kiểm tra và xử lý kết quả
                                       if ($result > 0) {
                                          // Khởi tạo mảng để lưu dữ liệu từ cơ sở dữ liệu
                                          $roles = array();
                                          $totals = array();

                                          // Đọc dữ liệu từ kết quả truy vấn
                                          foreach ($result as $row) {
                                             $roles[] = $row['gander']; // Lưu vai trò (role) vào mảng nhãn
                                             $totals[] = $row['total']; // Lưu tổng số vào mảng dữ liệu
                                          }

                                          // Chuyển đổi mảng thành chuỗi JSON để sử dụng trong biểu đồ
                                          $roles_json = json_encode($roles);
                                          $totals_json = json_encode($totals);
                                       } else {
                                          echo "Không có dữ liệu từ cơ sở dữ liệu.";
                                       }

                                       ?>
                                       <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                       <canvas id="myChart" width="800" height="400"></canvas>

                                       <script>
                                          var roles = <?php echo $roles_json; ?>;
                                          var totals = <?php echo $totals_json; ?>;

                                          var ctx = document.getElementById('myChart').getContext('2d');
                                          var myChart = new Chart(ctx, {
                                             type: 'bar',
                                             data: {
                                                labels: roles,
                                                datasets: [{
                                                   label: 'Thông Kế giới tính của tất cả User',
                                                   data: totals,
                                                   backgroundColor: [
                                                      'rgba(54, 162, 235, 0.5)',
                                                      'rgba(255, 99, 132, 0.5)'
                                                   ],
                                                   borderColor: [
                                                      'rgba(54, 162, 235, 0.5)',
                                                      'rgba(255, 99, 132, 0.5)'
                                                   ],
                                                   borderWidth: 1,
                                                   barThickness: 60
                                                }]
                                             },
                                             options: {
                                                scales: {
                                                   y: {
                                                      beginAtZero: true
                                                   }
                                                }
                                             }
                                          });
                                       </script>
                                    </div>'
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
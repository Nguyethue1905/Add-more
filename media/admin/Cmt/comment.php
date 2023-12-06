<div class="full_container">


   <div id="content">

      <div class="midde_cont">
         <div class="container-fluid">
            <div class="row column_title">
               <div class="col-md-12">
                  <div class="page_title">
                     <h2>Quản Lý Bình Luận</h2>
                  </div>
               </div>
            </div>

            <div class="row column2 graph margin_bottom_30">
               <div class="col-md-l2 col-lg-12">
                  <div class="col-md-12">
                     <div class="white_shd full margin_bottom_30">
                        <div class="full graph_head">
                           <div class="heading1 margin_0">
                              <h2>Quản Lý Bình Luận</h2>
                           </div>
                        </div>
                        <div class="table_section padding_infor_info">
                           <div class="table-responsive-sm">
                              <table class="table">
                                 <thead>
                                    <tr>
                                    <th class="font-weight-bold">STT</th>
                                       <th class="font-weight-bold">Id Người Đăng</th>
                                       <th class="font-weight-bold">Nội Dung Bài Đăng</th>
                                       <th class="font-weight-bold">Số Lượng</th>
                                       <th></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                    $tl = 1;
                                    $listuser = new comment();
                                    $selecct =  $listuser->getCount();
                                    foreach ($selecct as $item) {
                                       $count = $item['count'];
                                       if ($count == 0){
                                          echo"";
                                       }else{
                                       echo '
                                    <tr>
                                       <td>' . $tl++ . '</td>
                                       <td>' . $item['posts_id'] . '</td>
                                       <td>' . $item['content'] . '</td>
                                       <td>' . $item['count'] . '</td>
                                       <td>
                                       <a href="index.php?act=Ct_cmt&id=' . $item['posts_id'] . '"><button type="button" class="btn btn-info">Chi Tiết</button></a>
                                       </td>
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
      </div>
   </div>
</div>
</div>
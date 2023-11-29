

<body class="dashboard dashboard_1">
    <div class="full_container">
        <div class="inner_container">
           
            <div id="content">
                <div class="row column2 graph margin_bottom_30">
                    <div class="col-md-l2 col-lg-12">
                        <div class="col-md-12">
                            <div class="white_shd full margin_bottom_30">
                                <div class="full graph_head">
                                    <div class="heading1 margin_0">
                                        <h2>Chi Tiết Bài Post</h2>
                                    </div>
                                </div>
                                <div class="table_section padding_infor_info">
                                    <div class="table-responsive-sm">
                                        <table class="table">
                                            <thead></thead>
                                            <tr>
                                                <th class="font-weight-bold">Người Post</th>
                                                <th class="font-weight-bold">Ảnh</th>
                                                <th class="font-weight-bold">Cap</th>
                                                <th class="font-weight-bold">Thời Gian</th>
                                                <th class="font-weight-bold">Xóa</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                 $user_id = $_GET['id'];
                                                 $listuser = new post();
                                                 $selecct =  $listuser->getList($user_id);
                                                 foreach ($selecct as $item ) {
                                                    echo '
                                                <tr>
                                                    <td>'.$item['username'].'</td>
                                                    <td></td>
                                                    <td>'.$item['content'].'</td>
                                                    <td>'.$item['date_post'].'</td>
                                                    <td><a href="index.php?act=xoa&id='.$item['posts_id'].'"><button type="button" class="btn btn-danger">Xóa</button></a></td>
                                                </tr>
                                                ';}
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
</body>

</html>
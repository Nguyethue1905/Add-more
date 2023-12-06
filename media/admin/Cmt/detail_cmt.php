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
                                        <h2>Chi Tiết Bình Luận</h2>
                                    </div>
                                </div>
                                <div class="table_section padding_infor_info">
                                    <div class="table-responsive-sm">
                                        <table class="table">
                                            <thead></thead>
                                            <tr>
                                                <th class="font-weight-bold">Stt</th>
                                                <th class="font-weight-bold">Người Bình Luận</th>
                                                <th class="font-weight-bold">Nội Dung</th>
                                                <th class="font-weight-bold">Thời Gian</th>
                                                <th class="font-weight-bold">Xóa</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $tl = 1;
                                                $posts_id = $_GET['id'];
                                                $comment = new comment();
                                                $get = $comment->getList($posts_id);
                                                foreach ($get as $item) {
                                                    $cmt_status = $item ['cmt_status'];
                                                    if ($cmt_status == 'Active'){
                                                        echo '
                                                        <tr>
                                                        <td>' . $tl++ . '</td>
                                                            <td>' . $item['username'] . '</td>
                                                            <td>' . $item['comment'] . '</td>
                                                            <td>' . $item['date_cmt'] . '</td>
                                                            <td><a href="index.php?act=del&id='.$item['cmt_id'].'&id_pt='.$posts_id.'"><button type="button" class="btn btn-danger">Ẩn</button></a></td>
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
</body>

</html>
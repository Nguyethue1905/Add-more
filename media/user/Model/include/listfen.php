<?php
$db = new profile();
$select = $db->getList($user_id);
?>
<div class="col-lg-3">
    <aside class="sidebar static">
        <div class="widget">
            <h4 class="widget-title">Trang cá nhân</h4>
            <div class="your-page">
                <figure>
                    <a href="#" title="">
                        <?php
                        $user_id = $_SESSION['id'];
                        $db = new profile();
                        $select = $db->getImg($user_id);
                        $avatar = $select['avatar'] ?? "";
                        if ($avatar == "") {
                            echo '<img src="./View/images/uploads/avatar.jpg" alt="" class="user-avatars">';
                        } else {
                            echo '<img src="./View/images/uploads/' . $select['avatar'] . '" alt="" class="user-avatars">';
                        }
                        ?>
                    </a>
                </figure>
                <div class="page-meta">
                    <a href="#" title="" class="underline"><?= $select['name_count'] ?? "" ?></a>
                    <span><i class="fa-solid fa-comment" style="color: #08d5a9;"></i><a href="insight.html" title="">Tín nhắn <em>9</em></a></span>
                    <span><i class="fa-solid fa-bell" style="color: #08d5a9;"></i><a href="insight.html" title="">Thông báo <em>2</em></a></span>
                </div>
                <div class="page-likes">
                    <ul class="nav nav-tabs likes-btn">
                        <li class="nav-item"><a class="active" href="#link1" data-toggle="tab">Bạn bè</a></li>
                        <li class="nav-item"><a class="" href="#link2" data-toggle="tab">Lời mời</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active fade show " id="link1">
                            <span><i class="ti-eye"></i>35</span>
                            <a href="#" title="weekly-likes">35 bạn bè</a>
                            <div class="users-thumb-list">
                                <a href="#" title="Anderw" data-toggle="tooltip">
                                    <img src="./View/images/resources/userlist-1.jpg" alt="">
                                </a>
                                <a href="#" title="frank" data-toggle="tooltip">
                                    <img src="./View/images/resources/userlist-2.jpg" alt="">
                                </a>
                                <a href="#" title="Sara" data-toggle="tooltip">
                                    <img src="./View/images/resources/userlist-3.jpg" alt="">
                                </a>
                                <a href="#" title="Amy" data-toggle="tooltip">
                                    <img src="./View/images/resources/userlist-4.jpg" alt="">
                                </a>
                                <a href="#" title="Ema" data-toggle="tooltip">
                                    <img src="./View/images/resources/userlist-5.jpg" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="link2">
                            <span><i class="ti-eye"></i>440</span>
                            <a href="#" title="weekly-likes">440 lời mời kết bạn</a>
                            <div class="users-thumb-list">
                                <a href="#" title="Anderw" data-toggle="tooltip">
                                    <img src="./View/images/resources/userlist-1.jpg" alt="">
                                </a>
                                <a href="#" title="frank" data-toggle="tooltip">
                                    <img src="./View/images/resources/userlist-2.jpg" alt="">
                                </a>
                                <a href="#" title="Sara" data-toggle="tooltip">
                                    <img src="./View/images/resources/userlist-3.jpg" alt="">
                                </a>
                                <a href="#" title="Amy" data-toggle="tooltip">
                                    <img src="./View/images/resources/userlist-4.jpg" alt="">
                                </a>
                                <a href="#" title="Ema" data-toggle="tooltip">
                                    <img src="./View/images/resources/userlist-5.jpg" alt="">
                                </a>
                                <a href="#" title="Sophie" data-toggle="tooltip">
                                    <img src="./View/images/resources/userlist-6.jpg" alt="">
                                </a>
                                <a href="#" title="Maria" data-toggle="tooltip">
                                    <img src="./View/images/resources/userlist-7.jpg" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- page like widget -->
        <div class="widget friend-list stick-widget">
            <h4 class="widget-title">Chat</h4>
            <div id="searchDir"></div>
            <ul id="people-list" class="friendz-list">
                <li>
                    <figure>
                        <img src="./View/images/resources/friend-avatar.jpg" alt="">
                        <span class="status f-online"></span>
                    </figure>
                    <div class="friendz-meta">
                        <a href="time-line.html">Usernamw</a>
                    </div>
                </li>
                <li>
                    <figure>
                        <img src="./View/images/resources/friend-avatar2.jpg" alt="">
                        <span class="status f-away"></span>
                    </figure>
                    <div class="friendz-meta">
                        <a href="time-line.html">Nguyệt Hu</a>
                    </div>
                </li>
                <li>
                    <figure>
                        <img src="./View/images/resources/friend-avatar3.jpg" alt="">
                        <span class="status f-off"></span>
                    </figure>
                    <div class="friendz-meta">
                        <a href="time-line.html">bucky barnes</a>
                    </div>
                </li>
                <li>
                    <figure>
                        <img src="./View/images/resources/friend-avatar4.jpg" alt="">
                        <span class="status f-off"></span>
                    </figure>
                    <div class="friendz-meta">
                        <a href="time-line.html">bucky barnes</a>
                    </div>
                </li>
                <li>

                    <figure>
                        <img src="./View/images/resources/friend-avatar5.jpg" alt="">
                        <span class="status f-online"></span>
                    </figure>
                    <div class="friendz-meta">
                        <a href="time-line.html">bucky barnes</a>
                    </div>
                </li>
                <li>

                    <figure>
                        <img src="./View/images/resources/friend-avatar6.jpg" alt="">
                        <span class="status f-away"></span>
                    </figure>
                    <div class="friendz-meta">
                        <a href="time-line.html">andrew</a>
                    </div>
                </li>
                <li>
                    <figure>
                        <img src="./View/images/resources/friend-avatar2.jpg" alt="">
                        <span class="status f-away"></span>
                    </figure>
                    <div class="friendz-meta">
                        <a href="time-line.html">Sarah Loren</a>
                    </div>
                </li>
            </ul>
            <div class="chat-box">
                <div class="chat-head">
                    <span class="status f-online"></span>
                    <h6>Bucky Barnes</h6>
                    <div class="more">
                        <span><i class="ti-more-alt"></i></span>
                        <span class="close-mesage"><i class="ti-close"></i></span>
                    </div>
                </div>
                <div class="chat-list">
                    <ul>
                        <li class="me">
                            <div class="chat-thumb"><img src="./View/images/resources/chatlist1.jpg" alt=""></div>
                            <div class="notification-event">
                                <span class="chat-message-item">
                                    Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks
                                </span>

                                <span class="notification-date"><time datetime="2004-07-24T18:18" class="entry-date updated">Yesterday at 8:10pm</time></span>
                            </div>
                        </li>
                        <li class="you">
                            <div class="chat-thumb"><img src="./View/images/resources/chatlist2.jpg" alt=""></div>
                            <div class="notification-event">
                                <span class="chat-message-item">
                                    Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks
                                </span>
                                <span class="notification-date"><time datetime="2004-07-24T18:18" class="entry-date updated">Yesterday at 8:10pm</time></span>
                            </div>
                        </li>
                        <li class="me">
                            <div class="chat-thumb"><img src="./View/images/resources/chatlist1.jpg" alt=""></div>
                            <div class="notification-event">
                                <span class="chat-message-item">
                                    Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks
                                </span>
                                <span class="notification-date"><time datetime="2004-07-24T18:18" class="entry-date updated">Yesterday at 8:10pm</time></span>
                            </div>
                        </li>
                    </ul>
                    <form class="text-box">
                        <textarea placeholder="Post enter to post..."></textarea>
                        <div class="add-smiles">
                            <span title="add icon" class="em em-expressionless"></span>
                        </div>
                        <div class="smiles-bunch">
                            <i class="em em---1"></i>
                            <i class="em em-smiley"></i>
                            <i class="em em-anguished"></i>
                            <i class="em em-laughing"></i>
                            <i class="em em-angry"></i>
                            <i class="em em-astonished"></i>
                            <i class="em em-blush"></i>
                            <i class="em em-disappointed"></i>
                            <i class="em em-worried"></i>
                            <i class="em em-kissing_heart"></i>
                            <i class="em em-rage"></i>
                            <i class="em em-stuck_out_tongue"></i>
                        </div>
                        <button type="submit"></button>
                    </form>
                </div>
            </div>
        </div><!-- friends list sidebar -->
    </aside>
</div><!-- sidebar -->
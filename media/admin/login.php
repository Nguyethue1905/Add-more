<body class="inner_page login">
   <div class="full_container">
      <div class="container">
         <div class="center verticle_center full_height">
            <div class="login_section">
               <div class="logo_login">
                  <div class="center">
                     <img width="60" src="./images/logo/runn.png" alt="" /> <img width="210" src="./images/logo/name-removebg.png" alt="#" />
                  </div>
               </div>
               <div class="login_form">
                  <form method="POST">
                     <fieldset>
                        <div class="field">
                           <label class="label_field">Email Address</label>
                           <input required="" name="Username" type="text" placeholder="E-mail" />
                        </div>
                        <div class="field">
                           <label class="label_field">Password</label>
                           <input required="" name="Password" type="password" placeholder="Password" />
                        </div>
                        <?php
                        $singin = new singin();
                        $sin = $singin->sigin();
                        ?>
                        <div class="field">
                           <label class="label_field hidden">hidden label</label>
                           <label class="form-check-label"><input type="checkbox" class="form-check-input"> Remember Me</label>
                        </div>
                        <div class="field margin_0">
                           <label class="label_field hidden">hidden label</label>
                           <button class="main_bt" type="submit" name="btn">Đăng Nhập</button>
                        </div>
                     </fieldset>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</body>
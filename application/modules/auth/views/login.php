<!--http://bootsnipp.com/snippets/featured/login-amp-signup-forms-in-panel-->
<div class="container">
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Sign In</div>
            </div>

            <div style="padding-top:30px" class="panel-body" >

                <?php

                display_flash_message( "registered", "success" );
                display_flash_message( "error_register", "danger" );
                display_flash_message( "user_not_found", "danger" );
                display_flash_message( "logout", "success" );

                $attributes = array('class' => 'form-horizontal', 'role' => 'form');
                echo form_open('login', $attributes);
                ?>

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username or email">
                    </div>

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                    </div>


                    <div style="margin-top:10px" class="form-group">
                        <!-- Button -->
                        <div class="col-sm-12 controls">
                          <input type="submit" id="btn-login" class="btn btn-success" value="Login">
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-12 control">
                            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                Don't have an account!
                            <a href="<?php echo base_url('register') ?>">
                                Sign Up Here
                            </a>
                            </div>
                        </div>
                    </div>

                <?php echo form_close() ?>

            </div>
        </div>
</div>

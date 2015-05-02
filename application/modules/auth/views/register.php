<!--http://bootsnipp.com/snippets/featured/login-amp-signup-forms-in-panel-->
<div id="signupbox" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Sign Up</div>
                <div style="float:right; font-size: 85%; position: relative; top:-20px">
                    <a href="<?php echo base_url('login') ?>">
                        Sign In
                    </a>
                </div>
            </div>
            <div class="panel-body" >

                <?php
                if( validation_errors() )
                {
                    echo validation_errors( "<div class='alert alert-danger'>", "</div>");
                }
                
                $attributes = array('class' => 'form-horizontal', 'role' => 'form');
                echo form_open('register', $attributes);
                ?>

                    <div class="form-group">
                        <label for="email" class="col-md-3 control-label">Email</label>
                        <div class="col-md-9">
                            <input type="text" value="<?php set_value("email") ?>" class="form-control" name="email" placeholder="Email Address">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="firstname" class="col-md-3 control-label">First Name</label>
                        <div class="col-md-9">
                            <input type="text" value="<?php set_value("username") ?>" class="form-control" name="username" placeholder="First Name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-md-3 control-label">Password</label>
                        <div class="col-md-9">
                            <input type="password" value="<?php set_value("password") ?>" class="form-control" name="password" placeholder="Password">
                        </div>
                    </div>

                    <div class="form-group">
                        <!-- Button -->
                        <div class="col-md-offset-3 col-md-9">
                            <button id="btn-signup" type="submit" class="btn btn-info">
                                <i class="icon-hand-right"></i> &nbsp Sign Up
                            </button>
                        </div>
                    </div>

                <?php echo form_close() ?>
             </div>
        </div>

     </div>
</div>

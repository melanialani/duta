
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <?php echo form_open('admin/login', "role='form'"); ?>
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="rememberMe" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <?php echo form_submit(['id'=>'login','name'=>'login','value'=>'Login','class'=>'btn btn-lg btn-success btn-block']); ?>
                            </fieldset>
                        <?php echo form_close(); ?>
                    </div>
                </div>
                <?php echo $message; ?>
            </div>
        </div>
    </div>


<div class="container d-flex justify-content-center p-5">
    <div class="col col-md-6">
        <div>
            <form action ="<?= base_url('Index/login_user')?>" method = "post">
                <div class="row mb-5"> 
                    <div class = "col col-md-10">
                        <label for = "User Login">User-Login</label>
                    </div> 
                </div>
                    <?php if($this->session->flashdata('success') != null): ?>
                        <div class="row mb-5"> 
                            <div class = "alert alert-success col col-md-10">
                            <?= $this->session->flashdata('success'); ?>
                            </div>
                        </div> 
                    <?php endif; ?>
                <div class="row mb-6"> 
                    <div class = "col col-md-10 mb-3">
                        <label for = "uname">Username</label>
                        <input type = "text" class = "form-control" name = "uname" id = "uname" required value="<?= set_value('uname'); ?>">
                    </div> 
                </div>
                <div class="row mb-6"> 
                    <div class = "col col-md-10 mb-3">
                        <label for = "password">Password</label>
                        <input type = "password" class = "form-control" name = "password" id = "password" required>
                    </div> 
                </div>

                <?php if($this->session->flashdata('error') != null): ?>
                    <div class="row mb-6"> 
                        <div class="alert alert-danger">
                        <?= $this->session->flashdata('error'); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div class = "row mb-6">
                    <div class = "col col-md-10">
                    <button type = "submit" class = "btn btn-lg btn-primary"> Login </button> 
                    
                    <a href="<?= base_url('Index/register_user') ?>" >Need an account? Create an account</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
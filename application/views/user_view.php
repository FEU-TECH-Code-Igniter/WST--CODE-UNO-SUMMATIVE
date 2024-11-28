<div class="container d-flex justify-content-center p-5">
    <div class="col col-md-6 p-5 border border-3 to-white">
        <div>
                <div class="row mb-5"> 
                    <div class = "col col-md-10">
                        <h1>
                            User Information Form
                        </h1>
                    </div> 
                </div>

                <div class="row mb-5 border-3 border-bottom border-primary"> 
                    <div class = "col col-md-10">
                        <h4>
                            <b>Welcome,</b> <?= $user['uname'];?> <a class = "btn btn-lg btn-danger" href="<?= base_url('Index/logout_user') ?>" >Logout</a>
                        </h4>

                    </div> 
                </div>
                <div class="row"> 
                    <div class = "col col-md-10">
                        <h4>
                            <b>Fullname:</b> <?= $user['fname'] .' '. $user['mname'] . ' ' . $user['lname'];?>
                        </h4>
                    </div> 
                </div>
                <div class="row"> 
                    <div class = "col col-md-10">
                        <h4>
                            <b>Birthday,</b> <?= $user['bday'];?>
                        </h4>
                    </div> 
                </div>
                <div class="row border-1 border-bottom border-secondary mb-5"> 
                    <div class = "col col-md-10 ">
                        <h4>
                            <b>Contact Details:</b>
                        </h4>
                    </div> 
                    <div class = "mx-5 col col-md-10">
                        <h5>
                            <b>Email:</b> <?= $user['email']?>
                        </h5>
                    </div> 
                    <div class = "mx-5 col col-md-10 mb-5">
                        <h5>
                            <b>Contact Number:</b> <?= $user['connum']?>
                        </h5>
                    </div> 
                </div>
                <form action ="<?= base_url('Index/reset_password')?>" method = "post">
                <div class="row"> 
                    <div class = "col col-md-10">
                        <label for = "currentpword"><h4>Current Password</h4></label>
                        <input type = "password" class = "form-control" name = "currentpword" id = "currentpword" required>
                    </div> 
                </div>
                <div class="row"> 
                    <div class = "col col-md-10">
                        <label for = "newpword"><h4>New Password</h4></label>
                        <input type = "password" class = "form-control" name = "newpword" id = "newpword" required>
                    </div> 
                </div>
                <div class="row"> 
                    <div class = "col col-md-10 mb-2">
                        <label for = "conpword"><h4>Confirm Password</h4></label>
                        <input type = "password" class = "form-control" name = "conpword" id = "conpword" required>
                    </div> 
                </div>

                <div class="row mb-6"> 
                    <div class = "col col-md-10 mb-3">
                        <?php if(isset($_SESSION['errorreset'])): ?>
                            <div class="alert alert-danger">
                            <?= $_SESSION['errorreset']; ?>
                             </div>
                        <?php endif; ?>
                        <?php if($this->session->flashdata('successreset') != null): ?>
                        <div class="row mb-5"> 
                            <div class = "alert alert-success col col-md-10">
                            <?= $this->session->flashdata('successreset'); ?>
                            </div>
                        </div> 
                    <?php endif; ?>
                    </div> 
                </div>

                

                <div class = "row mb-6">
                    <div class = "col col-md-10">
                        <button type = "submit" class = "btn btn-lg btn-primary"> Change </button> 
                    </div>
                </div>

                </form>

                



                    
        </div>
    </div>
</div>
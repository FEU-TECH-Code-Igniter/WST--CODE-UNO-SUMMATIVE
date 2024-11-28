<div class="container d-flex justify-content-center">
    <div class="col col-md-6">
        <div>

            <form action ="<?= base_url('Index/save_account')?>" method = "post">
                <div class="row mb-5"> 
                    <div class = "col col-md-10">
                        <label for = "User Login">My Personal Information</label>
                    </div> 
                </div>
                <div class="row mb-6"> 
                    <div class = "col col-md-10 mb-3">
                        <label for = "fname">First Name</label>
                        <input type = "text" class = "form-control" name = "fname" id = "fname" value="<?= set_value('fname'); ?>">
                    </div> 
                </div>

                <div class="row mb-6"> 
                    <div class = "col col-md-10 mb-3">
                        <label for = "mname">Middle Name</label>
                        <input type = "text" class = "form-control" name = "mname" id = "mname" value="<?= set_value('mname'); ?>">
                    </div> 
                </div>

                <div class="row mb-6"> 
                    <div class = "col col-md-10 mb-3">
                        <label for = "lname">Last Name</label>
                        <input type = "text" class = "form-control" name = "lname" id = "lname" value="<?= set_value('lname'); ?>">
                    </div> 
                </div>

                <div class="row mb-6"> 
                    <div class = "col col-md-10 mb-3">
                        <label for = "uname">Username</label>
                        <input type = "text" class = "form-control" name = "uname" id = "uname"  value="<?= set_value('uname'); ?>">
                    </div> 
                </div>

                <div class="row mb-6"> 
                    <div class = "col col-md-10 mb-3">
                        <label for = "password">Password</label>
                        <input type = "password" class = "form-control" name = "password" id = "password" value="<?= set_value('password'); ?>">
                    </div> 
                </div>

                <div class="row mb-6"> 
                    <div class = "col col-md-10 mb-3">
                        <label for = "cpaswword">Confirm password</label>
                        <input type = "password" class = "form-control" name = "cpassword" id = "cpassword" value="<?= set_value('cpassword'); ?>">
                    </div> 
                </div>

                <div class="row mb-6"> 
                    <div class = "col col-md-10 mb-3">
                        <label for = "bday">Birthday</label>
                        <input type = "date" class = "form-control" name = "bday" id = "bday" value="<?= set_value('bday'); ?>">
                    </div> 
                </div>

                <div class="row mb-6"> 
                    <div class = "col col-md-10 mb-3">
                        <label for = "email">Email</label>
                        <input type = "text" class = "form-control" name = "email" id = "email" value="<?= set_value('email'); ?>">
                    </div> 
                </div>

                <div class="row mb-6"> 
                    <div class = "col col-md-10 mb-3">
                        <label for = "connum">Contact Number</label>
                        <input type = "text" class = "form-control" name = "connum" id = "connum" value="<?= set_value('connum'); ?>">
                    </div> 
                </div>

                <div class="row mb-6"> 
                    <div class = "col col-md-10 mb-3">
                        <?php if(isset($_SESSION['errorregister'])): ?>
                            <div class="alert alert-danger">
                            <?= $_SESSION['errorregister']; ?>
                             </div>
                        <?php endif; ?>
                    </div> 
                </div>

                <div class = "row mb-6">
                    <div class = "col col-md-10">
                    <button type = "submit" class = "btn btn-lg btn-primary"> Register </button> 
                    <a href="<?= base_url('Index/login') ?>" >Already a user? Login</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
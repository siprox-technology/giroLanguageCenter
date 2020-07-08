<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content rounded-0 border-0 p-4" id="signupModalContent">
        <div class="modal-header border-0">
          <h3>Register</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- signup form -->
        <div class="modal-body">
          <!-- signUp -->
          <section id="signUp">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <form id="signUpForm">
                    <div class="row tex">
                      <div class="col-md-6 mx-auto">
                        <!-- name -->
                        <div class="form-group">
                          <input class="form-control" id="name" type="text" maxlength="40" placeholder="Name *"
                            required="required" data-validation-required-message="Please enter your name.">
                          <p class="help-block text-danger ml-1 mb-0" id="name_err"></p>
                        </div>
                        <!-- tell -->
                        <div class="form-group">
                          <input class="form-control" id="phone" type="text" maxlength="17" placeholder="Phone *"
                            required="required" data-validation-required-message="Please enter your phone number.">
                          <p class="help-block text-danger ml-1 mb-0" id="phone_err"></p>
                        </div>
                        <!-- email -->
                        <div class="form-group">
                          <input class="form-control" id="email" type="email" placeholder="Email *" required="required"
                            data-validation-required-message="Please enter your email address.">
                          <p class="help-block text-danger ml-1 mb-0" id="email_err"></p>
                        </div>
                        <!-- address -->
                        <div class="form-group">
                          <input class="form-control" id="address" type="address" maxlength="120"
                            placeholder="Address *" required="required"
                            data-validation-required-message="Please enter your Address.">
                          <p class="help-block text-danger ml-1 mb-0" id="address_err"></p>
                        </div>
                        <!-- password -->
                        <div class="form-group">
                          <input class="form-control" id="password" type="password" maxlength="20"
                            placeholder="Password *" required="required"
                            data-validation-required-message="Please enter your Password.">
                          <input type="hidden" id="_SignUpToken" name="_token"
                            value="<?php echo $_SESSION['_token'];?>">
                          <p class="help-block text-danger ml-1 mb-0" id="pass_err"></p>
                        </div>
                        <!-- showing registration result -->
                        <div class="form-group m-0 text-center">
                          <p class="text-left alert d-none" id="reg_result"></p>
                        </div>
                      </div>
                      <!-- reg button and loarder -->
                      <div class="col-lg-12 text-center">
                        <a class="btn btn-primary" onclick=register_user()>SIGN UP</a>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>


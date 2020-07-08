<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content rounded-0 border-0 p-4">
        <div class="modal-header border-0">
          <h3>Login</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <section class="page-section" id="logIn">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <form id="logInForm">
                    <div class="row tex">
                      <div class="col-md-6 mx-auto">
                        <!-- email -->
                        <div class="form-group">
                          <input class="form-control" id="logInEmail" type="email" placeholder="Email *"
                            required="required" data-validation-required-message="Please enter your email address.">
                          <p class="help-block text-danger"></p>
                        </div>
                        <!-- password -->
                        <div class="form-group">
                          <input class="form-control" id="logInPassword" type="password" maxlength="20"
                            placeholder="Password *" required="required"
                            data-validation-required-message="Please enter your Password.">
                          <input type="hidden" id="_logInToken" name="_token" value="<?php echo $_SESSION['_token'];?>">
                          <p class="help-block text-danger"></p>
                        </div>
                        <!-- forgot password checkbox -->
                        <div class="form-check my-2">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="forgotPassCheckBtn" value="">Forgot
                            Password
                          </label>
                        </div>
                        <!-- showing log in result -->
                        <div class="form-group m-0">
                          <p class="text-left d-none" id="logIn_result"></p>
                        </div>
                      </div>
                      <!-- log in button -->
                      <div class="col-lg-12 text-center mt-2">
                        <a id="logIn_btn" class="btn btn-primary cursor_pointer btn-xl text-uppercase"
                          onclick="signin_user()">log in</a>
                      </div>
                      <!-- forgot password button -->
                      <div class="col-lg-12 text-center mt-2">
                        <a id="forgetPassBtn" class="btn btn-primary cursor_pointer btn-xl text-uppercase d-none"
                          onclick="send_rand_code()">Forgot password</a>
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
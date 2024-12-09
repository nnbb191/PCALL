<!-- Profile Modal -->
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
<!-- Backend: Handle login/logout functionality -->
      <!-- Modal Header -->
      <div class="modal-header text-center" style="background-color: #ffffff; color: rgb(0, 0, 0);">
        <h4 class="modal-title w-100" id="profileModalLabel">             
           <!-- PHP: Check if user is logged in -->
          User Login</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">
    <!-- PHP: Switch between login and signup views based on session -->

        <!-- Nav Tabs -->
        <ul class="nav nav-tabs justify-content-start" id="myTab" role="tablist">
          <li class="nav-item">
            <button class="nav-link active" id="sign-in-tab" data-bs-toggle="tab" data-bs-target="#sign-in" type="button" role="tab">
              Sign In
            </button>
          </li>
          <li class="nav-item">
            <button class="nav-link" id="sign-up-tab" data-bs-toggle="tab" data-bs-target="#sign-up" type="button" role="tab">
              Sign Up
            </button>
          </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content mt-4">
          <!-- Sign In Tab -->
          <div class="tab-pane fade show active" id="sign-in" role="tabpanel">
            <form action="login.php" method="POST"> <!-- Backend: Login logic -->
              <div class="mb-3">
                <label for="signInEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="signInEmail" name="signInEmail" placeholder="Enter your email" required>
              </div>
              <div class="mb-3">
                <label for="signInPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="signInPassword" name="signInPassword" placeholder="Enter your password" required>
              </div>
              <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="rememberMe">
                <label class="form-check-label" for="rememberMe">Remember me</label>
              </div>
              <button type="submit" name="login" class="btn btn-dark w-100">Login</button>
            </form>
          </div>

          <!-- Sign Up Tab -->
          <div class="tab-pane fade" id="sign-up" role="tabpanel">
            <form action="signup.php" method="POST"> <!-- Backend: Signup logic -->
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" required>
              </div>
              <div class="mb-3">
                <label for="signUpEmail" class="form-label">Email</label>
                <input type="email" class="form-control" name="signUpEmail" id="signUpEmail" placeholder="Enter your email" required>
              </div>
              <div class="mb-3">
                <label for="signUpPassword" class="form-label">Password</label>
                <input type="password" class="form-control" name="signUpPassword" id="signUpPassword" placeholder="Enter your password" required>
              </div>
              <div class="mb-3">
                <label for="confirmPassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Re-enter your password" required>
              </div>
              <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" name="address" id="address" placeholder="Enter your address">
              </div>
              <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" name="city" id="city" placeholder="Enter your city">
              </div>
              <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter your phone">
              </div>
              <button type="submit" name="signup" class="btn btn-dark w-100">Sign Up</button>
            </form>
          </div>
        </div>
      </div>

      <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        <p class="mb-0 ms-auto">Forgot <a href="#" class="text-primary">Password?</a></p>
      </div>
    </div>
  </div>
</div>
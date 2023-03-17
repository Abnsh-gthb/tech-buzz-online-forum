<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" >
  Launch demo modal
</button> -->

<!-- Modal -->
</style>
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="partials/_signinhandle.php" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="signupModalLabel">Sign Up</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="email1">Email address</label>
            <input type="email" class="form-control" id="email" name="sign_email" aria-describedby="emailHelp" placeholder="Enter email" required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="Password">Password</label>
            <input type="password" class="form-control" id="Password" name="sign_pass" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Confirm Password</label>
            <input type="password" class="form-control" id="cPassword" name="sign_cpass" placeholder="Password" required>
          </div>
          <input type="hidden" name="_sign_handle" value="true">
          <!-- <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div> -->
          <button type="submit" class="btn btn-success my-3">SIGN UP</button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" >
  Launch demo modal
</button> -->

<!-- Modal -->

<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModal" aria-hidden="true">
  <div class="modal-dialog">
    <form action="partials/_loginhand.php?continue=<?php echo  $_SERVER['REQUEST_URI'];?>" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="loginModalLabel">Login to Explore more</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="log_email">Email address</label>
            <input type="email" class="form-control" id="log_email" name="log_email" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="log_pass">Password</label>
            <input type="password" class="form-control" id="log_pass" name="log_pass" placeholder="Password">
          </div>
          <input type="hidden" name="_log_handle" value="true">
          <!-- <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div> -->
          <button type="submit" class="btn btn-success my-3">LOGIN</button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          
        </div>
      </div>
    </form>
  </div>
</div>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="jquery-3.5.1.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

  <title>Document</title>
</head>

<body>
  <div class="text-center">
    <br>
    <h1 class="display-1">Trygva</h1>
    <br>
    <button tpye="button" id="log_in" name="log_in" class="btn btn-dark" data-toggle="modal" data-target="#example_logga_in">Log in</button>
    <button tpye="button" id="sign_in" name="sign_in" class="btn btn-success" data-toggle="modal" data-target="#example_sign_in">Sign up</button>
  </div>

  <!-- Modal logga in -->
  <div class="modal fade" id="example_logga_in" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLongTitle">Sign in</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Form Log in -->
          <div class="text-center container container-table">
            <form>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="text" class="form-control" name="email1" id="email1" aria-describedby="emailHelp" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password1" id="password1" placeholder="Password">
              </div>
              <!-- <button type="button" id="submit" name = "submit" class="btn btn-primary">Submit</button> -->
            </form>
          </div>
          <!-- Form log in -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
          <button type="button" id="submit_logga_in" name="submit_logga_in" class="btn btn-primary" data-dismiss="modal">Submit</button>

        </div>
      </div>
    </div>
  </div>

  <!-- Modal sign in -->
  <div class="modal fade" id="example_sign_in" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLongTitle">Register</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Form Sign in -->
          <div class="text-center container container-table">
            <form>
              <div class="form-group">
                <label for="exampleInputName1">Name</label>
                <input type="text" class="form-control" name="name2" id="name2" aria-describedby="nameHelp" placeholder="Enter name">
              </div>
              <div class="form-group">
                <label for="exampleInputName1">Phone number</label>
                <input type="text" class="form-control" name="phone_number2" id="phone_number2" aria-describedby="nameHelp" placeholder="Enter your phone number">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="text" class="form-control" name="email2" id="email2" aria-describedby="emailHelp" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password2" id="password2" placeholder="Password">
              </div>
              <!-- <button type="button" id="submit" name = "submit" class="btn btn-primary">Submit</button> -->
            </form>
          </div>
          <!-- Form Sign in -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
          <button class="btn btn-primary" id="submit_sign_in" name="submit_sign_in" data-dismiss="modal">Submit</button>

        </div>
      </div>
    </div>
  </div>
</body>

<script>
  $(document).ready(function() {
    // Getting the input data when the submit button is clicked
    // Sign in Ajax
    $("#submit_sign_in").click(function() {
      var name = $("#name2").val();
      var phone = $("#phone_number2").val();
      var email = $("#email2").val();
      var password = $("#password2").val();
      if (name == "" || email == "" || password == "") {
        alert("Please fill all fields!");
        return false;
      }
      // Ajax POST Call
      $.ajax({
        type: "post",
        url: "<?php echo base_url("/users"); ?>",
        data: {
          "name": name,
          "phone": phone,
          "email": email,
          "password": password,
        },
        cache: false,
        success: function(data) {
          alert(data);
        },
        error: function(e, status, error) {
          console.error(e);
        },
      });
    });

    // Logga in Ajax
    // $("#submit_logga_in").click(function() {
    //   var email = $("#email1").val();
    //   var password = $("#password1").val();
    //   if (name == "" || email == "" || password == "") {
    //     alert("Please fill all fields!");
    //     return false;
    //   }
    //   // Ajax POST Call
    //   $.ajax({
    //     type: "post",
    //     url: "<?php echo base_url("/users"); ?>",
    //     data: {
    //       "email": email,
    //       "password": password,
    //     },
    //     cache: false,
    //     success: function(data) {
    //       alert(JSON.stringify(data));
    //     },
    //     error: function(e, status, error) {
    //       console.error(e);
    //     },
    //   });
    // });
  });
</script>

</html>
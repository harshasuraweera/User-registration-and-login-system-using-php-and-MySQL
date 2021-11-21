<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Register</title>
</head>

<body>



    <div class="container">
        <div class="row">
            <div class="col">

            </div>
            <div class="col" style="margin-top: 60px;">

                <center>
                    <h3>Let's start!</h3>
                </center>

                <form class="form-inline" method="POST" style="margin-top: 30px;" enctype="multipart/form-data" id="registerForm">


                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="fname" class="form-label">First Name</label>
                                <input type="text" class="form-control" placeholder="First name" aria-label="First name" id="fname" name="fname">
                            </div>
                            <div class="col">
                                <label for="lname" class="form-label">Last Name</label>
                                <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" id="lname" name="lname">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="emailAddress" class="form-label">Email</label>
                        <input type="email" class="form-control" id="emailAddress" name="emailAddress" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="mobileNumber" class="form-label">Mobile Number</label>
                        <input type="text" class="form-control" id="mobileNumber" name="mobileNumber">
                    </div>
                    <div class="mb-3">
                        <label for="birthday" class="form-label">Birthday</label>
                        <input type="date" class="form-control" id="birthday" name="birthday">
                    </div>
                    <div class="mb-3">
                        <label for="profilePicture" class="form-label">Profile Picture</label>
                        <input type="file" class="form-control" id="profilePicture" name="profilePicture">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" area-describedby="passwordHelp">
                        <div id="passwordHelp" class="form-text">Please use a strong password to improve account
                            secuirty.</div>
                    </div>

                    <div class="alert alert-primary" role="alert" style="display: none;" id="status">

                    </div>

                    <button type="submit" class="btn btn-primary" id="registerBtn" name="registerBtn">Register</button>

                    <p style="margin-top: 20px;">Already have an account? <a href="login.php">Login</a></p>
                </form>



            </div>
            <div class="col">

            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>

        $("input").click(function() {
            $("#registerBtn").removeAttr("disabled");
            $("#status").hide();
        });

        $(document).ready(function() {
            $('#registerBtn').on('click', function() {

                $("#registerBtn").attr("disabled", "disabled");

                var fname = $('#fname').val();
                var lname = $('#lname').val();
                var email = $('#emailAddress').val();
                var mobileNumber = $('#mobileNumber').val();
                var birthday = $('#birthday').val();
                var mobileNumber = $('#mobileNumber').val();
                var password = $('#password').val();

                if (fname != "" && lname != "" && email != "" && mobileNumber != "" && birthday != "" && mobileNumber != "" && password != "") {
                    $.ajax({
                        url: "ajax_files/register_ajax.php",
                        type: "POST",
                        data: {
                            fname: fname,
                            lname: lname,
                            email: email,
                            mobileNumber: mobileNumber,
                            birthday: birthday,
                            mobileNumber: mobileNumber,
                            password: password
                        },
                        cache: false,
                        success: function(dataResult) {
                            var dataResult = JSON.parse(dataResult);
                            if (dataResult.statusCode == 200) {

                                $("#registerBtn").removeAttr("disabled");
                                $('#registerForm').find('input:text').val('');
                                $("#status").show();
                                $('#status').html('Data added successfully !');

                            } else if (dataResult.statusCode == 201) {

                                $("#status").show();
                                $('#status').html('Something went wrong !');

                            }

                        }
                    });
                } else {

                    $("#status").show();
                    $('#status').html('Please fill all the field !');

                }
            });
        });
    </script>


</body>

</html>
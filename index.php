<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
        <h1>Guessing Game</h1>
        <br/>
        <br/>
        <form action="" method="post">
            <div class="row">
                <div class="col-5 mx-2">
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">guess computer secret </label>
                        <div class="col-sm-10">
                        <input type="number" class="form-control" name="computer_secret" minlength="5"  maxlength="5" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">computer guess result </label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="guess" required>
                        </div>
                    </div>
                </div>
                <div class="col-5 mx-2">
                    <div class="mb-3 row">
                        <label  class="col-sm-2 col-form-label">computer guess</label>
                        <div class="col-sm-10">
                            <h3>12345</h3>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label  class="col-sm-2 col-form-label">your guess result</label>
                        <div class="col-sm-10">
                            <h3>12345</h3>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary"> submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>
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
        <h1>Num Of Rounds : {{$game->num_of_guesses}}</h1>
        <br/>
        <br/>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('guess')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-5 mx-2">
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">guess computer secret </label>
                        <div class="col-sm-10">
                        <input type="number" class="form-control" name="computer_secret" minlength="5"  maxlength="5" required>
                        @if($errors->has('computer_secret'))
                            <div class="text-danger" role="alert">
                                <strong>{{ $errors->first('computer_secret') }}</strong>
                            </div>
                        @endif
                        </div>
                    </div>
                    @if ($game->guess_string)
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">computer guess result </label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="guess" required>
                            @if($errors->has('guess'))
                                <div class="text-danger" role="alert">
                                    <strong>{{ $errors->first('guess') }}</strong>
                                </div>
                            @endif
                            </div>
                        </div>
                    @endif
                </div>
                @if (!is_null($game))
                    <div class="col-5 mx-2">
                        @if ($game->player_secret)
                            <div class="mb-3 row">
                                <label  class="col-sm-2 col-form-label">computer guess</label>
                                <div class="col-sm-10">
                                    <h3>{{$game->player_secret}}</h3>
                                </div>
                            </div>
                        @endif
                        @if ($game->guess_string)
                            <div class="mb-3 row">
                                <label  class="col-sm-2 col-form-label">your guess result</label>
                                <div class="col-sm-10">
                                    <h3>{{$game->guess_string}}</h3>
                                </div>
                            </div>
                        @endif
                    </div>
                @endif
            </div>
            <button class="btn btn-primary"> submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>
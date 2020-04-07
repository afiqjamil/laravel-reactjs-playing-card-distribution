<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Playing Card Distribution</title>

    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
        body, html {
            height: 100%;
        }
    </style>
</head>

<body>
<div class="container-fluid h-100">
    <div class="row h-100">
        <div class="col-sm-6 col-2 h-100 bg-dark text-white py-2 d-flex align-items-center justify-content-center fixed-top" id="left">
            <form class="form" id="form">
                <div class="text-center mb-4">
                    <h1 class="h3 mb-3 font-weight-normal">Playing Card Distribution</h1>
                    <p>Enter number of player below and submit to start card distribution</p>
                </div>

                <div class="form-label-group">
                    <input type="number" id="player" name="player" class="form-control" placeholder="No. Of Player" min="1" required autofocus>
                </div>
                <br/>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>

                <br/>
                <div id="error" class="alert alert-danger" role="alert" style="display: none;">
                    This is a danger alert—check it out!
                </div>
            </form>
        </div>
        <div class="col-sm-6 invisible col-2"><!--hidden spacer--></div>
        <div class="col offset-2 offset-sm-6 py-2">
            <h4>Result</h4>
            <table class="table" id="result">
                <thead>
                <tr>
                    <th scope="col">Player</th>
                    <th scope="col">Card</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4 sticky-top">

    </div>
    <div class="col-sm-6 table-responsive">

    </div>
</div>

<script src="{{ asset('jquery/jquery-3.4.1.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#form').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: "GET",
                url: "{{ route('distribute') }}",
                data: $(this).serialize(),
                success: function(response)
                {
                    if (response.status)
                    {
                        $('#error').empty().hide();
                        $('#result tbody').empty();
                        var trHTML = '';
                        $.each(response.result, function (i, item) {
                            if (item.cards.length) {
                                trHTML += '<tr><th scope="row">#' + item.player + '</th><td>' + item.cards + '</td></tr>';
                            }
                            else {
                                trHTML += '<tr class="table-danger"><th scope="row">#' + item.player + '</th><td>' + item.cards + '</td></tr>';
                            }

                        });
                        $('#result').append(trHTML);
                    }
                    else {
                        $('#error').empty().append("<b>Irregularity occurred:</b><br/>" + response.result.player).show();
                    }
                }
            });
        });
    });
</script>

</body>
</html>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Playing Card Distribution</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

</head>

<body>
<div class="row">
    <div class="col-sm-6">
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
        </form>
    </div>
    <div class="col-sm-6">
        <hr/>

        <table class="table" id="result">
            <thead>
            <tr>
                <th scope="col">Player</th>
                <th scope="col">Card</th>
            </tr>
            </thead>
            <tbody>
            {{--<tr>--}}
            {{--    <th scope="row">#1</th>--}}
            {{--    <td>Mark</td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
            {{--    <th scope="row">#2</th>--}}
            {{--    <td>Jacob</td>--}}
            {{--</tr>--}}
            </tbody>
        </table>
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
                        $('#result tbody').empty();
                        var trHTML = '';
                        $.each(response.result, function (i, item) {
                            trHTML += '<tr><td>' + item.player + '</td><td>' + item.cards + '</td></tr>';
                        });
                        $('#result').append(trHTML);
                    }
                }
            });
        });
    });
</script>

</body>
</html>

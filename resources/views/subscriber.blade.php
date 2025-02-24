<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eloquent Subscribers</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-7">
                <table class="table table-striped table-bordered">
                    @foreach ($subscribers as $subscribe)
                        <tr>
                            <td>
                                {{ $subscribe->name }}
                            </td>
                            <td>
                                {{ $subscribe->email }}
                            </td>
                            <td>
                                {{ $subscribe->age }}
                            </td>
                            <td>
                                {{ $subscribe->city }}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Validate Excel</title>
</head>
<body>

    <form action="{{ route('formValidate') }}" method="post" enctype="multipart/form-data">
    @csrf
    <table>
        <tr>
            <td>File</td>
            <td><input type="file" name="file"></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="Validate">
            </td>
        </tr>
    </table>
    </form>
    @if ($result != "" && count($result) > 0 )
    <table border=1>
        <tr><td>Row</td><td>Message</td></tr>
        @foreach ($result as $item)
            <tr>
                <td>{{$item['row']}}</td>
                <td>{{$item['msg']}}</td>
            </tr>
        @endforeach
    </table>
 @endif


</body>
</html>

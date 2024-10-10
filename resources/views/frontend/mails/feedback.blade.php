<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <style>
        * {
            text-decoration: none!important;
        }
        p {
            font: 14px Arial, sans-serif;color: #000000;line-height: 22px;
        }
        a {
            color: #ee2e2e;
            display: inline-block;
        }
        table {
            width: 100%;
        }
        table td {
            padding: 10px;
        }
    </style>
</head>
<body>

<table border="0" cellpadding="20" cellspacing="0" style="max-width: 600px;">
    <tbody>
    <tr>
        <td>Имя</td>
        <td>{{ $data->name }}</td>
    </tr>
    <tr>
        <td>Телефон</td>
        <td>{{ $data->phone }}</td>
    </tr>
    <tr>
        <td style="vertical-align: top">Коммент</td>
        <td>
            <div style="white-space: pre-line">{{ $data->message ?? '-' }}</div>
        </td>
    </tr>
    </tbody>
</table>

</body>
</html>

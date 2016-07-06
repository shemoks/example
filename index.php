<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>my test task</title>
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.4.1/jsgrid.min.css"/>
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.4.1/jsgrid-theme.min.css"/>
</head>
<body>
<form action="parser.php" method="post" id="parser-form">
    <div class="url">
        <label style="font-weight: bolder">Input url <input type="text" id="site" name="site"></label>
        <button>Search</button>
    </div>
</form>
<div class="table"></div>


<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.4.1/jsgrid.min.js"></script>
<script>
    $(document).on('submit', '#parser-form', function () {
        $.ajax({
            url: $('#parser-form').attr('action'),
            data: {site: $('#parser-form #site').val()},
            type: 'post',
            success: function (data) {
                $(".table").jsGrid({
                    width: "100%",
                    height: "600px",
                    data: JSON.parse(data),
                    fields: [
                        {name: "link", type: "text", title: "Адрес"},
                        {name: "name", type: "text", title: "Название проверки"},
                        {name: "text.status", type: "text", title: "Результат"},
                        {name: "status", type: "text", title: "Статус"},
                        {name: "text.comment", type: "text", title: "Комментарий"}
                    ]
                });
            }
        });
        return false;
    });
</script>
</body>
</html>


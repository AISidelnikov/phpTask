<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
        <title></title>
    </head>
    <body>
        <div class="container">
        <?php
        include './header.php';
        $conn =  $conn = new mysqli("localhost", "root", "", "workouttask");
        $sql = "SELECT * FROM TASK WHERE `id` = '{$_GET['id']}'";
        $result = $conn->query($sql);
        $cat = $result->fetch_assoc();
        echo <<< _END
        <form action="./createTask.php" method="POST">
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal">
                        <input type="text" name="name" placeholder="Название тренировки" size="110" value= $cat[name]>
                    </h4>
                    <h4>
                        дата создания: <input type="datetime-local" name="dateTime" value=$cat[dateTime]>
                    </h4>
                </div>
                <div class="card-body">
                    <h4 class="card-title pricing-card-title">
                        Продолжительность тренировки:
                        <input type="time" name="time" value= $cat[time]>
                    </h4>
                    <ul class="list-unstyled mt-3 mb-4">
                        <textarea id="id" name="description" rows="5" cols="170" placeholder="Описание тренировки">$cat[description]</textarea>
                    </ul>
                    <button type="submit" class="w-100 btn btn-lg btn-outline-primary">Создать</button>
                </div>
            </div> 
        </form>
        _END;
        include './footer.php';
        ?>
        </div>
    </body>
</html>
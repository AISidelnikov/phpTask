<?php   
    include_once './dbFunction.php';
    $table = "TASK";
    $DB = "workouttask";
    createDB($DB);
    createTable($DB, $table);
    
    $conn = new mysqli("localhost", "root", "", $DB);
    if($conn->error)
    {
        die("Connection faild: ".$conn->connect_error);
    }
    if(!$db = $conn->select_db($DB))
    {
        die("Connection faild: ".$conn->error);
    }
    $sql = "SELECT * FROM $table ORDER BY ID DESC";
    $result = $conn->query($sql);
    echo '<div class="d-flex flex-wrap">';
    for($i = 0; $i < $result->num_rows; $i++)
    {
        $cat = $result->fetch_assoc();
        echo <<< _END
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                  <h4 class="my-0 fw-normal">$cat[name]</h4> <h6>дата создания: $cat[dateTime]</h6>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">$cat[time]<small class="text-muted fw-light"></small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>$cat[description]</li>
                    </ul>
                    <form method="GET">
                        <a class="w-100 btn btn-lg btn-outline-primary" href="./replaceTask.php?id=$cat[id]">Повторить</a>
                    </form>
                    <br>
                    <form method="POST" action="./deleteTask.php">
                        <input type="hidden" name="id" value="$cat[id]">
                        <button type="submit" class="btn btn-primary" >Удалить</button>
                    </form> 
                </div>
            </div>
        _END;
    } 
    echo '</div>';
    echo <<< _END
    _END;
    $conn->close();
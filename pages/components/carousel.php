<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-interval="3500">
    <div class="carousel-indicators">
        <?php
            include_once '../../config/connection.php';

            $i = 1;
            $sql = "SELECT * FROM carousel";
            $query = $conn->prepare($sql);
            $query->execute();
            $num = $query->rowCount();
            if ($num > 0){
                $first = True;
                while($row = $query->fetch(PDO::FETCH_OBJ)){
                    if ($first){
                        echo "
                        <button type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide-to='0' class='active' aria-current='true' aria-label='Slide 1'></button>
                        ";
                        $first = False;
                    } else {
                        echo "
                        <button type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide-to='" . $i ."' aria-label='Slide " . $i+1 . "'></button>
                        ";
                        $i++;
                    }
                    
                }
            }
        ?>
    </div>
    <div class="carousel-inner">
        <?php
            include_once '../../config/connection.php';

            $sql = "SELECT * FROM carousel";
            $query = $conn->prepare($sql);
            $query->execute();
            $num = $query->rowCount();
            if ($num > 0){
                $first = True;
                while($row = $query->fetch(PDO::FETCH_OBJ)){
                    if ($first){
                        echo "
                        <div class='carousel-item active' data-bs-interval='3500'>
                            <a href='" . $row->url . "' target='_blank'><img class='d-block w-100' src='" . $row->img_location . "' alt='" . $row->description . "'></a>
                        </div>
                        ";
                        $first = False;
                    } else {
                        echo "
                        <div class='carousel-item' data-bs-interval='3500'>
                            <a href='" . $row->url . "' target='_blank'><img class='d-block w-100' src='" . $row->img_location . "' alt='" . $row->description . "'></a>
                        </div>
                        ";
                    }
                    
                }
            }
        ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
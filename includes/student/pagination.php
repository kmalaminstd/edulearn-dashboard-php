<?php
    
    require "./functions/homepage/stat.php";

    $totalStudent = $data['data']['total_student'];

    $frn = ceil($totalStudent / 10);

    $pageNumber = isset($_GET['page']) ? $_GET['page'] : 1


?>


<div class="pagination">
                    

                    <?php

                        $i = 1;

                        echo "<a href='?page=". ($i == 1 ? 1 : "?page=" . ($i - 1)) ."' class='button'>&laquo;</a>";

                        while($i < $frn+1){
                            echo "
                                <a href='?page=".$i."' class='button ". ($i == $frn ? "active" : "") ."'>$i</a>
                            ";
                            $i++;
                        }

                        echo "<a href='". ($pageNumber == $frn ? "?page=".$frn : "?page=" . $pageNumber+1) ."' class='button'>&raquo;</a>";

                    ?>
                    
                </div>
            </div>
        </div>
    </div>
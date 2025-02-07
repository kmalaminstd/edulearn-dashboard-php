<?php
    require "./functions/homepage/stat.php";

    $totalUsers = $statData['data']['total_user'];

    $frn = ceil($totalUsers/10);

    $page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1;



?>

<div class="pagination">
                    <?php

                        $i = 1;

                        echo "<a href='?page=" . ($i == 1 ? $i=1 : "?page=" . ($i - 1)) . "' class='button " . ($i == 0 ? "disabled" : "") . "'>&laquo;</a>";


                    
                     
                        while($i < $frn+1){
                            echo "<a href='?page=" . $i . " ' class='button " . ($page_number == $i ? "active" : "") . "'> " . $i . " </a>";
                            $i++;
                        }

                        echo "<a href='" . ($page_number == $frn ? "?page=" . $frn : "?page=" .($page_number+1)) . " ' class='button'>&raquo;</a>";
                    ?>
                    
                </div>
            </div>
        </div>
    </div>

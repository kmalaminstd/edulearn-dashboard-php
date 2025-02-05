<?php
        
    require './functions/course/courselist.php';
    require './functions/homepage/stat.php';

?>

<div class="courses-grid">

            <?php



                foreach ($courseData['data'] as $elm) {
                    echo "

                        <div class='course-card'>
                            <div class='course-thumbnail'>
                                <img src='{$elm['thumbnail_url']}'>
                                <span class='category'>{$elm['category']}</span>
                            </div>
                            <div class='course-content'>
                                <h3>{$elm['title']}</h3>
                                <p class='instructor'>By {$elm['author_name']}</p>
                                <div class='course-stats'>
                                    <span><i class='fas fa-user'></i> 85 Students</span>
                                    <span><i class='fas fa-clock'></i> 12 Hours</span>
                                </div>
                                <div class='course-progress'>
                                    <div class='progress-bar'>
                                        <div class='progress' style='width: 75%'></div>
                                    </div>
                                    <!-- <span>75% Complete</span> -->
                                </div>
                                <div class='course-actions'>
                                    <button class='edit'><i class='fas fa-edit'></i></button>
                                    <button class='view'><i class='fas fa-eye'></i></button>
                                    <button class='delete'><i class='fas fa-trash'></i></button>
                                </div>
                            </div>
                    </div>


                    ";
                }

            ?>

                

                <!-- Add more course cards as needed -->
            </div>
            <div class="pagination">
                    

                    <?php

                        $totalCourse = $data['data']['total_course'];
                        
                        $frn = ceil($totalCourse / 10);

                        $pageNumber = isset($_GET['page']) ? $_GET['page'] : 1;

                        $i = 1;

                        echo "<a href='?page=". ($i == 1 ? $i = 1 : $i - 1) ."' class='button'>&laquo;</a>";

                        while ($i < $frn+1) {
                            
                            echo "<a href='?page=". $i ."' class='button . " . ($pageNumber == $i ? "active" : "") . "'>$i</a>";

                            $i++;
                        }

                        echo "<a href='?page=". ($pageNumber == $frn ? $pageNumber : "?page=" . ($pageNumber+1) ) ."' class='button'>&raquo;</a>";

                    ?>
                    
                </div>
        </div>
    </div>

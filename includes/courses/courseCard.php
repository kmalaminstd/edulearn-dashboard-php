<?php
        
    require './functions/course/courselist.php';
    require './functions/homepage/stat.php';

?>

<link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
<script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>

<div class="courses-grid">

            <?php


                foreach ($courseData['data'] as $elm) {
                    echo "

                        <div class='course-card'>
                            <div class='course-thumbnail'>
                                <video id='scv-player' playsinline controls poster='".$elm['thumbnail_url']."' src='{$elm['video_url']}'>
                                <span class='category'>". strtoupper($elm['category']) ."</span>
                            </div>
                            <div class='course-content'>
                                <h3>". ucfirst($elm['title']) ."</h3>
                                
                                <p class='instructor'>By {$elm['author_name']}</p>
                                <div class='course-stats'>
                                    <span><i class='fas fa-user'></i> {$elm['number_of_student']} Students</span>
                                    <!-- <span><i class='fas fa-clock'></i> $". $elm['price'] ."</span> -->
                                </div>
                                <h4 class='course-price'>Price: $". $elm['price'] ." </h4>
                                <div class='course-progress'>
                                    <div class='progress-bar'>
                                        <div class='progress' style='width: 100%'></div>
                                    </div>
                                    <!-- <span>75% Complete</span> -->
                                </div>
                                <div class='course-actions'>
                                    <form method='DELETE' action='./functions/course/deleteCourse.php'>
                                        <input name='course-id' value='". $elm['course_id'] ."' hidden>
                                        <button class='delete'><i class='fas fa-trash'></i></button>
                                    </form>
                                    
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

                        $totalCourse = $statData['data']['total_course'];
                        
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

    <script type="text/javascript">
        const plr = document.querySelectorAll('#scv-player');
        // console.log(plr);
        // const player = new Plyr('#scv-player')
        for(let i = 0; i < plr.length; i++){
            const player = new Plyr(plr[i]);
        }
        
    </script>

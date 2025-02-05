<?php
    
    require './functions/course/recentcourse.php';

?>

<!-- Course List -->
<div class="content-section">
                <h2>Recent Courses</h2>
                <div class="course-grid">
                    
                    <?php

                        foreach($data['data'] as $elm){
                            echo "
                                <div class='course-card'>
                                    <img src='{$elm['thumbnail_url']}' alt='Course'>
                                    <div class='course-info'>
                                        <h3>{$elm['category']}</h3>
                                        <p>By: {$elm['author_name']}</p>
                                        <span class='students'>125 students</span>
                                    </div>
                                </div>
                            ";
                        }

                    ?>

                    

                    
                    
                </div>
            </div>
        </div>
    </div>

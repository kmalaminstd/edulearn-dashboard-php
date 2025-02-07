            <!-- Stats Cards -->
            <div class="stats-container">

                <?php

                    require "./functions/homepage/stat.php";

                    // var_dump($resp);

                    // var_dump($data['data']['data']);

                    if(!isset($statData['data']) || !$statData){
                        echo "<h4>No stat found</h4>";
                        exit;
                    }

                    $totalUser = $statData['data']['total_user'];
                    $totalTeacher = $statData['data']['total_teacher'];
                    $totalStudent = $statData['data']['total_student'];
                    $totalCourse = $statData['data']['total_course'];


                    echo " <div class='stat-card'>
                                                        <i class='fas fa-users'></i>
                                                        <div class='stat-info'>
                                                            <h3>Total Users</h3>
                                                            <span>$totalUser</span>
                                                        </div>
                                                    </div>
                                                    <div class='stat-card'>
                                                        <i class='fas fa-user-graduate'></i>
                                                        <div class='stat-info'>
                                                            <h3>Students</h3>
                                                            <span>{$totalStudent}</span>
                                                        </div>
                                                    </div>
                                                    <div class='stat-card'>
                                                        <i class='fas fa-chalkboard-teacher'></i>
                                                        <div class='stat-info'>
                                                            <h3>Teachers</h3>
                                                            <span>{$totalTeacher}</span>
                                                        </div>
                                                    </div>
                                                    <div class='stat-card'>
                                                        <i class='fas fa-video'></i>
                                                        <div class='stat-info'>
                                                            <h3>Courses</h3>
                                                            <span>{$totalCourse}</span>
                                                        </div>
                                                    </div>";
                ?>



                

            </div>

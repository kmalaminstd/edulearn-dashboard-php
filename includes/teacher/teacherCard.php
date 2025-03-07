<?php
    
    require "./functions/homepage/stat.php";
    require "./functions/users/teacherList.php";

?>

<div class="teacher-grid">

    <?php

    $totalTeacherNumber = $statData['data']['total_teacher'];

    $pagenumber = isset($_GET['page']) ? $_GET['page'] : 1;
    $frn = ceil($totalTeacherNumber / 10);

       // session_start();

       

       // var_dump($data['data']['data']);

       if(!isset($data['data']['data']) || !$data){
           echo "<h4>No student found</h4>";
       }

       // echo $decoded;

       foreach($data['data']['data'] as $user){
        $dataStr = new DateTime($user['created_at']);
        $formatedDate = $dataStr->format('F j, Y, g:i a');
        echo "<div class='teacher-card'>
        <div class='teacher-header'>
            <div class='profile-image'>
                <img src='". ($user['image_link'] ? $user['image_link'] : "./images/user.png") ."' alt='Teacher'>
            </div>
            <h3>{$user['username']}</h3>
            <p>{$user['email']}</p>
            <p>Joined: {$formatedDate}</p>
        </div>
        <div class='teacher-stats'>
            <div class='stat'>
                <i class='fas fa-video'></i>
                <div class='stat-info'>
                    <span>Total Courses</span>
                    <h4>{$user['number_of_course']}</h4>
                </div>
            </div>
        </div>
        <div class='teacher-actions'>
            <button class='btn view-btn'>
                <i class='fas fa-eye'></i> View Profile
            </button>
            <button class='btn delete-btn'>
                <i class='fas fa-trash'></i> Delete
            </button>
        </div>
        </div>";
        }
        
    

    ?>

    
</div>

<div class="pagination">

    
    <?php

        $i = 1;

        echo "<a href='?page=". ($i == 1 ? $i = 1 : "page?="($i - 1)) ."' class='button'>&laquo;</a>";

        while($i < $frn+1){

            echo "<a href='?page=". $i ."' class='button " . ($i == $frn ? "active " : "") ."'>$i</a>";

            $i++;
        }

        echo "<a href='". ($pagenumber == $frn ? "?page=".$frn : "?page=" . $pagenumber+1) ."' class='button'>&raquo;</a>";

    ?>
    
    
    
</div>

        </div>
    </div>



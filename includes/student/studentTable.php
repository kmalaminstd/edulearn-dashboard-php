<?php
    
    require "./functions/users/studentList.php";

?>

<div class="content-section">
                <div class="table-header">
                    <div class="search-box">
                        <input type="text" placeholder="Search students...">
                        <i class="fas fa-search"></i>
                    </div>
                    <!--
                    <div class="filters">
                        <select>
                            <option>All Courses</option>
                            <option>Web Development</option>
                            <option>Data Science</option>
                            <option>Mobile Development</option>
                        </select>
                        <button class="add-student-btn"><i class="fas fa-plus"></i> Add Student</button>
                    </div>
                    -->
                </div>

                <table class="student-table">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            
                            <th>Join Date</th>
                            
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php

                        // session_start();

                        

                        // var_dump($resp);

                        // var_dump($data['data']['data']);

                        if(!isset($data['data']['data']) || !$data){
                            echo "<h4>No student found</h4>";
                            exit;
                        }

                        // var_dump($data);
                        // echo $decoded;

                        foreach($data['data']['data'] as $user){
                            $dataStr = new DateTime($user['created_at']);
                            $formatedData = $dataStr->format('F j, Y, g:i a');
                            echo "<tr>
                                    <td>{$user['id']}</td>
                                    <td>
                                        <div class='student-info'>
                                            <img src='./images/graduating-student.png' alt='student'>
                                            <div>
                                                <span class='name'>{$user['username']}</span>
                                                <!-- <span class='enrollment'>Full-time</span> -->
                                            </div>
                                        </div>
                                    </td>
                                    <td>{$user['email']}</td>
                                    
                                    <td>{$formatedData}</td>
                                    
                                    <td class='actions'>
                                    <button class='action-btn edit'><i class='fas fa-edit'></i></button>
                                    <button class='action-btn delete'><i class='fas fa-trash'></i></button>
                                    </td>
                                </tr>";
                            }
                            
                            
                            
                            ?>
                            <!-- <button class='action-btn view"><i class='fas fa-eye'></i></button> -->

                        
                        <!-- Add more student rows as needed -->
                    </tbody>
                </table>

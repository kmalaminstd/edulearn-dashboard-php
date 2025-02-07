<!-- User List -->
<div class="content-section">
                <h2>Recent Users</h2>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>User Joined</th>
                            <th>Last Activity</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
 
                        // session_start();

                       require "./functions/users/recentUser.php";

                        // var_dump($data['data']['data']);

                        if(!isset($data['data']['user']) || !$data){
                            echo "<h4>No student found</h4>";
                        }

                        // echo $decoded;

                        foreach($data['data']['user'] as $user){
                            $dataStr = new DateTime($user['created_at']);
                            $formatedData = $dataStr->format('F j, Y, g:i a');

                            $lastActivity = strtotime($user['last_activity']);
                            $current_time = time();

                            $acDataStr = new Datetime($user['last_activity']);
                            $formatActDateStr = $acDataStr->format('F j, Y, g:i a');

                            $statusClass = ($user['isOnline'] == 'Online') ? "active" : "inActive";


                            echo "<tr>
                                <td>{$user['username']}</td>
                                <td>{$user['role_name']}</td>
                                <td>{$user['email']}</td>
                                <td>{$formatedData}</td>
                                <td>{$formatActDateStr}</td>
                                <td><span class='status {$statusClass}'>{$user['isOnline']}</span>
                            </tr>";
                            }
                            
                            
                            
                            ?>

                        <!-- <tr>
                            <td>John Doe</td>
                            <td>Student</td>
                            <td>john@example.com</td>
                            <td><span class="status active">Active</span></td>
                        </tr>
                        <tr>
                            <td>Jane Smith</td>
                            <td>Teacher</td>
                            <td>jane@example.com</td>
                            <td><span class="status active">Active</span></td>
                        </tr> -->
                    </tbody>
                </table>
            </div>

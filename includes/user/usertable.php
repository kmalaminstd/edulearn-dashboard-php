

<table class="user-table">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>User Joined</th>
                            <th>Last Activity</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php 

                            // session_start();

                            $page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1;

                            $curl = curl_init();
                            curl_setopt_array($curl, [
                                CURLOPT_URL => "http://localhost/eduwebbackend/userlist.php",
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_HTTPHEADER => [
                                    'Authorization: Bearer ' . $_SESSION['admin_token'],
                                    'Content-Type: application/json',
                                    'offset: ' . $page_number
                                ]
                            ]);

                            $curlResp = curl_exec($curl);
                            $data = json_decode($curlResp, true);
                            // print_r($data);

                            if(!$data || !isset($data['data']['user']) ){
                                echo "<h4> There are no user </h4>";
                            };

                            foreach($data['data']['user'] as $user) {
                                $joinDateStr = new DateTime($user['created_at']);
                                $joinDateFormat = $joinDateStr->format('F j, Y, g:i a');

                                $actDateStr = new DateTime($user['last_activity']);
                                $actDateFormat = $actDateStr->format('F j, Y, g:i a');

                                $lastActivity = strtotime($user['last_activity']);
                                $current_time = time();

                                $time_difference = $current_time - $lastActivity;

                                // calculate status
                                // $status = ($time_difference <= 300) ? "online" : "offline";
                                $statusClass = ($user['isOnline'] == 'Online') ? "active" : "inActive";


                                echo "<tr>
                            <td>#{$user['id']}</td>
                            <td>
                                <div class='user-info'>
                                    <img src='" . (isset($user['image_link']) ? $user['image_link'] : './images/user (1).png') . "' alt='user'>
                                    <span>{$user['username']}</span>
                                </div>
                            </td>
                            <td>{$user['email']}</td>
                            <td>{$joinDateFormat}</td>
                            <td>{$actDateFormat}</td>
                            <td>{$user['role_name']}</td>
                            <td><span class='status {$statusClass}'>{$user['isOnline']}</span></td>
                            <td class='actions'>
                                <button class='action-btn view'><i class='fas fa-eye'></i></button>
                                <button class='action-btn edit'><i class='fas fa-edit'></i></button>
                                <button class='action-btn delete'><i class='fas fa-trash'></i></button>
                            </td>
                        </tr>";
                            }

                            curl_close($curl);

                        ?>
                        
                        <!-- Add more user rows as needed -->
                    </tbody>
                </table>
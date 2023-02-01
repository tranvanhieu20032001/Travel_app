<?php include_once 'inc/header.php';?>
<?php include 'api/api.php';?>
        <!--**********************************
            Content body start
        ***********************************-->
        
        <div class="content-body">
                
            <div class="container-fluid mt-3">
            <div><h2>Danh sach tai khoan</h2></div>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Stt</th>
                        <th scope="col">Name Account</th>
                        <th scope="col">Full name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Type Account</th>
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                      </tr>
                    </thead>                   
                    <tbody id="list-categorya">
                    <?php 
					$stt=1;
                    $baseurl='http://localhost:8080/';
                    $record=get($baseurl.'account');                  
                    foreach($record as $data) {									
				?>
						<tr class="odd gradeX">
							<td><?php echo $stt++;?></td>
							<td><?php echo $data['nameAccount'];?></td>
                            <td><?php echo $data['fullName'];?></td>
                            <td><?php echo $data['email'];?></td>
                            <td><?php echo ($data['typeAccount'])==1?"user":($data['typeAccount']==2?"admin":"seller");?></td>
                            <td><?php if ($data['status']) echo 'Mở'; else echo 'Khóa';?></td>
                            <td><a href="lockaccount.php?id=<?php echo $data['id']?>" onclick="return confirm('Are you sure?')"><?php if ($data['status']) echo 'Lock'; else echo 'UnLock';?></a> </td>														
						</tr>
						<?php
				}
				?>
     
                    </tbody>
                  </table>


            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        <?php include_once 'inc/footer.php';?>
<?php include_once 'inc/header.php';?>
<?php include 'api/api.php';

$baseurl='http://localhost:8080/';?>
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="container-fluid mt-3">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Stt</th>
                        <th scope="col">Name</th>
                        <th scope="col">Content</th>
                        <th scope="col">Image</th>
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                      </tr>
                    </thead>                   
                    <tbody id="list-categorya">
                    <?php 
					$stt=1;
                    $record=get($baseurl."category");
                    foreach($record as $data) {									
				?>
						<tr class="odd gradeX">
							<td><?php echo $stt++;?></td>
							<td><?php echo $data['name'];?></td>
                            <td><?php echo $data['content'];?></td>
                            <td><img src="./<?php echo $data['image']?>" alt="" width="50px"></td>
                            <td><?php if ($data['status']) echo 'Mở'; else echo 'Khóa';?></td>
                            <td><a href="editcategory.php?id=<?php echo $data['id']?>">Edit</a> || <a href="deletecategory.php?id=<?php echo $data['id']?>"  onclick="return confirm('Are you sure?')">Delete</a></td>
														
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
        <?php include 'inc/footer.php';?>
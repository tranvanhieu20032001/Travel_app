<?php include 'inc/header.php';?>
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
                        <th scope="col">Rate tax</th>
                        <th scope="col">Date start</th>
                        <th scope="col">Date end</th>
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                      </tr>
                    </thead>                   
                    <tbody id="list-categorya">
                    <?php 
					$stt=1;
                    $record=get($baseurl."tax");
                    foreach($record as $data) {									
				?>
						<tr class="odd gradeX">
							<td><?php echo $stt++;?></td>
							<td><?php echo $data['name'];?></td>
                            <td><?php echo $data['rateTax'];?></td>
                            <td><?php
                            if($data['dateStart']==null) echo "----"; else{ 
                            $date=date_create($data['dateStart']);
                            echo date_format($date,"d/m/Y");}?></td>
                            <td><?php 
                            if($data['dateEnd']==null) echo "----"; else{
                            $date=date_create($data['dateEnd']);
                            echo date_format($date,"d/m/Y");}?></td>
                            <td><?php if ($data['status']) echo 'Mở'; else echo 'Khóa';?></td>
                            <td><a href="edittax.php?id=<?php echo $data['id']?>">Edit</a> || <a href="deletetax.php?id=<?php echo $data['id']?>">Delete</a></td>														
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
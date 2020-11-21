<table class="table table-bordered table-striped" style="margin-right:-10px">
							<thead>
							  <tr>
								<th>Term</th>
								<th>Semester</th>
								<th>School Year</th>
								<th>Status</th>
								<th>Action</th>
								
								
							  </tr>
							</thead>
							
		<?php
				include('../dist/includes/dbcon.php');
				$query=mysqli_query($con,"select * from settings order by sy desc")or die(mysqli_error());
					
					while($row=mysqli_fetch_array($query)){
						$id=$row['settings_id'];
						$sem=$row['sem'];
						$term=$row['term'];
						$sy=$row['sy'];
						$status=$row['status'];
						if ($status=="active") $flag="success"; else $flag="danger";
						
		?>
							  <tr>
								<td><?php echo $term;?></td>
								<td><?php echo $sem;?></td>
								<td><?php echo $sy;?></td>	
								<td><span class="label label-<?php echo $flag;?>"><?php echo $status;?></span></td>		
								<td>
								<a id="removeme" href="activate.php?id=<?php echo $id;?>">
								Set</a>
								<a id="removeme" href="settings_del.php?id=<?php echo $id;?>">
								<i class="glyphicon glyphicon-trash text-red"></i></a>
								</td>
				
							  </tr>

							
<?php }?>					  
</table>  

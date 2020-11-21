 <option></option>
                                                            <?php
                                                            $dept  = $_SESSION['dept_id'];
                                                            $query2 = mysqli_query($con, "select * from subject where dept_id = '$dept'")or die(mysqli_error($con));
                                                            while ($row = mysqli_fetch_array($query2)) {
                                                                ?>
                                                                <option><?php echo $row['subject_title']; ?></option>
                                                            <?php }
                                                            ?> 
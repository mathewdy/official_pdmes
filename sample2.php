
<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Total Remakrs</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include('connection.php');



        $sql = "SELECT COUNT(remarks) AS 'total_remarks' , lrn FROM student_final_ratings WHERE phase = '1' AND lrn = '109857060083' AND remarks= 'FAILED' ";
        $run = mysqli_query($conn,$sql);

        if(mysqli_num_rows($run) > 0){
            $number = 0;
            foreach($run as $row){

                

                $number++;

                if($row ['total_remarks'] >= 3){
                    echo "<h2> retained </h2> "; 
                }else if ($row ['total_remarks'] == 2){
                    echo "Remedial";
                }else if($row['total_remarks'] <= 1){
                    echo " <h2> Promoted </h2>";
                }
                ?>

                    <tr>
                        <td><?php echo $number; ?></td>
                        <td><?php echo $row ['total_remarks']?></td>

                    

                        <br>

                        
                    </tr>

                    


                <?php
                

                
            }
            
        }


        

        ?>

    </tbody>
</table>

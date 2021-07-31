<?php 
    include_once ('../connectionDB.php');


    if(isset($_REQUEST['action']))
    {
        $action = $_REQUEST['action'];
        if($action == 'ChangeDate')
        {
            $query = "select * from tbl_book where venue_id =".$_REQUEST['id']." and event_date='".$_REQUEST['date']."' and status='A'";
            $result = mysqli_query($conn,$query);


            $myarray = "";
            $ses = "";
    ?>

    <?php while($row = mysqli_fetch_assoc($result)): 


        $ses .= $row['session'].',';
        $myarray = trim($ses,",");

        ?>


    <?php endwhile; 

        if($myarray != "")
        {

            $sql = "select * from tbl_venue where venue_id ='".$_REQUEST['id']."' and status='A'";

            $res = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_assoc($res))
            {

        ?>

          <input type="radio" class="option-input radio" name="session" value="Morning" <?php if($myarray == 'Morning' || $myarray == 'Morning,Evening' || $myarray == 'Evening,Morning' || $myarray == 'FullDay' || $row['morning_rent'] == 0){ ?> disabled <?php } ?> > &nbsp;&nbsp;
          <h3 class="radio-label">Morning</h3>

          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

          <input type="radio" class="option-input radio" name="session" value="Evening" <?php if($myarray == 'Evening' || $myarray == 'Morning,Evening' || $myarray == 'Evening,Morning' || $myarray == 'FullDay' || $row['evening_rent'] == 0 ){ ?> disabled <?php } ?>  > &nbsp;&nbsp;
          <h3 class="radio-label">Evening</h3>

          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

          <input type="radio" class="option-input radio" name="session" value="FullDay" <?php if($myarray == 'Morning' || $myarray == 'FullDay' || $myarray == 'Evening' || $myarray == 'Morning,Evening' || $myarray == 'Evening,Morning' || $row['full_day_rent'] == 0){ ?> disabled <?php } ?> > &nbsp;&nbsp;
          <h3 class="radio-label">Full Day</h3>


        <?php

            }

        }
            if(mysqli_num_rows($result) == 0)
            {

                $query1 = "select * from tbl_venue where venue_id =".$_REQUEST['id'];

                $result1 = mysqli_query($conn, $query1);

                while($row = mysqli_fetch_assoc($result1)): 
     ?>


            <input type="radio" class="option-input radio" name="session" value="Morning" <?php if($row['morning_rent'] == 0 ){ ?> disabled <?php } ?> > &nbsp;&nbsp;
            <h3 class="radio-label">Morning</h3>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <input type="radio" class="option-input radio" name="session" value="Evening" <?php if($row['evening_rent'] == 0 ){ ?> disabled <?php } ?>  > &nbsp;&nbsp;
            <h3 class="radio-label">Evening</h3>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <input type="radio" class="option-input radio" name="session" value="FullDay" <?php if($row['full_day_rent'] == 0 ){ ?> disabled <?php } ?>  > &nbsp;&nbsp;
            <h3 class="radio-label">Full Day</h3>


    <?php endwhile; 
    
            } 

        }
    }   


    ?>


  
  
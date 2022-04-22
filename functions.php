<?php 

function updateTotaluren($user_id, $conn) {
    $query = "SELECT sum(uren) as total FROM reports WHERE user_id= $user_id";
    $result=$conn->query($query);
    if ($result === FALSE) {
        echo "error" . $query . "<br />" . $conn->error;
        return FALSE;
    } else {
        if ($result->num_rows>0) {
            while($row=$result->fetch_assoc())
            {
                $total = $row['total'];
            }
        }
    }
    
    if (!$total) $total = 0;
    $query = "UPDATE users SET totaal = $total WHERE id =" . $user_id;
    $result = $conn->query($query);
    if ( $result === FALSE) {
        echo "error" . $query . "<br />" . $conn->error;
        return FALSE;
    } else {
        return true;
    }

}

?>
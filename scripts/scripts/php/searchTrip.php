<?php
function getResultSearch($partenza,$destinazione,$tripStart) {
    require_once("DBconnect.php");
    $conn = connectDB();

    $partenza = $conn->real_escape_string($partenza);
    $destinazione = $conn->real_escape_string($destinazione);
    $tripStart = $conn->real_escape_string($tripStart);
    
    $query = 'SELECT id, partenza, destinazione, dataPartenza, oraPartenza FROM voli WHERE partenza = ? AND destinazione = ?  AND dataPartenza = ?';

    if(!$stmt = $conn->prepare($query)){
        echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
    }
    if(!$stmt->bind_param('sss', $partenza, $destinazione, $tripStart)){
        echo "Binding parameters failed: (" . $conn->errno . ") " . $conn->error;
    }
    if(!$stmt->execute()){
        echo "Execute failed: (" . $conn->errno . ") " . $conn->error;
    }
    $res = $stmt->get_result();
    $conn->close();
    return $res;
}
?>

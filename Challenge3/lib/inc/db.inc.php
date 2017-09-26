<?php
try{ // make db connection
        // This is the new standard db connection
        $db = new PDO('mysql:host=localhost;dbname=challenge3', 'root', 'root');
        $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        //Turn OFF emulated prepared statements!
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
        echo "<p>Could not connect to database.</p>";
        echo "<p>".$e->getMessage()."</p>";
}

?>

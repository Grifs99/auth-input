<?php
echo "Starting installation...<br>";
if (is_writable("src") === false) {
    echo "Folder 'src' is not writable. Modify permissions and run install.php again<br>";
}
else {
    include ("src/Database.php");
    $db = new Database();
    $db->createTables();
    echo "Database created!<br>";
}

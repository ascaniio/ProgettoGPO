<?php
session_start();
session_destroy(); // Distruggi la sessione
header("Location: login.php"); // Torna al login
exit();

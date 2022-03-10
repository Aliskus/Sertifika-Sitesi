<?php
session_start();
session_destroy();
header('Location: /sertifika/index.php');
<?php
// php/header.php
$current = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($pageTitle) ? $pageTitle . ' | F1 Hub' : 'F1 Hub' ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Barlow+Condensed:wght@400;600;700&family=Barlow:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<body>

<nav class="navbar">
    <a href="index.php" class="logo">F1 <span>HUB</span></a>
    <ul class="nav-links">
        <li><a href="index.php"                <?= $current=='index.php'        ? 'class="active"':'' ?>>Home</a></li>
        <li><a href="teams.php"                <?= $current=='teams.php'        ? 'class="active"':'' ?>>Teams</a></li>
        <li><a href="drivers.php"              <?= $current=='drivers.php'      ? 'class="active"':'' ?>>Drivers</a></li>
        <li><a href="standings.php"            <?= $current=='standings.php'    ? 'class="active"':'' ?>>Driver Standings</a></li>
        <li><a href="constructors.php"         <?= $current=='constructors.php' ? 'class="active"':'' ?>>Constructor Standings</a></li>
    </ul>
    <div class="hamburger" onclick="toggleMenu()">
        <span></span><span></span><span></span>
    </div>
</nav>

<div class="page-wrap">


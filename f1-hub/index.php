<?php
$pageTitle = 'Home';
require_once 'php/config.php';
require_once 'php/header.php';

$conn = getDBConnection();

// Count teams and drivers for stats
$totalTeams   = $conn->query("SELECT COUNT(*) as c FROM teams")->fetch_assoc()['c'];
$totalDrivers = $conn->query("SELECT COUNT(*) as c FROM drivers")->fetch_assoc()['c'];
$totalWins    = $conn->query("SELECT SUM(wins) as c FROM drivers")->fetch_assoc()['c'];

// Get top 4 drivers by points for preview
$topDrivers = $conn->query("
    SELECT d.*, t.name AS team_name, t.color AS team_color
    FROM drivers d
    LEFT JOIN teams t ON d.team_id = t.id
    ORDER BY d.points DESC
    LIMIT 4
");

$conn->close();
?>

<!-- HERO -->
<section class="hero">
    <div class="hero-content">
        <div class="hero-tag">&#9873; 2025 Formula 1 World Championship</div>
        <h1>The <span>Fastest</span><br>Sport on Earth</h1>
        <p>Your complete guide to F1 teams, drivers, and championship standings for the 2025 season.</p>
        <div class="hero-btns">
            <a href="teams.php"   class="btn btn-red">View Teams &rarr;</a>
            <a href="standings.php" class="btn btn-outline">Standings</a>
        </div>
    </div>
</section>

<!-- STATS -->
<div class="stats-row">
    <div class="stat"><div class="num"><?= $totalTeams ?></div><div class="lbl">Teams</div></div>
    <div class="stat"><div class="num"><?= $totalDrivers ?></div><div class="lbl">Drivers</div></div>
    <div class="stat"><div class="num">24</div><div class="lbl">Races in 2025</div></div>
    <div class="stat"><div class="num">75+</div><div class="lbl">Years of F1</div></div>
</div>

<!-- TOP DRIVERS PREVIEW -->
<section class="section">
    <h2 class="section-title">Top <span>Drivers</span> by Points</h2>
    <div class="red-line"></div>
    <div class="drivers-grid">
        <?php while ($d = $topDrivers->fetch_assoc()): ?>
        <div class="driver-card">
            <div class="bg-num"><?= $d['number'] ?></div>
            <div class="color-bar" style="background:<?= htmlspecialchars($d['team_color']) ?>"></div>
            <div class="team-name"><?= htmlspecialchars($d['team_name']) ?></div>
            <h3><?= htmlspecialchars($d['name']) ?></h3>
            <p class="nat">&#127760; <?= htmlspecialchars($d['nationality']) ?></p>
            <div class="driver-stats">
                <div class="ds-item"><div class="ds-val"><?= $d['championships'] ?></div><div class="ds-lbl">Titles</div></div>
                <div class="ds-item"><div class="ds-val"><?= $d['wins'] ?></div><div class="ds-lbl">Wins</div></div>
                <div class="ds-item"><div class="ds-val"><?= $d['points'] ?></div><div class="ds-lbl">Pts</div></div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
    <div style="text-align:center; margin-top:2rem;">
        <a href="drivers.php" class="btn btn-outline">View All Drivers &rarr;</a>
    </div>
</section>

<!-- ABOUT STRIP -->
<section class="section" style="background:var(--dark2); border-top:1px solid var(--border);">
    <h2 class="section-title">About <span>F1 Hub</span></h2>
    <div class="red-line"></div>
    <p style="color:var(--gray); max-width:600px; line-height:1.9; margin-bottom:1.5rem;">
        F1 Hub is your go-to source for everything Formula 1. Explore all 10 constructor teams,
        all 20 drivers, and the full championship standings for the 2025 season.
        Data is pulled live from our database so it's always up to date.
    </p>
    <a href="constructors.php" class="btn btn-red">Constructor Standings &rarr;</a>
</section>

<?php require_once 'php/footer.php'; ?>

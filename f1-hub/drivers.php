<?php
$pageTitle = 'Drivers';
require_once 'php/config.php';
require_once 'php/header.php';

$conn = getDBConnection();

// Get all teams for filter buttons
$teamsResult = $conn->query("SELECT id, name, color FROM teams ORDER BY name");
$teams = [];
while ($t = $teamsResult->fetch_assoc()) $teams[] = $t;

// Get all drivers with their team info
$drivers = $conn->query("
    SELECT d.*, t.name AS team_name, t.color AS team_color, t.id AS tid
    FROM drivers d
    LEFT JOIN teams t ON d.team_id = t.id
    ORDER BY t.name ASC, d.name ASC
");

$conn->close();
?>

<div class="page-header">
    <div class="tag">2025 Season</div>
    <h1>F1 <span>Drivers</span></h1>
    <p>All 20 drivers competing in the 2025 Formula 1 World Championship.</p>
</div>

<!-- FILTER BUTTONS -->
<div style="padding:1rem 3rem; background:var(--dark2); border-bottom:1px solid var(--border); display:flex; flex-wrap:wrap; gap:0.5rem;">
    <button class="filter-btn active" onclick="filterDrivers('all', this)">All Teams</button>
    <?php foreach ($teams as $t): ?>
    <button class="filter-btn" onclick="filterDrivers('<?= $t['id'] ?>', this)"
            style="border-color:<?= htmlspecialchars($t['color']) ?>20;">
        <?= htmlspecialchars($t['name']) ?>
    </button>
    <?php endforeach; ?>
</div>

<section class="section">
    <div class="drivers-grid" id="driversGrid">
        <?php while ($d = $drivers->fetch_assoc()): ?>
        <div class="driver-card" data-team="<?= $d['tid'] ?>">
            <div class="bg-num"><?= $d['number'] ?></div>
            <div class="color-bar" style="background:<?= htmlspecialchars($d['team_color']) ?>"></div>
            <div class="team-name"><?= htmlspecialchars($d['team_name']) ?></div>
            <h3><?= htmlspecialchars($d['name']) ?></h3>
            <p class="nat">&#127760; <?= htmlspecialchars($d['nationality']) ?></p>
            <p style="font-size:0.8rem; color:var(--gray); margin-bottom:0.5rem;">
                Car #<?= $d['number'] ?>
            </p>
            <div class="driver-stats">
                <div class="ds-item"><div class="ds-val"><?= $d['championships'] ?></div><div class="ds-lbl">Titles</div></div>
                <div class="ds-item"><div class="ds-val"><?= $d['wins'] ?></div><div class="ds-lbl">Wins</div></div>
                <div class="ds-item"><div class="ds-val"><?= $d['points'] ?></div><div class="ds-lbl">Pts</div></div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</section>

<!-- Filter button styles -->
<style>
.filter-btn {
    font-family: var(--cond); font-size: 0.82rem; font-weight: 700;
    letter-spacing: 1.5px; text-transform: uppercase;
    padding: 0.4rem 1rem; border-radius: 3px;
    border: 1px solid var(--border);
    background: transparent; color: var(--gray);
    cursor: pointer; transition: all .2s;
}
.filter-btn:hover, .filter-btn.active {
    border-color: var(--red); color: var(--white);
    background: rgba(232,0,45,0.1);
}
</style>

<script>
function filterDrivers(teamId, btn) {
    // Update active button
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');

    // Show/hide cards
    document.querySelectorAll('.driver-card').forEach(function(card) {
        if (teamId === 'all' || card.dataset.team === teamId) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}
</script>

<?php require_once 'php/footer.php'; ?>

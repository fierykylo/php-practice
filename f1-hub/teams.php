<?php
$pageTitle = 'Teams';
require_once 'php/config.php';
require_once 'php/header.php';

$conn  = getDBConnection();
$teams = $conn->query("SELECT * FROM teams ORDER BY name ASC");
$conn->close();
?>

<div class="page-header">
    <div class="tag">2025 Constructors</div>
    <h1>F1 <span>Teams</span></h1>
    <p>All 10 constructor teams competing in the 2025 Formula 1 World Championship.</p>
</div>

<section class="section">
    <div class="teams-grid">
        <?php while ($t = $teams->fetch_assoc()): ?>
        <div class="team-card">
            <div class="top-bar" style="background:<?= htmlspecialchars($t['color']) ?>"></div>
            <div class="body">
                <h3><?= htmlspecialchars($t['name']) ?></h3>
                <p class="base">&#128205; <?= htmlspecialchars($t['base']) ?></p>

                <!-- Team Details -->
                <div style="font-size:0.85rem; color:var(--gray); margin-bottom:0.5rem;">
                    <strong style="color:var(--white);">Full Name:</strong>
                    <?= htmlspecialchars($t['full_name']) ?>
                </div>

                <div class="meta">
                    <div class="meta-item">
                        <span>Team Principal</span>
                        <strong><?= htmlspecialchars($t['team_principal']) ?></strong>
                    </div>
                    <div class="meta-item" style="text-align:right;">
                        <span>Championships</span>
                        <strong style="font-family:var(--heading); font-size:1.6rem; color:<?= htmlspecialchars($t['color']) ?>">
                            <?= $t['championships'] ?>
                        </strong>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</section>

<?php require_once 'php/footer.php'; ?>

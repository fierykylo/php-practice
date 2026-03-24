<?php
$pageTitle = 'Constructor Standings';
require_once 'php/config.php';
require_once 'php/header.php';

$conn = getDBConnection();

// Sum up all driver points per team
$teams = $conn->query("
    SELECT t.id, t.name, t.color, t.championships, t.base, t.team_principal,
           SUM(d.points) AS total_points,
           SUM(d.wins)   AS total_wins,
           COUNT(d.id)   AS driver_count
    FROM teams t
    LEFT JOIN drivers d ON d.team_id = t.id
    GROUP BY t.id
    ORDER BY total_points DESC
");

$conn->close();
?>

<div class="page-header">
    <div class="tag">2025 Championship</div>
    <h1>Constructor <span>Standings</span></h1>
    <p>2025 Formula 1 World Constructors' Championship — teams ranked by total points scored by both drivers.</p>
</div>

<section class="section">
    <div class="table-wrap">
        <table class="f1-table">
            <thead>
                <tr>
                    <th>Pos</th>
                    <th>Team</th>
                    <th>Base</th>
                    <th>Team Principal</th>
                    <th>Drivers</th>
                    <th>Wins</th>
                    <th>WCC Titles</th>
                    <th>Points</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $pos = 1;
                while ($t = $teams->fetch_assoc()):
                    if ($pos == 1) $posClass = 'pos-1';
                    elseif ($pos == 2) $posClass = 'pos-2';
                    elseif ($pos == 3) $posClass = 'pos-3';
                    else $posClass = 'pos-other';
                ?>
                <tr>
                    <!-- Position -->
                    <td>
                        <span class="pos <?= $posClass ?>">P<?= $pos ?></span>
                    </td>

                    <!-- Team name with color bar -->
                    <td>
                        <div style="display:flex; align-items:center; gap:0.7rem;">
                            <div style="width:4px; height:24px; background:<?= htmlspecialchars($t['color']) ?>; border-radius:2px; flex-shrink:0;"></div>
                            <strong style="font-size:1rem;"><?= htmlspecialchars($t['name']) ?></strong>
                        </div>
                    </td>

                    <!-- Base -->
                    <td style="color:var(--gray); font-size:0.88rem;"><?= htmlspecialchars($t['base']) ?></td>

                    <!-- Team Principal -->
                    <td><?= htmlspecialchars($t['team_principal']) ?></td>

                    <!-- Number of drivers -->
                    <td style="text-align:center; color:var(--gray);"><?= $t['driver_count'] ?></td>

                    <!-- Wins -->
                    <td><?= $t['total_wins'] ?></td>

                    <!-- WCC Titles -->
                    <td>
                        <span style="font-family:var(--heading); font-size:1.4rem; color:<?= htmlspecialchars($t['color']) ?>">
                            <?= $t['championships'] ?>
                        </span>
                        <?php if ($t['championships'] > 0): ?>
                            <span style="color:var(--gold); font-size:0.7rem; margin-left:0.3rem;">
                                <?= str_repeat('★', min($t['championships'], 10)) ?>
                            </span>
                        <?php endif; ?>
                    </td>

                    <!-- Total Points -->
                    <td>
                        <strong style="font-family:var(--heading); font-size:1.5rem; color:var(--white);">
                            <?= $t['total_points'] ?>
                        </strong>
                    </td>
                </tr>
                <?php $pos++; endwhile; ?>
            </tbody>
        </table>
    </div>
</section>

<!-- VISUAL POINTS BAR CHART -->
<section class="section" style="background:var(--dark2); border-top:1px solid var(--border);">
    <h2 class="section-title">Points <span>Visualised</span></h2>
    <div class="red-line"></div>

    <?php
    $conn2   = getDBConnection();
    $barData = $conn2->query("
        SELECT t.name, t.color, SUM(d.points) AS total_points
        FROM teams t LEFT JOIN drivers d ON d.team_id = t.id
        GROUP BY t.id ORDER BY total_points DESC
    ");
    $maxPts = 0;
    $rows   = [];
    while ($r = $barData->fetch_assoc()) { $rows[] = $r; if ($r['total_points'] > $maxPts) $maxPts = $r['total_points']; }
    $conn2->close();
    ?>

    <div style="display:flex; flex-direction:column; gap:0.8rem; max-width:700px;">
        <?php foreach ($rows as $r):
            $pct = $maxPts > 0 ? round(($r['total_points'] / $maxPts) * 100) : 0;
        ?>
        <div>
            <div style="display:flex; justify-content:space-between; margin-bottom:0.3rem; font-family:var(--cond); font-size:0.88rem;">
                <span><?= htmlspecialchars($r['name']) ?></span>
                <span style="color:var(--gray);"><?= $r['total_points'] ?> pts</span>
            </div>
            <div style="background:var(--border); border-radius:3px; height:10px; overflow:hidden;">
                <div style="width:<?= $pct ?>%; height:100%; background:<?= htmlspecialchars($r['color']) ?>; border-radius:3px; transition:width .5s;"></div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<?php require_once 'php/footer.php'; ?>

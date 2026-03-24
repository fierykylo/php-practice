<?php
$pageTitle = 'Driver Standings';
require_once 'php/config.php';
require_once 'php/header.php';

$conn = getDBConnection();

// All drivers sorted by points
$drivers = $conn->query("
    SELECT d.*, t.name AS team_name, t.color AS team_color
    FROM drivers d
    LEFT JOIN teams t ON d.team_id = t.id
    ORDER BY d.points DESC, d.wins DESC
");

$conn->close();
?>

<div class="page-header">
    <div class="tag">2025 Championship</div>
    <h1>Driver <span>Standings</span></h1>
    <p>2025 Formula 1 World Drivers' Championship standings, ordered by points.</p>
</div>

<section class="section">
    <div class="table-wrap">
        <table class="f1-table">
            <thead>
                <tr>
                    <th>Pos</th>
                    <th>Driver</th>
                    <th>Team</th>
                    <th>Nationality</th>
                    <th>Car #</th>
                    <th>Wins</th>
                    <th>Points</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $pos = 1;
                while ($d = $drivers->fetch_assoc()):
                    // Set position colour class
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

                    <!-- Driver name + world championship stars -->
                    <td>
                        <strong><?= htmlspecialchars($d['name']) ?></strong>
                        <?php if ($d['championships'] > 0): ?>
                            <span style="color:var(--gold); font-size:0.75rem; margin-left:0.4rem;">
                                <?= str_repeat('★', $d['championships']) ?>
                            </span>
                        <?php endif; ?>
                    </td>

                    <!-- Team with colour bar -->
                    <td>
                        <div style="display:flex; align-items:center; gap:0.5rem;">
                            <div style="width:3px; height:18px; background:<?= htmlspecialchars($d['team_color']) ?>; border-radius:2px;"></div>
                            <span style="color:var(--gray);"><?= htmlspecialchars($d['team_name']) ?></span>
                        </div>
                    </td>

                    <!-- Nationality -->
                    <td style="color:var(--gray);"><?= htmlspecialchars($d['nationality']) ?></td>

                    <!-- Car number -->
                    <td>
                        <span style="font-family:var(--heading); font-size:1.3rem; color:<?= htmlspecialchars($d['team_color']) ?>">
                            <?= $d['number'] ?>
                        </span>
                    </td>

                    <!-- Wins -->
                    <td><?= $d['wins'] ?></td>

                    <!-- Points -->
                    <td>
                        <strong style="font-family:var(--heading); font-size:1.4rem;">
                            <?= $d['points'] ?>
                        </strong>
                    </td>
                </tr>
                <?php $pos++; endwhile; ?>
            </tbody>
        </table>
    </div>
</section>

<?php require_once 'php/footer.php'; ?>

<?php
$page_title = 'Students Report';
require_once '../../session.php';
require_once '../../connect.php';
require_once 'index.php';

$type = $_GET['type'] ?? 'best';

switch($type) {
    case 'poor':
        $title = "Poor Condition Places";
        $query = "SELECT * from building
                  WHERE bcondition='poor'";
        break;
    case 'measures':
        $title = "Required Measures";
        $query = "SELECT * FROM building ";
        break;
    default:
        $title = "Best Condition";
        $query = "SELECT *
                  FROM building
                  WHERE bcondition='good' ";
}

$result = $con->query($query);
?>

<div class="content" style="margin-top:1px; margin-left:200px; margin-right=200px;">
    <div  class="page-header">
        <div>
            <h1><?php echo $title; ?></h1>
        </div>
        <button onclick="window.print()" class="btn btn-primary">🖨️ Print</button>
    </div>

    <div class="card" style="margin-bottom: 20px; background: linear-gradient(135deg, #30cfd0 0%, #330867 100%); border: none;">
        <div class="card-body">
            <div class="btn-group" style="display: flex; gap: 10px; flex-wrap: wrap;">
                <a href="?type=best" class="btn" style="<?php echo $type == 'best' ? 'background: white; color: #330867;' : 'background: rgba(255,255,255,0.2); color: white; border: 1px solid rgba(255,255,255,0.3);'; ?>">👑 Best Condition</a>
                <a href="?type=poor" class="btn" style="<?php echo $type == 'poor' ? 'background: white; color: #330867;' : 'background: rgba(255,255,255,0.2); color: white; border: 1px solid rgba(255,255,255,0.3);'; ?>">⚠️ Poor Condition</a>
                <a href="?type=measures" class="btn" style="<?php echo $type == 'measures' ? 'background: white; color: #330867;' : 'background: rgba(255,255,255,0.2); color: white; border: 1px solid rgba(255,255,255,0.3);'; ?>">💎Measures</a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h2><?php echo $title; ?></h2>
            <span><?php echo date('M d, Y'); ?></span>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                    <?php if($type == 'best'): ?>
                            <th>Name</th>
                            <th>Condition</th>
                        <?php elseif($type == 'poor'): ?>
                            <th>Name</th>
                            <th>Condition</th>
                            <th>Measures</th>
                        <?php elseif($type == 'measures'): ?>
                            <th>Name</th>
                            <th>Measures</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php if($result->num_rows > 0): ?>
                        <?php 
                        $rank = 0;
                        while($row = $result->fetch_assoc()): 
                            $rank++;
                        ?>
                        <tr>
                            <?php if($type == 'best'): ?>
                                <td><strong><?php echo htmlspecialchars($row['name']); ?></strong></td>
                                <td><?php echo htmlspecialchars($row['bcondition'] ?? '-'); ?></td>
                            <?php elseif($type == 'poor'): ?>
                                <td><strong><?php echo htmlspecialchars($row['name']); ?></strong></td>
                                <td><?php echo htmlspecialchars($row['bcondition'] ?? '-'); ?></td>
                                <td><?php echo htmlspecialchars($row['measures'] ?? '-'); ?></td>    
                            <?php elseif($type == 'measures'): ?>
                                <td><?php echo htmlspecialchars($row['name'] ?? '-'); ?></td>
                                <td><?php echo htmlspecialchars($row['measures'] ?? '-'); ?></td>
                            <?php endif; ?>
                        </tr>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
@media print {
    .btn, .sidebar, .page-header .btn {
        display: none !important;
    }
}
</style>
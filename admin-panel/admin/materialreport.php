<?php
$page_title = 'Students Report';
require_once '../../session.php';
require_once '../../connect.php';
require_once 'index.php';

$type = $_GET['type'] ?? 'state';

switch($type) {
    case 'poor':
        $title = "Poor Condition Material";
        $query = "SELECT * from material
                  WHERE mcondition='poor'";
        break;
    case 'required':
        $title = "Required Material";
        $query = "SELECT * FROM material ";
        break;
    case 'low':
        $title = "Low Stock Material";
        $query = "SELECT * FROM material WHERE
        amount<10";
        break;
    default:
        $title = "Material Condition";
        $query = "SELECT *
                  FROM material 
                   LIMIT 50";
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
                <a href="?type=state" class="btn" style="<?php echo $type == 'state' ? 'background: white; color: #330867;' : 'background: rgba(255,255,255,0.2); color: white; border: 1px solid rgba(255,255,255,0.3);'; ?>">📋 Current State</a>
                <a href="?type=poor" class="btn" style="<?php echo $type == 'poor' ? 'background: white; color: #330867;' : 'background: rgba(255,255,255,0.2); color: white; border: 1px solid rgba(255,255,255,0.3);'; ?>">⚠️ Poor Condition</a>
                <a href="?type=required" class="btn" style="<?php echo $type == 'required' ? 'background: white; color: #330867;' : 'background: rgba(255,255,255,0.2); color: white; border: 1px solid rgba(255,255,255,0.3);'; ?>">💎Required</a>
                <a href="?type=low" class="btn" style="<?php echo $type == 'low' ? 'background: white; color: #330867;' : 'background: rgba(255,255,255,0.2); color: white; border: 1px solid rgba(255,255,255,0.3);'; ?>"> 🚫 Low Stock Material</a>
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
                    <?php if($type == 'state'): ?>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Condition</th>
                            <th>Amount</th>
                            <th>Required</th>
                        <?php elseif($type == 'poor'): ?>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Condition</th>
                        <?php elseif($type == 'required'): ?>
                            <th>Name</th>
                            <th>Total</th>
                            <th>Required</th>
                        <?php elseif($type == 'low'): ?>
                            <th>Name</th>
                            <th>Type</th>
                           <th>Total</th>
                            <th>Required</th>
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
                            <?php if($type == 'state'): ?>
                                <td><strong>#<?php echo $rank; ?></strong></td>
                                <td><strong><?php echo htmlspecialchars($row['name']); ?></strong></td>
                                <td><?php echo htmlspecialchars($row['type'] ?? '-'); ?></td>
                                 <td><?php echo htmlspecialchars($row['mcondition'] ?? '-'); ?></td>
                                <td><?php echo $row['amount']; ?></td>
                                <td><?php echo $row['required']; ?></td>
                            <?php elseif($type == 'poor'): ?>
                                <td><strong><?php echo htmlspecialchars($row['name']); ?></strong></td>
                                <td><?php echo htmlspecialchars($row['type'] ?? '-'); ?></td>
                                <td><?php echo htmlspecialchars($row['mcondition'] ?? '-'); ?></td>    
                            <?php elseif($type == 'required'): ?>
                                <td><?php echo htmlspecialchars($row['name'] ?? '-'); ?></td>
                                  <td><?php echo htmlspecialchars($row['amount'] ?? '-'); ?></td>
                                <td><?php echo htmlspecialchars($row['required'] ?? '-'); ?></td>
                            <?php elseif($type == 'low'): ?>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['type']; ?></td>
                                <td><?php echo $row['amount']; ?></td>
                                 <td><?php echo htmlspecialchars($row['required'] ?? '-'); ?></td>
                            <?php endif; ?>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="<?php echo $type == 'poor' ? 1 : ($type == 'required' ? 1 : ($type == 'low' ? 1 : 1)); ?>" class="text-center">No data available</td>
                        </tr>
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
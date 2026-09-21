<?php
$page_title = 'Students Report';
require_once '../../session.php';
require_once '../../connect.php';
require_once 'index.php';

$type = $_GET['type'] ?? 'list';

switch($type) {
    case 'top':
        $title = "Top Class";
        $query = "SELECT * from examresult
                  WHERE obtained_marks>=80
                  GROUP BY `class`
                 ORDER BY `obtained_marks` DESC";
        break;
    case 'academic':
        $title = "Class Academic History";
        $query = "SELECT * FROM tresult
         ORDER BY `class`
                  LIMIT 50";
        break;
    case 'cocurricular':
        $title = "Co-curricular Summary";
        $query = "SELECT 
                  studentname,name,date,class
                  FROM cocurricular
                  GROUP BY class";
        break;
    default:
        $title = "Class List";
        $query = "SELECT *
                  FROM classes c
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
                <a href="?type=list" class="btn" style="<?php echo $type == 'list' ? 'background: white; color: #330867;' : 'background: rgba(255,255,255,0.2); color: white; border: 1px solid rgba(255,255,255,0.3);'; ?>">📋 Class List</a>
                <a href="?type=top" class="btn" style="<?php echo $type == 'top' ? 'background: white; color: #330867;' : 'background: rgba(255,255,255,0.2); color: white; border: 1px solid rgba(255,255,255,0.3);'; ?>">👑 Top Classes</a>
                <a href="?type=academic" class="btn" style="<?php echo $type == 'academic' ? 'background: white; color: #330867;' : 'background: rgba(255,255,255,0.2); color: white; border: 1px solid rgba(255,255,255,0.3);'; ?>">🛍️ Academic History</a>
                <a href="?type=cocurricular" class="btn" style="<?php echo $type == 'cocurricular' ? 'background: white; color: #330867;' : 'background: rgba(255,255,255,0.2); color: white; border: 1px solid rgba(255,255,255,0.3);'; ?>">📊 CO-curricular Summary</a>
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
                        <?php if($type == 'list'): ?>
                            <th>Class Name</th>
                            <th>Total Students</th>
                            <th>Total Sections</th>
                            <th>Class Head</th>
                        <?php elseif($type == 'top'): ?>
                            <th>Rank</th>
                            <th>Class</th>
                            <th>Student Name</th>
                            <th>Subject</th>
                            <th>Total Marks</th>
                            <th>Obtained Marks</th>
                        <?php elseif($type == 'academic'): ?>
                            <th>Class</th>
                            <th>Type</th>
                            <th>Subject</th>
                            <th>Total Marks</th>
                            <th>Obtained Marks</th>
                        <?php elseif($type == 'cocurricular'): ?>
                            <th>Class</th>
                            <th>Student Name</th>
                            <th>Activity</th>
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
                            <?php if($type == 'list'): ?>
                                <td><strong><?php echo htmlspecialchars($row['name']); ?></strong></td>
                                <td><?php echo htmlspecialchars($row['total_students'] ?? '-'); ?></td>
                                <td><?php echo htmlspecialchars($row['total_sections'] ?? '-'); ?></td>
                                <td><?php echo htmlspecialchars($row['class_head'] ?? '-'); ?></td>
                            <?php elseif($type == 'top'): ?>
                                <td><strong>#<?php echo $rank; ?></strong></td>
                                <td><strong><?php echo htmlspecialchars($row['class']); ?></strong></td>
                                <td><?php echo htmlspecialchars($row['studentname'] ?? '-'); ?></td>
                                 <td><?php echo htmlspecialchars($row['subject'] ?? '-'); ?></td>
                                <td><?php echo $row['total_marks']; ?></td>
                                <td><?php echo $row['obtained_marks']; ?></td>
                            <?php elseif($type == 'academic'): ?>
                                <td><?php echo htmlspecialchars($row['class'] ?? '-'); ?></td>
                                 <td><?php echo htmlspecialchars($row['type'] ?? '-'); ?></td>
                                  <td><?php echo htmlspecialchars($row['subject'] ?? '-'); ?></td>
                                <td><?php echo htmlspecialchars($row['total_marks'] ?? '-'); ?></td>
                                <td><?php echo htmlspecialchars($row['obtained_marks'] ?? '-'); ?></td>
                            <?php elseif($type == 'cocurricular'): ?>
                                <td><?php echo $row['class']; ?></td>
                                <td><?php echo $row['studentname']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                            <?php endif; ?>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="<?php echo $type == 'top' ? 8 : ($type == 'academic' ? 6 : ($type == 'cocurricular' ? 4 : 7)); ?>" class="text-center">No data available</td>
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

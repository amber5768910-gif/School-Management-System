<?php
$page_title = 'Students Report';
require_once '../../session.php';
require_once '../../connect.php';
require_once 'index.php';

$type = $_GET['type'] ?? 'attendance';

switch($type) {
    case 'punctual':
        $title = "Most Punctual";
        $query = "SELECT * from teachertime
                  GROUP BY `teachername`
                 ORDER BY `time_of_arrival` ASC";
        break;
    case 'lectures':
        $title = "Teacher's Lecture History";
        $query = "SELECT * FROM subjects";
        break;
    case 'subject':
        $title = "Subject Performance";
        $query = "SELECT *
                  FROM examresult
                  ORDER BY obtained_marks DESC";
        break;
    default:
        $title = "Teacher's Attendance";
        $query = "SELECT *
                  FROM teachers
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
                <a href="?type=attendance" class="btn" style="<?php echo $type == 'attendance' ? 'background: white; color: #330867;' : 'background: rgba(255,255,255,0.2); color: white; border: 1px solid rgba(255,255,255,0.3);'; ?>">📋Teacher's Attendance</a>
                <a href="?type=punctual" class="btn" style="<?php echo $type == 'punctual' ? 'background: white; color: #330867;' : 'background: rgba(255,255,255,0.2); color: white; border: 1px solid rgba(255,255,255,0.3);'; ?>">👑 Most Punctual</a>
                <a href="?type=lectures" class="btn" style="<?php echo $type == 'lectures' ? 'background: white; color: #330867;' : 'background: rgba(255,255,255,0.2); color: white; border: 1px solid rgba(255,255,255,0.3);'; ?>">🛍️Lectures Delivered</a>
                <a href="?type=subject" class="btn" style="<?php echo $type == 'subject' ? 'background: white; color: #330867;' : 'background: rgba(255,255,255,0.2); color: white; border: 1px solid rgba(255,255,255,0.3);'; ?>">📊 Subject's Performance</a>
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
                        <?php if($type == 'attendance'): ?>
                            <th>Teacher Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Gender</th>
                             <th>Attendance</th>
                        <?php elseif($type == 'punctual'): ?>
                            <th>Teacher Name</th>
                            <th>Time Of Arrival</th>
                            <th>Time Of Departure</th>
                        <?php elseif($type == 'lectures'): ?>
                             <th>Teacher Name</th>
                            <th>Subject Name</th>
                            <th>Today Activity</th>
                        <?php elseif($type == 'subject'): ?>
                            <th>Teacher Name</th>
                            <th>Subject Name</th>
                            <th>Total Marks</th>
                            <th>Obtained Marks</th>
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
                            <?php if($type == 'attendance'): ?>
                                <td><strong><?php echo htmlspecialchars($row['name']); ?></strong></td>
                                <td><?php echo htmlspecialchars($row['contact'] ?? '-'); ?></td>
                                <td><?php echo htmlspecialchars($row['email'] ?? '-'); ?></td>
                                <td><?php echo htmlspecialchars($row['gender'] ?? '-'); ?></td>
                                 <td><?php echo htmlspecialchars($row['attendance'] ?? '-'); ?></td>
                            <?php elseif($type == 'punctual'): ?>
                                <td><strong>#<?php echo $rank; ?></strong></td>
                                <td><strong><?php echo htmlspecialchars($row['teachername']); ?></strong></td>
                                <td><?php echo htmlspecialchars($row['time_of_arrival'] ?? '-'); ?></td>
                                <td><?php echo $row['time_of_departure']; ?></td>
                            <?php elseif($type == 'lectures'): ?>
                                <td><?php echo htmlspecialchars($row['teachername'] ?? '-' ); ?></td>
                                <td><?php echo htmlspecialchars($row['name'] ?? '-'); ?></td>
                                 <td><?php echo htmlspecialchars($row['today_activity'] ?? '-'); ?></td>
                            <?php elseif($type == 'subject'): ?>
                                <td><?php echo $row['teacher']; ?></td>
                                <td><?php echo $row['subject']; ?></td>
                                <td><?php echo $row['total_marks']; ?></td>
                                <td><?php echo $row['obtained_marks']; ?></td>
                            <?php endif; ?>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="<?php echo $type == 'punctual' ? 1 : ($type == 'lectures' ? 1 : ($type == 'subject' ? 1 : 1)); ?>" class="text-center">No data available</td>
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
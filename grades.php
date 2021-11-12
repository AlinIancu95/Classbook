<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <?php
                include "data.php";
                $matricol = $_GET['matricol'];
            ?>
            <h1><?php echo $students[$matricol]; ?></h1>
            <h2>Cod matricol: <?php echo $matricol; ?></h2>
            <table>
                <thead>
                    <tr>
                        <th>Note</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $subjectAverage = 0;
                    $totalSum = 0;
                    $totalAverage = 0;
                ?>
                <?php foreach ($subjects[$matricol] as $subject => $gradeList):?>
                    <tr>
                        <td>
                            <span class="badge badge-primary"><?php echo $courses[$subject]; ?>:</span>
                            <?php
                                $gradeSum = 0;
                               foreach($gradeList as $grade){
                                   echo $grade.' ';
                                   $gradeSum = $gradeSum + $grade;
                               }
                               $subjectAverage = number_format($gradeSum / count($gradeList), 2);
                            ?>
                            <strong>= <?php echo $subjectAverage?></strong>
                        </td>
                    </tr>
                    <?php
                        $totalSum = $totalSum + $subjectAverage;
                    ?>
                <?php endforeach;?>
                <?php
                    $totalAverage = number_format($totalSum / count($subjects[$matricol]), 2);
                ?>
                    <tr>
                        <?php if ($totalAverage < 5): ?>
                            <td>Media:<span class="badge badge-danger"> <?php echo $totalAverage; ?></span></td>
                        <?php else: ?>
                            <td><span class="badge badge-primary">Media:</span> <strong><?php echo $totalAverage; ?></strong></td>
                        <?php endif; ?>
                    </tr>
                </tbody>
            </table>
            <a href="index.php" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>
</body>
</html>

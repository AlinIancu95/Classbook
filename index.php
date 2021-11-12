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
                <?php include "data.php"; ?>
                <?php foreach ($students as $matricol => $name): ?>
                    <div class="card mt-2" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $name; ?> (<?php echo $matricol; ?>)</h5>
                            <?php
                            $subjectAverage = 0;
                            $totalSum = 0;
                            $totalAverage = 0;
                            ?>
                            <?php foreach ($subjects[$matricol] as $subject => $gradeList){
                                $gradeSum = 0;
                                foreach($gradeList as $grade){
                                    $gradeSum = $gradeSum + $grade;
                                }
                                $subjectAverage = number_format($gradeSum / count($gradeList), 2);
                                $totalSum = $totalSum + $subjectAverage;
                            }
                            $totalAverage = number_format($totalSum / count($subjects[$matricol]), 2);
                            ?>
                            <?php if ($totalAverage < 5):?>
                                <p class="card-text "><span class="badge badge-danger">Media: <?php echo $totalAverage; ?></span></p>
                            <?php else: ?>
                                <p class="card-text">Media: <strong> <?php echo $totalAverage; ?></strong></p>
                            <?php endif; ?>
                            <a href="grades.php?matricol=<?php echo $matricol; ?>" class="btn btn-primary">Afiseaza note</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
</html>

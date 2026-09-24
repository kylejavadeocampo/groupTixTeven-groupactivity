<?php
include "db.php";

$sql = "SELECT * FROM employee ORDER BY employee_id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Employee Management System</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2>Employee Records</h2>

            <p class="text-muted mb-0">
                Manage employee information
            </p>
        </div>

        <a href="add_employee.php" class="btn btn-primary">
            + Add Employee
        </a>

    </div>

    <div class="card shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-dark">

                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Position</th>
                            <th>Contact No.</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Salary</th>
                        </tr>

                    </thead>

                    <tbody>

                    <?php if ($result->num_rows > 0): ?>

                        <?php while ($employee = $result->fetch_assoc()): ?>

                            <tr>

                                <td>
                                    <?= htmlspecialchars($employee['employee_id']) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($employee['f_name']) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($employee['l_name']) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($employee['position']) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($employee['contact_no']) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($employee['email']) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($employee['department']) ?>
                                </td>

                                <td>
                                    ₱<?= number_format($employee['salary'], 2) ?>
                                </td>

                            </tr>

                        <?php endwhile; ?>

                    <?php else: ?>

                        <tr>

                            <td colspan="8" class="text-center text-muted py-4">

                                No employee records found.

                            </td>

                        </tr>

                    <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

</body>

</html>
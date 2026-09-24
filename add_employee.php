<?php
include "db.php";

$message = "";

if (isset($_POST['save'])) {

    $f_name = trim($_POST['f_name']);
    $l_name = trim($_POST['l_name']);
    $position = trim($_POST['position']);
    $contact_no = trim($_POST['contact_no']);
    $email = trim($_POST['email']);
    $department = trim($_POST['department']);
    $salary = trim($_POST['salary']);

    // Check required fields
    if (
        empty($f_name) ||
        empty($l_name) ||
        empty($position) ||
        empty($email) ||
        empty($department)
    ) {

        $message = "Please fill in all required fields.";

    } else {

        $sql = "INSERT INTO employee
                (f_name, l_name, position, contact_no, email, department, salary)
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "ssssssd",
            $f_name,
            $l_name,
            $position,
            $contact_no,
            $email,
            $department,
            $salary
        );

        if ($stmt->execute()) {

            header("Location: index.php");
            exit;

        } else {

            $message = "Error adding employee: " . $stmt->error;
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Employee</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card shadow-sm">

                <div class="card-header bg-primary text-white">

                    <h4 class="mb-0">
                        Add New Employee
                    </h4>

                </div>

                <div class="card-body">

                    <?php if ($message != ""): ?>

                        <div class="alert alert-danger">
                            <?= htmlspecialchars($message) ?>
                        </div>

                    <?php endif; ?>

                    <form method="POST">

                        <div class="mb-3">

                            <label class="form-label">
                                First Name <span class="text-danger">*</span>
                            </label>

                            <input
                                type="text"
                                name="f_name"
                                class="form-control"
                                placeholder="Enter first name"
                                required
                            >

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Last Name <span class="text-danger">*</span>
                            </label>

                            <input
                                type="text"
                                name="l_name"
                                class="form-control"
                                placeholder="Enter last name"
                                required
                            >

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Position <span class="text-danger">*</span>
                            </label>

                            <input
                                type="text"
                                name="position"
                                class="form-control"
                                placeholder="e.g. Software Developer"
                                required
                            >

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Contact Number
                            </label>

                            <input
                                type="text"
                                name="contact_no"
                                class="form-control"
                                placeholder="e.g. 09123456789"
                            >

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Email <span class="text-danger">*</span>
                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                placeholder="example@email.com"
                                required
                            >

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Department <span class="text-danger">*</span>
                            </label>

                            <input
                                type="text"
                                name="department"
                                class="form-control"
                                placeholder="e.g. IT Department"
                                required
                            >

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Salary
                            </label>

                            <input
                                type="number"
                                name="salary"
                                class="form-control"
                                placeholder="0.00"
                                step="0.01"
                                min="0"
                            >

                        </div>

                        <div class="d-flex gap-2">

                            <button
                                type="submit"
                                name="save"
                                class="btn btn-success"
                            >
                                Save Employee
                            </button>

                            <a
                                href="index.php"
                                class="btn btn-secondary"
                            >
                                Cancel
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>
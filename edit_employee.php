<?php
include "db.php";

$id = $_GET['id'];

$get = mysqli_query($conn, "SELECT * FROM employee WHERE employee_id = $id");
$employee = mysqli_fetch_assoc($get);


$message = "";
$destination = "index.php";


if (isset($_POST['update'])) {
    $firstname = $_POST['f_name'];
    $lastname = $_POST['l_name'];
    $position = $_POST['position'];
    $contact_no = $_POST['contact_no'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $salary = $_POST['salary'];

    // error handling
    if ($firstname == "" || 
        $lastname == "" || 
        $position == "" ||
        $email == "" ||
        $department == "" ||
        $salary == "") {
        $message = "Please input all required fields";
    }
    else {
        $message = "nisulod diri";
        $sql = "UPDATE employee
                SET f_name = '$firstname',
                    l_name = '$lastname',
                    position = '$position',
                    contact_no = '$contact_no',
                    email = '$email',
                    department = '$department',
                    salary = '$salary'
                WHERE employee_id = $id;
        ";
        mysqli_query($conn, $sql);
        header("Location: $destination");
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
                                value="<?php echo $employee['f_name']; ?>"
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
                                value="<?php echo $employee['l_name']; ?>"
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
                                value="<?php echo $employee['position']; ?>"
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
                                value="<?php echo $employee['contact_no']; ?>"
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
                                value="<?php echo $employee['email']; ?>"
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
                                value="<?php echo $employee['department']; ?>"
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
                                value="<?php echo $employee['salary']; ?>"
                                step="0.01"
                                min="0"
                            >

                        </div>

                        <div class="d-flex gap-2">

                            <button
                                type="submit"
                                name="update"
                                class="btn btn-success"
                            >
                                Update
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
<div class="p-1">
    <table class="table table-bordered table-striped table-hover table-custom" id="table_detail">
        <thead>
            <tr>
                <th>Emp ID</th>
                <th>Name</th>
                <th>Job Title</th>
                <th>Department</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employee as $emp): ?>
                <tr>
                    <td><?= $emp['emp_id']; ?></td>
                    <td><?= $emp['name']; ?></td>
                    <td><?= $emp['job_title']; ?></td>
                    <td><?= $emp['department']; ?></td>
                    <td><?= $emp['email']; ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
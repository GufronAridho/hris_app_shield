<?= $this->extend('Shared/layout') ?>

<?= $this->section('content') ?>
<main class="app-main">
    <!-- Content Header -->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h3 class="mb-0">Dashboard v2</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v2</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="app-content">
        <div class="container-fluid">
            <!-- Page Title -->
            <div class="mb-4">
                <h1 class="fw-bold text-primary">Plugin Trial Page</h1>
                <p class="text-muted">Testing Select2, DataTables, and SweetAlert2 integrations.</p>
            </div>

            <div class="row g-4">
                <!-- Select2 Card -->
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-list me-2 text-primary"></i>Select2 Example
                            </h5>
                        </div>
                        <div class="card-body">
                            <label for="testSelect" class="form-label">Choose an option</label>
                            <select id="testSelect" class="form-select" style="width:100%;">
                                <option value="A">Option A</option>
                                <option value="B">Option B</option>
                                <option value="C">Option C</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- DataTables Card -->
                <div class="col-md-6 col-lg-8">
                    <div class="card shadow-sm h-100">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-table me-2 text-success"></i>DataTable Example
                            </h5>
                        </div>
                        <div class="card-body">
                            <table id="testTable" class="table table-bordered table-striped w-100">
                                <thead class="table-light">
                                    <tr>
                                        <th>Col1</th>
                                        <th>Col2</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>A</td>
                                        <td>B</td>
                                    </tr>
                                    <tr>
                                        <td>C</td>
                                        <td>D</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- SweetAlert2 Card -->
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-bell me-2 text-danger"></i>SweetAlert2 Example
                            </h5>
                        </div>
                        <div class="card-body text-center">
                            <button id="alertBtn" class="btn btn-success btn-lg">
                                <i class="fas fa-magic me-2"></i>Test SweetAlert2
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Form Cards -->
                <?php for ($i = 1; $i <= 2; $i++): ?>
                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h5 class="card-title mb-0">
                                    <i class="fas fa-bell me-2 text-danger"></i>Form <?= $i ?>
                                </h5>
                            </div>
                            <div class="card-body text-center">
                                <form id="testForm<?= $i ?>" method="post">
                                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                                    <div class="mb-3">
                                        <label for="testInput<?= $i ?>">Enter something:</label>
                                        <input type="text" id="testInput<?= $i ?>" name="testInput" placeholder="Type here" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit Form</button>
                                    <?php if ($i === 1): ?>
                                        <button type="button" id="btnShowCsrf" class="btn btn-secondary">Show CSRF Token</button>
                                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#add_modal">
                                            Open Modal
                                        </button>
                                    <?php endif; ?>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="add_modal" tabindex="-1" aria-labelledby="add_modalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header modal-custom-purple">
                <h5 class="modal-title" id="add_modalLabel">Modal title</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">...</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    $(document).ready(function() {
        // Debug
        console.log("jQuery:", $.fn.jquery);
        console.log("Select2:", $.fn.select2 ? "OK" : "NOT LOADED");
        console.log("DataTables:", $.fn.DataTable ? "OK" : "NOT LOADED");
        console.log("Swal:", typeof Swal !== "undefined" ? "OK" : "NOT LOADED");

        // Init plugins
        $('#testSelect').select2({
            placeholder: "Select an option",
            allowClear: true
        });
        $('#testTable').DataTable({
            paging: false,
            searching: false,
            info: false
        });

        $('#alertBtn').click(() => Swal.fire("Hello!", "SweetAlert2 is working 🎉", "success"));

        $('#btnShowCsrf').click(() => {
            Swal.fire({
                title: 'Current CSRF Token',
                html: `<code>${$('meta[name="csrf-token"]').attr('content')}</code>`,
                icon: 'info',
                confirmButtonText: 'Close'
            });
        });

        // Generic form submission handler
        $('[id^=testForm]').each(function() {
            $(this).on("submit", function(e) {
                e.preventDefault();
                let $form = $(this),
                    dataForm = $form.serialize();
                let currentToken = $('meta[name="csrf-token"]').attr('content');

                Swal.fire({
                    title: "Current CSRF Token",
                    html: `<code>${currentToken}</code>`,
                    icon: "info",
                    confirmButtonText: "Continue"
                }).then(() => {
                    Swal.fire({
                        title: "Are you sure?",
                        text: "Update this Categories!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, Confirm!"
                    }).then(result => {
                        if (!result.isConfirmed) return;

                        $.ajax({
                            url: "<?= base_url('home/test_csrf') ?>",
                            type: "POST",
                            data: dataForm,
                            dataType: "json",
                            success: function(res) {
                                Swal.fire({
                                    title: "Success!",
                                    html: `<p>Form submitted successfully.</p>
                                       <p>New CSRF Token:</p>
                                       <code>${res.csrfHash}</code>`,
                                    icon: "success"
                                });
                            },
                            error: function(xhr, status, error) {
                                Swal.fire('Error', 'Something went wrong: ' + error, 'error');
                            }
                        });
                    });
                });
            });
        });
    });
</script>
<?= $this->endSection() ?>
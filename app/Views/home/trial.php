<?= $this->extend('Shared/layout') ?>

<?= $this->section('content') ?>
<main class="app-main">
    <!--begin::App Content Header-->
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
    <!--end::App Content Header-->

    <!--begin::App Content-->
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
                            <h5 class="card-title mb-0"><i class="fas fa-list me-2 text-primary"></i>Select2 Example</h5>
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
                            <h5 class="card-title mb-0"><i class="fas fa-table me-2 text-success"></i>DataTable Example</h5>
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
                            <h5 class="card-title mb-0"><i class="fas fa-bell me-2 text-danger"></i>SweetAlert2 Example</h5>
                        </div>
                        <div class="card-body text-center">
                            <button id="alertBtn" class="btn btn-success btn-lg">
                                <i class="fas fa-magic me-2"></i>Test SweetAlert2
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--end::App Content-->
</main>
<?= $this->endSection() ?>

<?= $this->section('script'); ?>
<script>
    $(document).ready(function() {
        console.log("jQuery:", $.fn.jquery);
        console.log("Select2:", $.fn.select2 ? "OK" : "NOT LOADED");
        console.log("DataTables:", $.fn.DataTable ? "OK" : "NOT LOADED");
        console.log("Swal:", typeof Swal !== "undefined" ? "OK" : "NOT LOADED");

        // Init Select2
        $('#testSelect').select2({
            placeholder: "Select an option",
            allowClear: true
        });

        // Init DataTables
        $('#testTable').DataTable({
            paging: false,
            searching: false,
            info: false
        });

        // Test SweetAlert2
        $('#alertBtn').click(() => Swal.fire("Hello!", "SweetAlert2 is working 🎉", "success"));
    });
</script>
<?= $this->endSection() ?>
<?= $this->extend('shared/layout') ?>

<?= $this->section('content') ?>
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row align-items-stretch g-2">

                <div class="col-md-3">
                    <div class="card h-100 custom-card-breadcrumb custom-card-slim d-flex align-items-left justify-content-center">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="<?= base_url("home/index"); ?>">Onboarding</a></li>
                            <li class="breadcrumb-item active"><?= $title; ?></li>
                        </ol>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--end::App Content Header-->

    <!--begin::App Content-->
    <div class="app-content">
        <div class="container-fluid">
            <div class="card shadow w-100 custom-card-purple">
                <div class="card-body p-3">
                    <div class="row align-items-stretch g-2">
                        <div class="col-md-9">
                            <div id="checklist_item">
                                <div class="d-flex justify-content-center align-items-center" style="min-height: 15rem;">
                                    <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center">
                            <div class="card shadow-sm onboarding-card">
                                <div class="section-header">Employee</div>
                                <div class="section-body"><strong><?= $name; ?></strong></div>
                                <hr class="section-divider">

                                <div class="section-header">Head of Department</div>
                                <div class="section-body"><strong><?= $dept_head; ?></strong></div>
                                <hr class="section-divider">

                                <div class="section-header">HR</div>
                                <div class="section-body"><strong><?= $hr_partner; ?></strong></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<style>
    .onboarding-card {
        background: transparent;
        border: none;
        width: 100%;
        text-align: center;
        border-radius: 20px;
    }

    .onboarding-card .section-header {
        background: #7030a0;
        color: #f8b310;
        font-weight: 600;
        padding: 0.5rem;
        border-radius: 12px 12px 0 0;
    }

    .onboarding-card .section-body {
        background: #f2f0f8;
        color: #f8b310;
        padding: 0.75rem;
        border-radius: 0 0 12px 12px;
    }

    .onboarding-card .section-divider {
        margin: 0.25rem 0;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('script'); ?>
<script>
    const emp_id = "<?= $emp_id; ?>";

    $(document).ready(function() {
        get_checklist_item()
    });

    function get_checklist_item() {
        $.ajax({
            url: "<?= base_url('onboarding/it_table'); ?>",
            type: "GET",
            data: {
                emp_id: emp_id,
                check_cat: "IT"
            },
            success: function(res) {
                $('#checklist_item').html(res)
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", error)
                $('#checklist_item').html('<div class="text-white p-3">Failed to load checklist item.</div>');
            }
        })
    }

    function uploadFile(input, id, check_cat) {
        if (input.files.length === 0) return;
        const file = input.files[0];

        let dataForm = new FormData();
        dataForm.append('file', file);
        dataForm.append('id', id);
        dataForm.append('check_cat', check_cat);
        // console.log("FormData contents:");
        // for (let pair of dataForm.entries()) {
        //     console.log(pair[0] + ": ", pair[1]);
        // }
        Swal.fire({
            title: "Are you sure?",
            text: "Add this Document!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Confirm!",
            showLoaderOnConfirm: true,
            allowOutsideClick: () => !Swal.isLoading(),
            preConfirm: () => {
                return $.ajax({
                    url: "<?= base_url('onboarding/upload_document') ?>",
                    type: "POST",
                    data: dataForm,
                    processData: false,
                    contentType: false,
                    dataType: "json"
                }).then((res) => {
                    if (!res.status) {
                        throw new Error(res.message);
                    }
                    return res;
                }).catch((error) => {
                    Swal.showValidationMessage(
                        `Request failed: ${error.message || error}`
                    );
                });
            }
        }).then((result) => {
            if (result.isConfirmed && result.value) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: result.value.message,
                    timer: 1000,
                    showConfirmButton: false
                }).then(() => {
                    get_checklist_item();
                });
            }
        });
    };
</script>
<?= $this->endSection() ?>
<div class="container-fluid py-4">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-xl-6 col-lg-6 text-center">
                    <img class="w-100 border-radius-lg shadow-lg mx-auto" src="<?= base_url('assets/') ?>images/portfolio-thumbnail/thumbnail-03-08-232.jpg" alt="chair">
                </div>
                <?php foreach ($portfolio->result() as $row) { ?>
                    <div class="col-lg-5 mx-auto">
                        <h3 class="mt-lg-0 mt-4"><?= $row->title; ?></h3>
                        <h6 class="mb-0 mt-3"><?= $row->description; ?></h6>
                        <label class="mt-4">Tools</label>
                        <ul>
                            <?php foreach (explode(';', $row->tools) as $tool) { ?>
                                <li><?= $tool; ?></li>
                            <?php } ?>
                        </ul>

                        <a href="<?= $row->link; ?>">
                            <i class="fab fa-github"></i>
                            &nbsp;
                        </a>
                        <a href="<?= $row->link; ?>" class="text-bold text-decoration-underline">
                            Link to projects
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
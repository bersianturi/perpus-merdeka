    <div class="container-fluid py-4">
        <div class="col-12">
            <button class="btn btn-primary ms-4 mb-0" data-bs-toggle="modal" data-bs-target="#modal-add">Add</button>
            <div class="card card-plain mb-4">
                <div class="card-body">
                    <div class="row">
                        <?php
                        $no = 1;
                        foreach ($portfolio->result() as $row) { ?>
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card card-blog shadow p-4">
                                    <div class="position-relative">
                                        <a class="d-block shadow-xl border-radius-xl">
                                            <img src="<?= base_url('assets/images/portfolio-thumbnail/' . $row->thumbnail) ?>" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                                        </a>
                                    </div>
                                    <div class="card-body px-1 pb-0">
                                        <p class="text-gradient text-dark mb-2 text-sm">Portfolio #<?= $no; ?></p>
                                        <a href="<?= base_url('portfolio/portfolio_detail/') . $row->id; ?>">
                                            <h5>
                                                <?= $row->title; ?>
                                            </h5>
                                        </a>
                                        <p class="mb-4 text-sm">
                                            <?= $row->description; ?>
                                        </p>
                                        <div class="d-flex align-items-center justify-content-evenly">
                                            <button type="button" data-id="<?= $row->id; ?>" data-title="<?= $row->title; ?>" data-description="<?= $row->description; ?>" data-tools="<?php foreach (explode(';', $row->tools) as $tools) {
                                                                                                                                                                                            echo $tools . ',' . '';
                                                                                                                                                                                        } ?>" data-link="<?= $row->link; ?>" data-thumbnail="<?= base_url('assets/images/portfolio-thumbnail/') . $row->thumbnail; ?>" data-old-thumbnail="<?= $row->thumbnail; ?>" class="btn btn-edit-portfolio btn-outline-info btn-sm mb-0">
                                                Edit
                                            </button>
                                            <button type="button" name="<?= $row->title; ?>" id="<?= $row->id; ?>" class="btn btn-outline-danger btn-sm mb-0 btn-delete-portfolio">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php $no++;
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>
    <div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="modal-add" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h3 class="font-weight-bolder text-primary text-gradient">Add Portfolio</h3>
                            <p class="mb-0">Enter details of your new portfolio</p>
                        </div>
                        <div class="card-body">
                            <form role="form text-left" method="post" action="<?= base_url('portfolio/add_portfolio') ?>" enctype="multipart/form-data">
                                <label>Title</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="title" class="form-control" placeholder="Title" aria-label="Title">
                                </div>
                                <label>Description</label>
                                <div class="form-group">
                                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" placeholder="Description" rows="3"></textarea>
                                </div>
                                <label>Tools</label>
                                <div class="input-group mb-3">
                                    <!-- <input type="text" class="form-control" placeholder="Tools" aria-label="Tools"> -->
                                    <input type="text" name='tools' class='form-control' placeholder='Skills'>
                                </div>
                                <label>Link</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="link" class="form-control" placeholder="Link" aria-label="Link">
                                </div>
                                <label>Thumbnail</label>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="thumbnail-add" name="thumbnail">
                                </div>
                                <div class="text-center">
                                    <button type="submit" name="submit" class="btn btn-round bg-gradient-primary btn-lg mt-4 mb-0">ADD</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="modal-edit" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h3 class="font-weight-bolder text-primary text-gradient">Edit Portfolio</h3>
                            <p class="mb-0">Enter new details of your existing portfolio</p>
                        </div>
                        <div class="card-body">
                            <form role="form text-left" method="post" action="<?= base_url('portfolio/edit_portfolio') ?>" enctype="multipart/form-data">
                                <input type="hidden" name="edit-id">
                                <label>Title</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="edit-title" class="form-control" placeholder="Title" aria-label="Title">
                                </div>
                                <label>Description</label>
                                <div class="form-group">
                                    <textarea name="edit-description" class="form-control" id="portfolio-desc" placeholder="Description" rows="3"></textarea>
                                </div>
                                <label>Tools</label>
                                <div class="input-group mb-3">
                                    <!-- <input type="text" class="form-control" placeholder="Tools" aria-label="Tools"> -->
                                    <input type="text" name='edit-tools' id="tools-edit" class='form-control' placeholder='Skills'>
                                </div>
                                <label>Link</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="edit-link" class="form-control" placeholder="Link" aria-label="Link">
                                </div>
                                <label>Thumbnail</label>
                                <div class="input-group mb-3">
                                    <input type="hidden" name="old_thumbnail" id="old_thumbnail">
                                    <input type="file" class="form-control" id="thumbnail-edit" name="edit-thumbnail">
                                </div>
                                <div class="text-center">
                                    <button type="submit" name="submit" class="btn btn-round bg-gradient-primary btn-lg mt-4 mb-0">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-confirm" tabindex="-1" role="dialog" aria-labelledby="modal-confirm" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Confirmation</h6>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="delete-portfolio-id" id="delete-portfolio-id">
                    <p>Are you sure to delete <strong class="portfolio-name"></strong>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-danger" id="delete-portfolio-confirm">Delete</button>
                    <button type="button" class="btn btn-outline-info ml-auto" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
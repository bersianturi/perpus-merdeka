    <div class="container-fluid py-4">
        <div class="col-12">
            <button class="btn btn-primary ms-4 mb-0" data-bs-toggle="modal" data-bs-target="#modal-add">ADD</button>
            <div class="card card-plain mb-4">
                <div class="card-body">
                    <div class="row">
                        <?php
                        $no = 1;
                        foreach ($skills->result() as $row) { ?>
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card card-blog shadow p-4">
                                    <div class="position-relative">
                                        <a class="d-block border-radius-xl w-50 m-auto">
                                            <img src="<?= base_url('assets/images/skills-thumbnail/' . $row->image) ?>" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                                        </a>
                                    </div>
                                    <div class="card-body px-1 pb-0">
                                        <p class="text-gradient text-dark mb-2 text-sm text-center">Skills #<?= $no; ?></p>
                                        <h5 class="mb-4 text-center">
                                            <?= $row->name; ?>
                                        </h5>
                                        <div class="d-flex align-items-center justify-content-evenly">
                                            <button type="button" data-id="<?= $row->id; ?>" data-name="<?= $row->name; ?>" data-image="<?= base_url('assets/images/skills-thumbnail/') . $row->image; ?>" data-old-image="<?= $row->image; ?>" class="btn btn-edit-skills btn-outline-info btn-sm mb-0">
                                                Edit
                                            </button>
                                            <button type="button" name="<?= $row->name; ?>" id="<?= $row->id; ?>" class="btn btn-outline-danger btn-sm mb-0 btn-delete-skills">Delete</button>
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
                            <h3 class="font-weight-bolder text-primary text-gradient">Add Skills</h3>
                            <p class="mb-0">Enter details of your new skills</p>
                        </div>
                        <div class="card-body">
                            <form role="form text-left" method="post" action="<?= base_url('skills/add_skills') ?>" enctype="multipart/form-data">
                                <label>Name</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="name" class="form-control" placeholder="Name" aria-label="Name">
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
                            <h3 class="font-weight-bolder text-primary text-gradient">Edit Skills</h3>
                            <p class="mb-0">Enter new details of your existing skills</p>
                        </div>
                        <div class="card-body">
                            <form role="form text-left" method="post" action="<?= base_url('skills/edit_skills') ?>" enctype="multipart/form-data">
                                <input type="hidden" name="edit-id">
                                <label>Name</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="edit-name" class="form-control" placeholder="Name" aria-label="Name">
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
                    <input type="hidden" name="delete-skills-id" id="delete-skills-id">
                    <p>Are you sure to delete <strong class="skills-name"></strong>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-danger" id="delete-skills-confirm">Delete</button>
                    <button type="button" class="btn btn-outline-info ml-auto" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
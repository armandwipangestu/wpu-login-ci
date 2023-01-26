<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


    <div class="row">
        <div class="col-lg-6">
            <?= form_error('menu', '<div class="alert alert-danger">', '</div>') ?>

            <?= $this->session->flashdata('message') ?>

            <form method="POST" action="<?= base_url('menu/edit/') . $id ?>">
                <div class="form-group">
                    <input type="text" class="form-control" id="menu" name="menu" value="<?= $menu['menu'] ?>" placeholder="Enter menu">
                </div>
                <button type="submit" class="btn btn-primary float-right"><i class="fas fa-fw fa-edit mr-1"></i>Edit</button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


    <div class="row">
        <div class="col-lg-6">
            <form action="<?= base_url('menu/update') ?>" method="POST">
                <div class="input-group">
                    <input type="text" class="form-control" name="menu" value="<?= $result['menu'] ?>" />
                </div>
                <input type="hidden" name="old_menu" value="<?= $result['menu'] ?>">
                <input type="hidden" name="id" value="<?= $result['id'] ?>">
                <button type="submit" class="btn btn-primary mt-3">Update</button>
            </form>
        </div>
    </div>

</div>

</div>
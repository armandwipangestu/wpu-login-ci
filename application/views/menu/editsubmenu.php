<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <!-- <?php
        var_dump($result);
    ?> -->

    <div class="row">
        <div class="col-lg">
            <form action="<?= base_url('menu/subupdate') ?>" method="POST" class="form-floating">
                <div class="row">
                    <div class="col-md-3 mt-3">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="title" value="<?= $result['title'] ?>" />
                    </div>
                    <div class="col-md-3 mt-3">
                        <label for="">Menu</label>
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="<?= $subMenuById[1][0]['menu_id'] ?>"><?= $subMenuById[0][0]['menu'] ?></option>
                            <?php foreach ($menu as $m) : ?>
                                <?php if($m['menu'] != $subMenuById[0][0]['menu']) : ?>
                                    <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-3 mt-3">
                        <label for="">Url</label>
                        <input type="text" class="form-control" name="url" value="<?= $result['url'] ?>" />
                    </div>
                    <div class="col-md-3 mt-3">
                        <label for="">Icon</label>
                        <input type="text" class="form-control" name="icon" value="<?= $result['icon'] ?>" />
                    </div>
                    <div class="col-md-3 mt-3">
                        <label for="">Is Active</label>
                        <input type="text" class="form-control" name="is_active" value="<?= $result['is_active'] ?>" />
                    </div>
                    <input type="hidden" name="id" value="<?= $result['id'] ?>">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Update</button>
            </form>
        </div>
    </div>

</div>

</div>
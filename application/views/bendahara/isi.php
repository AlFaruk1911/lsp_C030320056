<?php
//==================================== HOME ====================================
if ($page == 'home') {
?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><?php echo  $judul; ?></h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?php echo $jml_santri; ?></h3>
                                <p>Jumlah Santri</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-android-people"></i>
                            </div>
                            <a href="<?php echo base_url('bendahara/santri') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-6 col-12">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?php echo $jml_setoran; ?></h3>

                                <p>Jumlah Setoran</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <a href="<?php echo base_url('bendahara/setoran') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Selamat Datang Bendahara</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <h2>Info</h2>
                    <p>Ini adalah contoh sistem informasi menggunakan CI3 dengan sistem login,
                        dan menggunakan data yang berelasi. Didalamnya juga menggunakan sistem
                        multilogin untuk membedakan level user tertentu.<br>
                        Besar harapan contoh coding ini bermanfaat sebagai start awal memahami
                        membangun sebuah sistem informasi yang lebih rumit.</p>
                    <p>Dosen pengampu: Agus SBN</p>

                </div>
                <div class="card-footer">
                    Create By Agus SBN @2022
                </div>
            </div>

        </section>
    </div>
<?php
}

//==================================== SANTRI ====================================
else if ($page == 'santri') {
?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><?php echo  $judul; ?></h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="card">
                <div class="card-body">
                    <table id="datatable_01" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id Santri</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                            </tr>
                        </thead>
                        <?php
                        foreach ($santri as $d) { ?>
                            <tr>
                                <td><?php echo $d['id_santri'] ?></td>
                                <td><?php echo $d['nama_santri'] ?></td>
                                <td><?php echo $d['nama_kelas'] ?></td>

                            </tr>
                        <?php
                        }
                        ?>
                    </table>

                </div>
        </section>
    </div>

<?php
}

//--------------------------------- Detil ---------------------------------
else if ($page == 'santri_detil') {
?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><?php echo  $judul; ?></h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="card">
                <div class="card-body">

                    <dl class="row">
                        <dt class="col-sm-2">Id Santri</dt>
                        <dd class="col-sm-10"><?php echo $d['id_santri']; ?></dd>
                        <dt class="col-sm-2">Nama Santri</dt>
                        <dd class="col-sm-10"><?php echo $d['nama_santri']; ?></dd>
                        <dt class="col-sm-2">Nama Alias</dt>
                        <dd class="col-sm-10"><?php echo $d['nama_alias']; ?></dd>
                        <dt class="col-sm-2">Nama Guru</dt>
                        <dd class="col-sm-10"><?php echo $d['nama_guru']; ?></dd>
                        <dt class="col-sm-2">Kelas</dt>
                        <dd class="col-sm-10"><?php echo $d['nama_kelas']; ?></dd>
                    </dl>

                </div>
            </div>
        </section>
    </div>
<?php
}

//==================================== GURU ====================================
else if ($page == 'guru') {
?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><?php echo  $judul; ?></h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id guru</th>
                                <th>Nama</th>
                            </tr>
                        </thead>

                        <?php
                        foreach ($guru as $d) { ?>
                            <tr>
                                <td><?php echo $d['id_guru'] ?></td>
                                <td><?php echo $d['nama_guru'] ?></td>

                            </tr>
                        <?php
                        }
                        ?>
                    </table>

                </div>
            </div>
        </section>
    </div>

<?php
}


//==================================== KELAS ====================================
else if ($page == 'kelas') {
?>
    <div class="content-wrapper" style="padding-left:10px">

        <h1><?php echo  $judul; ?></h1>
        <a href=<?php echo base_url("admin/kelas_tambah") ?>>Tambah kelas</a>
        <table border=1>
            <tr>
                <th>Id kelas</th>
                <th>Nama</th>
            </tr>
            <?php
            foreach ($kelas as $d) { ?>
                <tr>
                    <td><?php echo $d['id_kelas'] ?></td>
                    <td><?php echo $d['nama_kelas'] ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <br><i>Halaman Kelas ini sengaja tanpa Style CSS agar tampak Core Coding nya</i>

    </div>
<?php
}

//==================================== SETORAN ====================================
else if ($page == 'setoran') {
?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><?php echo  $judul; ?></h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="card">
                <div class="card-body">
                    <a href=<?php echo base_url("bendahara/setoran_tambah") ?> class="btn btn-primary" style="margin-bottom:15px">
                        Tambah Setoran<i class="bi bi-cash-stack"></i>
                    </a>
                    <table id="datatable_01" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id Setoran</th>
                                <th>Nama Santri</th>
                                <th>Tanggal Setoran</th>
                                <th>Jumlah Setoran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <?php
                        foreach ($setoran as $set) { ?>
                            <tr>
                                <td><?php echo $set['id_setoran'] ?></td>
                                <td><?php echo $set['nama_santri'] ?></td>
                                <td><?php echo $set['tgl_setoran'] ?></td>
                                <td><?php echo $set['jumlah_setoran'] ?></td>
                                <td>
                                    <a href=<?php echo base_url("bendahara/setoran_edit/") . $set['id_setoran']; ?>> <i class="fas fa-pencil-alt"></i> </a>
                                    <a href=<?php echo base_url("bendahara/setoran_detail/") . $set['id_setoran']; ?>>
                                        <i class="fas fa-search-plus"></i></a>
                                    <a href=<?php echo base_url("bendahara/setoran_hapus/") . $set['id_setoran']; ?> onclick="return confirm('Yakin menghapus Setoran : <?php echo $set['nama_santri']; ?> ?');" ;><i class="fas fa-trash-alt"></i></a>

                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>

                </div>
        </section>
    </div>

<?php
}

//--------------------------------- SETORAN DETAIL ---------------------------------
else if ($page == 'setoran_detail') {
?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><?php echo  $judul; ?></h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="card">
                <div class="card-body">

                    <dl class="row">
                        <dt class="col-sm-2">Id Setoran</dt>
                        <dd class="col-sm-10"><?php echo $set['id_setoran']; ?></dd>
                        <dt class="col-sm-2">Nama Santri</dt>
                        <dd class="col-sm-10"><?php echo $set['nama_santri']; ?></dd>
                        <dt class="col-sm-2">Tanggal Setoran</dt>
                        <dd class="col-sm-10"><?php echo $set['tgl_setoran']; ?></dd>
                        <dt class="col-sm-2">Jumlah Setoran</dt>
                        <dd class="col-sm-10"><?php echo $set['jumlah_setoran']; ?></dd>
                    </dl>
                </div>
            </div>
        </section>
    </div>
<?php

    //--------------------------------- SETORAN TAMBAH ---------------------------------
} else if ($page == 'setoran_tambah') {
?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><?php echo  $judul; ?></h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="card">
                <div class="card-body">

                    <form method="POST" action="<?php echo base_url('bendahara/setoran_tambah'); ?>" class="form-horizontal">

                        <div class="card-body">

                            <div class="form-group row">
                                <label for="nama_santri" class="col-sm-2 col-form-label">Nama Santri</label>
                                <div class="col-sm-10">
                                    <?php echo form_dropdown('id_santri', $ddsantri, set_value('id_santri')); ?>
                                    <span class="badge badge-warning"><?php echo strip_tags(form_error('nama_santri')); ?></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tgl_setoran" class="col-sm-2 col-form-label">Tanggal Setoran</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="tgl_setoran" id="tgl_setoran" value="<?php echo set_value('tgl_setoran'); ?>">
                                    <span class="badge badge-warning"><?php echo strip_tags(form_error('tgl_setoran')); ?></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="jumlah_setoran" class="col-sm-2 col-form-label">Jumlah Setoran</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="jumlah_setoran" id="jumlah_setoran" value="<?php echo set_value('jumlah_setoran'); ?>">
                                    <span class="badge badge-warning"><?php echo strip_tags(form_error('jumlah_setoran')); ?></span>
                                </div>
                            </div>


                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Simpan</button>
                        </div>
                    </form>


                </div>
        </section>
    </div>
<?php

    //--------------------------------- SETORAN EDIT ---------------------------------
} else if ($page == 'setoran_edit') {
?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><?php echo  $judul; ?></h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="card">
                <div class="card-body">

                    <form method="POST" action="<?php echo base_url('bendahara/setoran_edit/' . $set['id_setoran']); ?>" class="form-horizontal">

                        <div class="card-body">

                            <div class="form-group row">
                                <label for="id_santri" class="col-sm-2 col-form-label">Nama Santri</label>
                                <div class="col-sm-10">
                                    <?php echo form_dropdown('id_santri', $ddsantri, set_value('id_santri', $set['id_santri']), 'class=form-control'); ?>
                                    <span class="badge badge-warning"><?php echo strip_tags(form_error('id_santri')); ?></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tgl_setoran" class="col-sm-2 col-form-label">Tanggal Setoran</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="tgl_setoran" id="tgl_setoran" value="<?php echo set_value('tgl_setoran', $set['tgl_setoran']); ?>">
                                    <span class="badge badge-warning"><?php echo strip_tags(form_error('tgl_setoran')); ?></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="jumalh_setoran" class="col-sm-2 col-form-label">Jumlah Setoran</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="jumlah_setoran" id="jumlah_setoran" value="<?php echo set_value('jumlah_setoran', $set['jumlah_setoran']); ?>">
                                    <span class="badge badge-warning"><?php echo strip_tags(form_error('jumlah_setoran')); ?></span>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Simpan</button>
                        </div>
                    </form>
                </div>
        </section>
    </div>
<?php
}

//================================ LIST DATA SANTRI PER KELAS ================================
else if ($page == 'list_santri_per_kelas') {
?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><?php echo  $judul; ?></h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                                Pilih Kelas
                            </div>
                            <div class="col-sm-2">
                                <?php echo form_dropdown('id_kelas', $ddkelas, set_value('id_kelas'), 'id="id_kelas" class="form-control"'); ?>
                            </div>
                        </div>
                        <div class="col-sm-8">
                        </div>
                    </div>
                    <!-- <button id="pilih_kelas" class='btn btn-info btn-sm' style="margin-bottom: 5px">Tampilkan</button> -->
                    <table id="datatable_01" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id Santri</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <?php
                        foreach ($santri as $d) { ?>
                            <tr>
                                <td><?php echo $d['id_santri'] ?></td>
                                <td><?php echo $d['nama_santri'] ?></td>
                                <td>
                                    <a href=<?php echo base_url("bendahara/santri_detil/") . $d['id_santri']; ?>>
                                        <i class="fas fa-search-plus"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>

                </div>
        </section>
    </div>

<?php
}


?>
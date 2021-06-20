
    <div class="container">
        <h2>Data User</h2>
        <p>Anda dapat mengelola data user</p>
        <table class="table table-light">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Nama</th>
                    <th>Role</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($users as $u) :
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $u['email'] ?></td>
                        <td><?= $u['password'] ?></td>
                        <td><?= $u['name'] ?></td>
                        <td><?= $u['role_id'] ?></td>
                        <td><a href="<?= base_url()?>ud/hapus/<?= $u['id'] ?>" class="btn btn-danger">Hapus</a>
                            <a href="" class="btn btn-warning">Detail</a>
                            <a href="<?= base_url()?>ud/formEdit/<?= $u['id'] ?>" class="btn btn-primary">Ubah</a>
                        </td>
                    </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </div>

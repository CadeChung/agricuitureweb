<section class="home">
    <div class="text">首頁

        <?php include 'php/members.php';
        if (mysqli_num_rows($res) > 0) { ?>
            <h1 class="mb-4">使用者帳號管理</h1>
            <table class="table" style="width: 32rem;">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">已註冊帳號</th>
                    </tr>
                </thead>

                <tbody>
                
                    <?php
                    $i = 1;
                    while ($rows = mysqli_fetch_assoc($res)) { ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $rows['username'] ?></td>
                        </tr>
                    <?php $i++;
                    } ?>
                </tbody>

            </table>
        <?php } ?>
        
    </div>
</section>
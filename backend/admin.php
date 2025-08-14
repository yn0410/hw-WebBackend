<div class=" pt-3 pb-2 mb-3">
    <h1>Admin管理</h1>

    <form method="post" action="./api/edit.php">
        <table class="table">
            <thead>
                <tr class="yel">
                    <td width="40%">帳號</td>
                    <td width="40%">密碼</td>
                    <td width="10%">刪除</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $rows=${ucfirst($do)}->all();
                foreach($rows as $row):
                ?>
                <tr>
                    <td>
                        <input type="text" name="acc[]" value="<?= $row['acc']?>" style="width: 90%;">
                    </td>
                    <td>
                        <input type="text" name="pw[]" value="<?= $row['pw']?>" style="width: 90%;">
                    </td>
                    <td>
                        <input type="checkbox" name="del[]" value="<?= $row['id'];?>">
                    </td>
                </tr>
                    <input type="hidden" name="id[]" value="<?= $row['id'];?>">
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
        <table>
            <tbody>
                <tr>
                    <input type="hidden" name="table" value="<?= $do;?>">
                    <td width="200px">
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#myModal-addAdmin">新增管理者帳號</button>
                    </td>
                    <td class="cent">
                        <input type="submit" value="修改確定" class="btn btn-danger">
                        <input type="reset" value="重置" class="btn btn-success">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>

<!-- The Modal (add admin) -->
    <div class="modal fade" id="myModal-addAdmin">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h2 class="modal-title">新增管理者帳號</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form action="./api/insert.php" method="post" enctype="multipart/form-data">
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="mb-3 mt-3">
                            <label for="acc">帳號:</label>
                            <input type="text" class="form-control" name="acc">
                        </div>
                        <div class="mb-3">
                            <label for="pw">密碼:</label>
                            <input type="password" class="form-control" name="pw">
                        </div>
                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <input type="hidden" name="table" value="<?=$do;?>">
                        <button type="submit" class="btn btn-primary">新增</button>
                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">關閉</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
<div class=" pt-3 pb-2 mb-3">
    <h1>Menu管理</h1>

    <form method="post" action="./api/edit.php">
        <table class="table">
            <thead>
                <tr>
                    <td width="5%">id</td>
                    <td width="10%">品名</td>
                    <td width="20%">圖片</td>
                    <td width="30%">描述</td>
                    <td width="5%">價錢</td>
                    <td width="5%">顯示</td>
                    <td width="5%">刪除</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <?php
                $rows=${ucfirst($do)}->all();
                foreach($rows as $row):
                ?>
                <tr>
                    <td><?= $row['id'];?></td>
                    <td>
                        <input type="text" name="name[]" value="<?= $row['name'];?>" >
                    </td>
                    <td>
                        <img src="../image/<?=$row['img'];?>" style="width: 100%">
                    </td>
                    <td>
                        <textarea name="description[]" style="width: 100%; height:150px;"><?= $row['description'];?></textarea>
                    </td>
                    <td>
                        <input type="number" name="price[]" value="<?= $row['price'];?>" >
                    </td>
                    <td>
                        <input type="checkbox" name="sh[]" value="<?= $row['id'];?>" <?=($row['sh']==1)?"checked":"";?>>
                    </td>
                    <td>
                        <input type="checkbox" name="del[]" value="<?= $row['id'];?>">
                    </td>
                    <td>
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#myModal-editMenu" data-id="<?=$row['id'];?>">編輯</button>
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
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#myModal-addMenu">新增Menu</button>
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

<!-- The Modal (add Menu) -->
    <div class="modal fade" id="myModal-addMenu">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h2 class="modal-title">新增Menu</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form action="./api/insert.php" method="post" enctype="multipart/form-data">
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name">品名:</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="img">圖片:</label>
                            <input type="file" class="form-control" name="img">
                        </div>
                        <div class="mb-3">
                            <label for="description">描述:</label>
                            <input type="text" class="form-control" name="description">
                        </div>
                        <div class="mb-3">
                            <label for="price">價錢:</label>
                            <input type="number" class="form-control" name="price">
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



<!-- The Modal (edit Menu) -->
    <div class="modal fade" id="myModal-editMenu">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h2 class="modal-title">編輯Menu圖片</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form action="../api/update.php" method="post" enctype="multipart/form-data">
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="mb-3 mt-3">
                            <label for="img">圖片:</label>
                            <input type="file" class="form-control" name="img">
                        </div>
                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <input type="hidden" name="id" value="">
                        <input type="hidden" name="table" value="<?=$_GET['do'];?>">
                        <button type="submit" class="btn btn-primary">更新</button>
                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">關閉</button>
                    </div>
                </form>

            </div>
        </div>
    </div>





<script>
// 監聽 modal 被打開的事件
var editBannerModal = document.getElementById('myModal-editMenu');
editBannerModal.addEventListener('show.bs.modal', function (event) {
    // 觸發這個 modal 的按鈕
    var button = event.relatedTarget;
    // 從按鈕取得 data-id
    var bannerId = button.getAttribute('data-id');
    // 找到 modal 裡的 hidden input 並設定 value
    var hiddenIdInput = editBannerModal.querySelector('input[name="id"]');
    hiddenIdInput.value = bannerId;
});
</script>
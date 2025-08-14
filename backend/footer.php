<div class=" pt-3 pb-2 mb-3">
    <h1>Footer管理</h1>

    <form method="post" action="./api/edit_column.php">
        <table class="table">
            <tbody>
                <tr>
                    <td style="width:20%;">頁尾文字：</td>
                    <td>
                        <?php
                        $row=$Footer->find(1);
                        ?>
                        <input type="text" name="text" value="<?= $row['text'];?>">
                        <input type="hidden" name="id" value="<?= $row['id'];?>">
                    </td>
                </tr>
                
            </tbody>
        </table>
        <table>
            <tbody>
                <tr>
                    <input type="hidden" name="table" value="<?= $do;?>">
                    <td width="200px"></td>
                    <td>
                        <input type="submit" value="修改確定" class="btn btn-danger">
                        <input type="reset" value="重置" class="btn btn-success">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>



<!-- The Modal (edit About) -->
    <div class="modal fade" id="myModal-editAbout">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h2 class="modal-title">編輯About圖片</h2>
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
var editBannerModal = document.getElementById('myModal-editAbout');
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

<table class="mt-5 ml-5 h-[650px]">
    <caption class="text-[30px] font-medium mb-5">Thêm sản phẩm</caption>
    <form
        action="modules/quanlysanpham/xuly.php"
        method="post" enctype="multipart/form-data">
        <tr>
            <td><label class="font-semibold" for="id_pro">ID_PRODUCT</label></td>
            <td><input class="h-[40px] border-cyan-950 border-2 rounded-xl indent-2" type="text" name="id_pro">
            </td>
        </tr>
        <tr>
            <td><label class="font-semibold" for="name_cate">NAME_CATEGORY</label></td>
            <td>
            <select class="h-[40px] border-cyan-950 border-2 rounded-xl indent-2" name="danhmuc_role">
            <?php
                $sql_danhmuc = "SELECT * FROM category";
                $query_danhmuc = mysqli_query($conn, $sql_danhmuc);
                while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                    if ($row_danhmuc['id'] == $row  ['category_id']) {
                        echo "<option selected value='  {$row_danhmuc['id']}'>{$row_danhmuc   ['name']}</option>";
                    } else {
                        echo "<option value='{$row_danhmuc['id']}'>{$row_danhmuc['name']}</option>";
                    }
                }
            ?>
            </select>
            </td>
        </tr>
        <tr>
            <td><label class="font-semibold" for="">Title</label></td>
            <td><input class="h-[40px] border-cyan-950 border-2 rounded-xl indent-2" type="text" name="title">
            </td>
        </tr>
        <tr>
            <td><label class="font-semibold" for="">Price</label></td>
            <td><input class="h-[40px] border-cyan-950 border-2 rounded-xl indent-2" type="text" name="price">
            </td>
        </tr>
        <tr>
            <td><label class="font-semibold" for="thumbnail">Image</label></td>
            <td>
                <input type="file" name="hinhanh">
            </td>
        </tr>
        <tr>
            <td><label class="font-semibold" for="">Description</label></td>
            <td>
                <textarea class="h-[250px] border-cyan-950 border-2 rounded-xl indent-2" name="description" cols="30" rows="10">
                </textarea>
            </td>
        </tr>
        <tr>
            <td><label class="font-semibold" for="">Created_at</label></td>
            <td><input class="h-[40px] border-cyan-950 border-2 rounded-xl indent-2" type="text" name="created_at">
            </td>
        </tr>
        <tr>
            <td><label class="font-semibold" for="">Updated_at</label></td>
            <td><input class="h-[40px] border-cyan-950 border-2 rounded-xl indent-2" type="text" name="updated_at">
            </td>
        </tr>
        <tr>
            <td class="font-semibold text-center p-2 h-[40px] w-[50px] bg-gray-400 rounded-2xl"><input type="submit" name="themsanpham" value="Thêm sản phẩm"></td>
        </tr>
    </form>
</table>
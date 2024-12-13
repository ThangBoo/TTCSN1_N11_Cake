<?php
if (isset($_GET['iddanhmuc'])) {
    $iddanhmuc = $_GET['iddanhmuc'];
    $sql_sua_dm = "SELECT * FROM category WHERE id = '$iddanhmuc' LIMIT 1";
    $sql_sua_danhmuc = mysqli_query($conn, $sql_sua_dm);

    if ($sql_sua_danhmuc && mysqli_num_rows($sql_sua_danhmuc) > 0) {
        $row = mysqli_fetch_array($sql_sua_danhmuc);
    } else {
        echo "User not found.";
        exit();
    }
} else {
    echo "Invalid request.";
    exit();
}
?>

<table class="mt-5 ml-5 h-[150px]">
    <caption class="text-[30px] font-medium mb-5">Sửa danh mục</caption>
    <form
        action="modules/quanlydanhmuc/xuly.php?iddanhmuc=<?php echo $row['id'] ?>"
        method="post">
        <tr>
            <td class="font-semibold"><label for="id_cate">ID_CATEGORY</label></td>
            <td><input class="h-[40px] border-cyan-950 border-2 rounded-xl indent-2" type="text" name="id_cate" value="<?php echo $row['id'] ?>">
            </td>
        </tr>
        <tr>
            <td class="font-semibold"><label for="name_cate">NAME_CATEGORY</label></td>
            <td><input class="h-[40px] border-cyan-950 border-2 rounded-xl indent-2" type="text" name="name_cate" value="<?php echo $row['name'] ?>">
            </td>
        </tr>
        <tr>
            <td class="text-center h-[40px] w-[50px] bg-gray-400 rounded-2xl font-semibold" ><input type="submit" name="suadanhmuc" value="Sửa danh mục"></td>
        </tr>
    </form>
</table>
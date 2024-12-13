
<table border=1 class="mt-5 ml-5 h-[150px]">
    <caption class="text-[30px] font-medium mb-5">Thêm danh mục</caption>
    <form
        action="modules/quanlydanhmuc/xuly.php"
        method="post">
        <tr>
            <td class="font-semibold"><label for="id_cate">ID_CATEGORY</label></td>
            <td><input class="h-[40px] border-cyan-950 border-2 rounded-xl indent-2" type="text" name="id_cate">
            </td>
        </tr>
        <tr>
            <td class="font-semibold"><label for="name_cate">NAME_CATEGORY</label></td>
            <td><input class="h-[40px] border-cyan-950 border-2 rounded-xl indent-2" type="text" name="name_cate">
            </td>
        </tr>
        <tr>
            <td class="font-semibold text-center p-2 h-[40px] w-[50px] bg-gray-400 rounded-2xl"><input type="submit" name="themdanhmuc" value="Thêm danh mục"></td>
        </tr>
    </form>
</table>
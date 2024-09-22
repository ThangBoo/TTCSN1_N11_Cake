<div class="header flex w-full">
    <div class="h-[70px] flex justify-between px-6 header__inner">
        <div class="left flex items-center">
            <a href="index.php?page=home">
                <img
                    class="logo_header max-w-[200px] max-h-[70px] ml-10 mr-12"
                    src="images/logo-1.png"
                    alt="Logo"
                />
            </a>
        </div>
        <div class="middle flex items-center">
            <ul class="flex justify-between items-center list__menu">
                <li class="p-[23px] cursor-pointer">
                    <a href="index.php?page=about">VỀ THE CAKE HOUSE</a>
                </li>
                <li class="p-[23px] cursor-pointer">
                    <a href=""
                        >BÁNH SINH NHẬT <i class="fa fa-caret-down"></i
                    ></a>
                    <ul class="sub__menu list-none shadow-lg">
                        <?php          
                            $sql_danhmuc1= "SELECT * FROM category WHERE id<13";
                            $query_danhmuc1=mysqli_query($conn,$sql_danhmuc1);
                            while($row_danhmuc1=mysqli_fetch_array($query_danhmuc1)){
                        ?>
                        <li>
                            <a href="index.php?page=category&id=<?php echo $row_danhmuc1['id'] ?>">
                            <?php echo $row_danhmuc1['name']?></a>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                </li>
                <li class="p-[23px] cursor-pointer">
                    <a href="">SẢN PHẨM KHÁC <i class="fa fa-caret-down"></i></a>
                    <ul class="sub__menu list-none shadow-lg">
                        <?php          
                            $sql_danhmuc2= "SELECT * FROM category WHERE id>12 ";
                            $query_danhmuc2=mysqli_query($conn,$sql_danhmuc2);
                            while($row_danhmuc2=mysqli_fetch_array($query_danhmuc2)){
                        ?>
                        <li>
                            <a
                                href="index.php?page=category&id=<?php echo $row_danhmuc2['id'] ?>"
                                ><?php echo $row_danhmuc2['name']?></a
                            >
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                </li>
                <li class="p-[23px] cursor-pointer">
                    <a href="index.php?page=contact">LIÊN HỆ</a>
                </li>
            </ul>
            <div class="flex p-[23px]">
                <input
                    class="border-solid border-2 border-red-400 rounded-2xl indent-4"
                    type="text"
                    name="search"
                    id="search"
                    placeholder="Tìm kiếm..."
                />
            </div>
        </div>
        <div class="flex items-center justify-between gap-5 right">
            <a href="./pages/registration/SignInOrUp.php">
                <input
                    class="w-[110px] h-10 rounded-3xl border-2 border-red-500 text-red-500 font-semibold cursor-pointer"
                    type="button"
                    value="Đăng nhập"
                />
            </a>
            <a href="/pages/registration/SignInOrUp.php">
                <input
                    class="w-[110px] h-10 rounded-3xl bg-[#ED2224] text-white font-semibold cursor-pointer"
                    type="button"
                    value="Đăng ký"
                />
            </a>
        </div>
    </div>
</div>

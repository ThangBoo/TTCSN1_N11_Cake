<style>
    ul.list_page li {
        float: left;
        padding: 4px 12px;
        margin: 5px;
        background-color: #fff;
        display: block;
        border: 1px solid #d3ced2;
        border-radius: 20px;

    }

    ul.list_page li:hover {
        background: #ee2c2e;
    }

    ul.list_page li:hover a {
        color: #fff;
    }

    ul.list_page li a {
        color: #d3ced2;
        text-align: center;
        text-decoration: none;

    }
    table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
  }

  th, td {
    padding: 10px;
    text-align: center;
    border: 1px solid #d3ced2;
  }

  th {
    background-color: #f4f4f4;
  }

  @media (max-width: 768px) {
    table {
      display: block;
      overflow-x: auto;
      white-space: nowrap;
    }

    th, td {
      font-size: 14px;
    }

    ul.list_page li {
      padding: 2px 8px;
    }
  }
</style>
<div class="flex-row">
    <table border=1 class="mt-5 ml-5 h-[100px]">
        <caption class="text-[30px] font-medium mb-5">Quản lý Feedback</caption>
        <tr class="border-2">
            <th class="w-[90px] text-center border-2">ID</th>
            <th class="w-[150px] text-center border-2">Fullname</th>
            <th class="w-[150px] text-center border-2">Email</th>
            <th class="w-[100px] text-center border-2">Phone</th>
            <th class="w-[180px] text-center border-2">Note</th>
            <th class="w-[120px] text-center border-2">Created_at</th>
            <th class="w-[120px] text-center border-2">Updated_at</th>
        </tr>
        <?php
            if(isset($_GET['trang'])) {
                $trang = $_GET['trang'];
              }
              else {
                $trang = 1;
              }
              if($trang == 1) {
                $begin = 0;
              }
              else {
                $begin = ($trang - 1) * 5;
              }
              $query_cnt = mysqli_query($conn, "SELECT * FROM feedback");
              $row_cnt = mysqli_num_rows($query_cnt);
              $page_feed = ceil($row_cnt/5);
                $sql_lietke_feed = "SELECT feedback.id, feedback.fullname ,feedback.email,feedback.phone ,feedback.note,feedback.created_at,feedback.updated_at FROM feedback ORDER BY feedback.id LIMIT $begin,5";
            $query_lietke_feed = mysqli_query($conn, $sql_lietke_feed);
            while($row = mysqli_fetch_array($query_lietke_feed)) {
        ?>
        <tr class="border-2">
            <td class="h-[100px] w-[90px] text-center border-2">
                <?php echo $row['id'] ?></td>
            <td class="h-[140px] w-[90px] text-center border-2">
                <?php echo $row['fullname'] ?></td>
            <td class="h-[100px] w-[180px] text-center border-2">
                <?php echo $row['email'] ?></td>
            <td class="h-[100px] w-[90px] text-center border-2">
                <?php echo $row['phone'] ?></td>
            <td class="h-[100px] w-[240px] text-justify border-2">
                <?php echo $row['note'] ?></td>
            <td class="h-[100px] w-[90px] text-center border-2">
                <?php echo $row['created_at'] ?></td>
            <td class="h-[100px] w-[90px] text-center border-2">
                <?php echo $row['updated_at'] ?></td>
            <?php
        }
        ?>
    </table>
    <div class="flex justify-end clear-both my-5 mx-5">
        <ul class="list_page ">
        <?php
            for($i = 1; $i <= $page_feed; $i++) {
        ?>
            <li class="cursor-pointer" <?php if($i == $trang) {echo 'style="background: #ed2224; color: #fff;"';} else {echo '';}?>>
                <a <?php if($i == $trang) {echo 'style="color: #fff;"';}?> 
                    href="index.php?action=quanlyfeedback&query=lietke&trang=<?php echo $i ?>"><?php echo $i ?>
                </a>
            </li>
        <?php
            }
        ?>
        </ul>
    </div>
</div>
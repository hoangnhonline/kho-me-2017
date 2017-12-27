<!-- quick -->
<ul id="quick">
        <li>
                <a href="#" title="Products"><span class="normal">物件</span></a>
                <ul>
                        <li><a href="<?php echo BASE_URL.'tacgia'; ?>">新增譯者/作者</a></li>
                        <li><a href="<?php echo BASE_URL.'album_add'; ?>">新增相簿</a></li>
                        <li><a href="<?php echo BASE_URL.'phapam_add'; ?>">新增語音檔</a></li>                        
                </ul>
        </li>
        <!--
        <li>
                <a href="#" title="Products"><span class="icon"><img src="resources/images/icons/application_double.png" alt="Products" /></span><span>資料夾</span></a>
                <ul>
                        <li><a href="<?php echo BASE_URL.'thumuc_list'; ?>">thư mục</a></li>
                        <li><a href="<?php echo BASE_URL.'thumuc'; ?>">Thêm thư mục</a></li>                       
                </ul>
        </li>
        -->
        <li>
                <a href="" title="Events"><span class="icon"><img src="resources/images/icons/calendar.png" alt="Events" /></span><span>書籍</span></a>
                <ul>
                        <li><a href="<?php echo BASE_URL.'sach_list'; ?>">書籍管理</a></li>
                        <li class="last"><a href="<?php echo BASE_URL.'sach_add'; ?>">新增書籍</a></li>
                </ul>
        </li>        
        <li>
                <a href="" title="Links"><span class="icon"><img src="resources/images/icons/world_link.png" alt="Links" /></span><span>類目</span></a>
                <ul>
                        <li><a href="<?php echo BASE_URL.'mucluc_list'; ?>">類目管理</a></li>
                        <li class="last"><a href="<?php echo BASE_URL.'mucluc_add'; ?>">新增類目</a></li>
                </ul>
        </li>
        <li>
                <a href="" title="Pages"><span class="icon"><img src="resources/images/icons/page_white_copy.png" alt="Pages" /></span><span>頁面</span></a>
                <ul>
                        <li><a href="<?php echo BASE_URL.'trang_list'; ?>">管理頁面</a></li>
                        <li><a href="<?php echo BASE_URL.'trang_add'; ?>">新增頁面</a></li>                          
                </ul>
        </li>
        <li>
                <a href="" title="Links"><span class="icon"><img src="resources/images/icons/user.png" alt="Links" /></span><span>Users</span></a>
                <ul>
                    <?php if($_SESSION['email'] == 'hoangnh@vnbet.vn') {?>
                        <li><a href="<?php echo BASE_URL.'user_list'; ?>">Manage users</a></li>
                        <li class="last"><a href="<?php echo BASE_URL.'user_add'; ?>">New user</a></li>
                    <?php } ?>    
                        <li class="last"><a href="<?php echo BASE_URL.'user_changepass'; ?>">Change password</a></li>
                </ul>
        </li>
        
</ul>
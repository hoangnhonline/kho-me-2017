<!-- quick -->
<ul id="quick">
        <li>
                <a href="#" title="Products"><span class="normal">រឿង</span></a>
                <ul>
                        <li><a href="<?php echo BASE_URL.'tacgia'; ?>">បន្ថែមអ្នកបកប្រែ/អ្នកនិពន្ធ</a></li>
                        <li><a href="<?php echo BASE_URL.'album_add'; ?>">បន្ថែមអាល់ប៊ុមថ្មី</a></li>
                        <li><a href="<?php echo BASE_URL.'phapam_add'; ?>">បន្ថែមសំឡេង</a></li>                        
                </ul>
        </li>
        <!--
        <li>
                <a href="#" title="Products"><span class="icon"><img src="resources/images/icons/application_double.png" alt="Products" /></span><span>ថត</span></a>
                <ul>
                        <li><a href="<?php echo BASE_URL.'thumuc_list'; ?>">thư mục</a></li>
                        <li><a href="<?php echo BASE_URL.'thumuc'; ?>">Thêm thư mục</a></li>                       
                </ul>
        </li>
        -->
        <li>
                <a href="" title="Events"><span class="icon"><img src="resources/images/icons/calendar.png" alt="Events" /></span><span>គម្ពីរ</span></a>
                <ul>
                        <li><a href="<?php echo BASE_URL.'sach_list'; ?>">ការរៀបគម្ពី</a></li>
                        <li class="last"><a href="<?php echo BASE_URL.'sach_add'; ?>">គម្ពីរ</a></li>
                </ul>
        </li>        
        <li>
                <a href="" title="Links"><span class="icon"><img src="resources/images/icons/world_link.png" alt="Links" /></span><span>ប្រភេទគម្ពីរ</span></a>
                <ul>
                        <li><a href="<?php echo BASE_URL.'mucluc_list'; ?>">ការរៀបចំប្រភេទគម្ពីរ</a></li>
                        <li class="last"><a href="<?php echo BASE_URL.'mucluc_add'; ?>">បន្ថែមប្រភេទគម្ពីរ</a></li>
                </ul>
        </li>
        <li>
                <a href="" title="Pages"><span class="icon"><img src="resources/images/icons/page_white_copy.png" alt="Pages" /></span><span>ទំព័រ</span></a>
                <ul>
                        <li><a href="<?php echo BASE_URL.'trang_list'; ?>">រៀបចំទំព័រ</a></li>
                        <li><a href="<?php echo BASE_URL.'trang_add'; ?>">បន្ថែមទំព័រ</a></li>                          
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
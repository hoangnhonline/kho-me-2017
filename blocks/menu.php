<div id="siteMenuBar" class="ui-widget">
    <div class="tab_control">
        <a href="javascript:;"  class="tabmenu active" idML="1">经</a>
        <a href="javascript:;" idML="2" class="tabmenu">律</a>
        <a href="javascript:;" idML="3" class="tabmenu">论</a>
        <a href="javascript:;" idML="4" class="tabmenu">其他</a>
    </div>
    <div class="box_width_common">
        <div class="content_tab">
            <div id="menuContainer" class="ui-widget-header scroll-pane">
                <?php
                $mucluc = $tc->MucLuc_List(1);
                $row_ml = mysql_fetch_assoc($mucluc);
                ?>
                <div class='baosach'>
                    <?php
                    $sachlist = $tc->List_Sach($row_ml['idML']);
                    while ($row_s = mysql_fetch_assoc($sachlist)) {
                    ?>
                        <p idSach="<?php echo $row_s['idSach'] ?>" class="sach"><?php echo $row_s['TenSach'] ?></p>
                        <div class='baodanhmuc'></div>
                        <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
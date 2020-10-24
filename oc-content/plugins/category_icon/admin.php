<h2 class="render-title"><?php _e('Иконки категорий', 'category_icon'); ?></h2>
<div class="category_icon_add_box">
    <div class="left">
        <form action="<?php echo osc_admin_render_plugin_url('category_icon/admin.php'); ?>" method="post"
              enctype="multipart/form-data">
            <input type="hidden" name="newadd" value="true"/>
            <fieldset>
                <div class="form-horizontal">
                    <div class="form-row">
                        <div class="form-label"><?php _e('Категория', 'category_icon') ?></div>
                        <div class="form-controls">
                            <div class="photo_container">
                                <?php osc_categories_select('sCategory', null, __('Выберите категорию', 'admin')); ?><br>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-label"><?php _e('Иконка', 'category_icon') ?></div>
                        <div class="form-controls">
                            <div class="photo_container">
                                <input type="file" name="imageName"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-label"></div>
                        <div class="form-controls">
                            <input type="submit" value="Save changes" class="btn btn-submit">
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
    <div class="right">
        <h2>Помощь</h2>

        <p>Плагин позволяет добавить к каждой категории свою иконку/картинку</p>
        <h4>Как настроить плагин ?</h4>
        <p>Нужно добавить код в файл шаблона внутри цикла категорий</p>
        <pre>
            &lt;?php while (osc_has_categories()) { ?&gt;
            </pre>
			<p>Перед названием категории</p>
        <pre style="background: rgba(255, 172, 52, 0.25)">
&lt;?php if(get_category_icon(osc_category_id())) { ?&gt;<?php echo htmlspecialchars('<img src="<?php echo get_category_icon(osc_category_id()); ?>" />'); ?>&lt;?php } ?&gt;
        </pre>
    </div>
</div>

<div class="category_icon_box">
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Иконка</th>
            <th>Категория</th>
            <th>Действие</th>
        </tr>
        <?php
        if (count(get_all_categories_icon()) > 0) {
            foreach (get_all_categories_icon() as $catI) {
                $category_icon = osc_get_category('id', $catI['pk_i_id']);
                ?>
                <tr>
                    <td>
                        <?php echo $catI['bs_key_id']; ?>
                    </td>
                    <td><img src="<?php echo UPLOAD_PATH . $catI['bs_image_name']; ?>"/></td>
                    <td><?php echo $category_icon['s_name']; ?></td>
                    <td><a class="delete"
                           onclick="javascript:return confirm('<?php _e('Это действие нельзя отменить. Хотите продолжить ?', 'category_icon'); ?>')"
                           href="<?php echo osc_admin_render_plugin_url('category_icon/admin.php') . '&delete=' . $catI['bs_key_id']; ?>"><?php _e('Удалить', 'category_icon'); ?></a>
                    </td>
                </tr>
            <?php }
        } else {
            ?>
            <tr>
                <td colspan="4">
                    <i>Нет иконок</i>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>
<div class="example">
        <h4>Пример на шаблоне Bender</h4>
		<p>Вам нужно в файле шаблона functions.php найти цикл </p>
		<img src="<?php echo osc_base_url(); ?>oc-content/plugins/category_icon/assets/img/cicle.jpg"/>
		<p>И внутри цикла добавить код </p>
		<img src="<?php echo osc_base_url(); ?>oc-content/plugins/category_icon/assets/img/cicle2.jpg"/>
</div>
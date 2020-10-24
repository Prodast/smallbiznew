<?php if ( ! defined('OC_ADMIN')) exit('Direct access is not allowed.');
/*
 * Copyright 2014 Osclass
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

    osc_enqueue_script('tiny_mce5');

    $page       = __get('page');
    $templates  = __get('templates');
    $meta       = json_decode(@$page['s_meta'], true);

    $template_selected = (isset($meta['template']) && $meta['template']!='')?$meta['template']:'default';
    $locales = OSCLocale::newInstance()->listAllEnabled();

    function customFrmText($return = 'title') {
        $page = __get('page');
        $text = array();
        if( isset($page['pk_i_id']) ) {
            $text['edit']       = true;
            $text['title']      = __('Edit page');
            $text['action_frm'] = 'edit_post';
            $text['btn_text']   = __('Save changes');
        } else {
            $text['edit']       = false;
            $text['title']      = __('Add page');
            $text['action_frm'] = 'add_post';
            $text['btn_text']   = __('Add page');
        }

        return $text[$return];
    }

    function customPageHeader() { ?>
        <h1><?php _e('Pages'); ?></h1>
<?php
    }
    osc_add_hook('admin_page_header','customPageHeader');

    function customPageTitle($string) {
        return sprintf('%s &raquo; %s', customFrmText('title'), $string);
    }
    osc_add_filter('admin_title', 'customPageTitle');

    //customize Head
    function customHead() { ?>
        <script type="text/javascript">
            tinyMCE.init({
                mode : "textareas",
                mobile: {
                    // theme: 'mobile',
                    menubar: 'edit view insert format table'
                },
                menu: {
                    edit: {title: 'Edit', items: 'undo redo | selectall'}
                },
                menubar: 'edit view insert format table',
                width: "100%",
                height: "440px",
                language: 'en',
                branding: false,
                plugins : 'advlist autolink lists link image imagetools media charmap preview anchor searchreplace visualblocks code codesample fullscreen insertdatetime media table contextmenu',
                toolbar: 'undo redo | styleselect bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | codesample code',
                entity_encoding : "raw",
                relative_urls: false,
                remove_script_host: false,
                convert_urls: false,
                media_live_embeds: true,
                image_advtab: true,
                paste_data_images: true,
                link_assume_external_targets: true,
                link_quicklink: true,
                file_picker_types: 'image media',
                file_picker_callback: function(callback, value, meta) {
                    if (meta.filetype == 'image') {
                        $('#upload').trigger('click');

                        $('#upload').on('change', function() {
                            var file = this.files[0];
                            var reader = new FileReader();

                            reader.onload = function(e) {
                                callback(e.target.result, {
                                    alt: ''
                                });
                            };

                            reader.readAsDataURL(file);
                        });
                    }
                }
            });
        </script>
        <?php
    }
    osc_add_hook('admin_header','customHead', 10);

    osc_current_admin_theme_path('parts/header.php'); ?>
<h2 class="render-title"><?php echo customFrmText('title'); ?></h2>
<div id="item-form">
    <?php printLocaleTabs(); ?>
     <form action="<?php echo osc_admin_base_url(true); ?>" method="post">
        <input type="hidden" name="page" value="pages" />
        <input type="hidden" name="action" value="<?php echo customFrmText('action_frm'); ?>" />
         <input id="upload" class="hide" type="file" name="image" >
        <?php PageForm::primary_input_hidden($page); ?>
        <?php printLocaleTitlePage($locales, $page); ?>
        <div>
            <label><?php _e('Internal name'); ?></label>
            <?php PageForm::internal_name_input_text($page); ?>
            <div class="flashmessage flashmessage-warning flashmessage-inline">
                <p><?php _e('Used to quickly identify this page'); ?></p>
            </div>
            <span class="help"></span>
        </div>
        <?php if(count($templates)>0) { ?>
            <div>
                <label><?php _e('Page template'); ?></label>
                <select name="meta[template]">
                    <option value="default" <?php if($template_selected=='default') { echo 'selected="selected"'; }; ?>><?php _e('Default template'); ?></option>
                    <?php foreach($templates as $template) { ?>
                        <option value="<?php echo $template?>" <?php if($template_selected==$template) { echo 'selected="selected"'; }; ?>><?php echo $template; ?></option>
                    <?php }; ?>
                </select>
            </div>
        <?php }; ?>
        <div class="input-description-wide">
            <?php printLocaleDescriptionPage($locales, $page); ?>
        </div>
        <div class="form-controls">
                <div class="form-label-checkbox">
                <label><?php PageForm::link_checkbox($page); ?> <?php _e('Show a link in footer'); ?></label>
                </div>
        </div>
        <div>
            <?php osc_run_hook('page_meta'); ?>
        </div>
        <div class="clear"></div>
        <div class="form-actions">
            <?php if( customFrmText('edit') ) { ?>
            <a href="javascript:history.go(-1)" class="btn"><?php _e('Cancel'); ?></a>
            <?php } ?>
            <input type="submit" value="<?php echo osc_esc_html(customFrmText('btn_text')); ?>" class="btn btn-submit" />
        </div>
    </form>
</div>
<?php osc_current_admin_theme_path('parts/footer.php'); ?>

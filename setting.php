<link rel='stylesheet'  href='<?php echo plugin_dir_url( __FILE__ );?>layui/css/layui.css' />
<link rel='stylesheet'  href='<?php echo plugin_dir_url( __FILE__ );?>layui/css/laobuluo.css'/>
<script src='<?php echo plugin_dir_url( __FILE__ );?>layui/layui.js'></script>

<style>
    .site-text {
        border: 1px solid #ddd;
        padding: 30px 0 20px 0;
        margin: 30px auto;
    }

    .site-block .layui-form-label {
        width: 100%;
        max-width: 100px;
    }

    .site-block .layui-input-block {
        width: 100%;
        max-width: 315px;
        margin-left: 130px;
    }

    .site-block .layui-input-inline {
        width: 90px;
    }

    .laobuluo-wp-hidden {
        position: relative;
    }

    .laobuluo-wp-hidden .laobuluo-wp-eyes {
        padding: 5px;
        position: absolute;
        top: 3px;
        z-index: 999;
        display: none;
        cursor:pointer; 
        background-color: #fff;
    }

    .laobuluo-wp-hidden i {
        font-size: 20px;
        color: #666;
    }
</style>

<!-- nav -->
<div class="container-laobuluo-main">
    <div class="laobuluo-wbs-header" style="margin-bottom: 15px;">
        <div class="laobuluo-wbs-logo"><a><img src="<?php echo plugin_dir_url(__FILE__); ?>layui/images/logo.png"></a><span class="wbs-span">UCloud对象存储插件</span><span class="wbs-free">Free V2.6</span></div>
        <div class="laobuluo-wbs-btn">
            <a class="layui-btn layui-btn-primary" href="https://www.lezaiyun.com/?utm_source=wpufile-setting&utm_media=link&utm_campaign=header" target="_blank"><i class="layui-icon layui-icon-home"></i> 插件主页</a>
            <a class="layui-btn layui-btn-primary" href="https://www.lezaiyun.com/ucloud.html?utm_source=wpufile-setting&utm_media=link&utm_campaign=header" target="_blank"><i class="layui-icon layui-icon-release"></i> 插件教程</a>
        </div>
    </div>
</div>
<!-- nav -->
<!-- 内容 -->
<div class="container-laobuluo-main">
    <div class="layui-container container-m">
        <div class="layui-row layui-col-space15">
            <!-- 左边 -->
            <div class="layui-col-md9">
                <div class="laobuluo-panel">
                    <div class="laobuluo-controw">
                        <fieldset class="layui-elem-field layui-field-title site-title">
                            <legend><a name="get">UCloud UFile存储设置</a></legend>
                        </fieldset>
                        <div class="site-text site-block">
                            <form class="layui-form wpcosform" action="<?php echo wp_nonce_url('./admin.php?page=' . $this->base_folder . '/index.php'); ?>" name="wpupfile_form" method="post">
                                <div class="layui-form-item">
                                    <label class="layui-form-label">存储空间名称：</label>
                                    <div class="layui-input-block">
                                        <input type="text" class="layui-input" name="bucket" value="<?php echo esc_attr($this->options['bucket']); ?>" placeholder="比如：laobuluo" />
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">所属地域：</label>
                                    <div class="layui-input-block">
                                        <input type="text" class="layui-input" name="endpoint" value="<?php echo esc_attr($this->options['endpoint']); ?>" placeholder="例：.cn-bj.ufileos.com">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">远程URL：</label>
                                    <div class="layui-input-block">
                                        <input type="text" class="layui-input" name="upload_url_path" value="<?php echo esc_url(get_option('upload_url_path')); ?>" placeholder="例：http://laojiang.cn-bj.ufileos.com">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">令牌公钥：</label>
                                    <div class="layui-input-block">
                                        <div class="laobuluo-wp-hidden">
                                            <input type="password" class="layui-input" name="UCLOUD_PUBLIC_KEY" value="<?php echo esc_attr($this->options['UCLOUD_PUBLIC_KEY']); ?>" placeholder="UCLOUD_PUBLIC_KEY">
                                            <span class="laobuluo-wp-eyes"><i class="dashicons dashicons-hidden"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">令牌私钥：</label>
                                    <div class="layui-input-block">
                                        <div class="laobuluo-wp-hidden">
                                            <input type="password" class="layui-input" name="UCLOUD_PRIVATE_KEY" value="<?php echo esc_attr($this->options['UCLOUD_PRIVATE_KEY']); ?>" placeholder="UCLOUD_PRIVATE_KEY">
                                            <span class="laobuluo-wp-eyes"><i class="dashicons dashicons-hidden"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">自动重命名：</label>
                                    <div class="layui-input-inline">
                                        <input type="checkbox" title="开启" name="auto_rename" <?php
                                                                                                if (isset($this->options['opt']['auto_rename']) and $this->options['opt']['auto_rename']) {
                                                                                                    echo 'checked="TRUE"';
                                                                                                }
                                                                                                ?>>
                                    </div>
                                    <div class="layui-form-mid layui-word-aux"><p style="padding-bottom: 5px;">上传文件自动重命名，解决中文文件名或者重复文件名问题></p></div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">是否本地保存：</label>
                                    <div class="layui-input-inline">
                                        <input type="checkbox" title="保存" name="no_local_file" <?php
                            if ($this->options['no_local_file']) {
                                echo 'checked="TRUE"';
                            }
					    ?>/>
                                    </div>
                                    <div class="layui-form-mid layui-word-aux"><p style="padding-bottom: 5px;">如果不想同步在服务器中备份静态文件就 "勾选"。</p></div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">禁止缩略图：</label>
                                    <div class="layui-input-inline">
                                        <input type="checkbox" title="禁止" name="disable_thumb" <?php
                        if (isset($this->options['opt']['thumbsize'])) {
                            echo 'checked="TRUE"';
                        }
                        ?>
                    />
                                    </div>
                                    <div class="layui-form-mid layui-word-aux"><p style="padding-bottom: 5px;">上传文件自动重命名，解决中文文件名或者重复文件名问题</p></div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">数据万象：</label>
                                    <div class="layui-input-inline">
                                        <input type="checkbox" lay-skin="switch" lay-filter="process_switch" lay-text="开启|关闭" name="img_process_switch" <?php                                                                                                                                                      if (isset($this->options['opt']['img_process']['switch']) &&   $this->options['opt']['img_process']['switch'] ) { echo 'checked="TRUE"';}?>>                                    </div>
                                    <div class="layui-form-mid layui-word-aux">
                                        <div class="layui-form-mid layui-word-aux"><p style="padding-bottom: 5px;">支持数据编辑图片，压缩、转换格式、水印等。(属于付费功能 可不开启)</p></div>
                                    </div>
                                </div>
                                <div class="layui-form-item clashid" style="display:
								   <?php
                                    if (
                                        isset($this->options['opt']['img_process']['switch']) &&
                                        $this->options['opt']['img_process']['switch']
                                    ) {
                                        echo 'block';
                                    } else {
                                        echo 'none';
                                    }
                                    ?>;">
                                    <?php
                                    if (
                                        !isset($this->options['opt']['img_process']['style_value'])
                                        or $this->options['opt']['img_process']['style_value'] === $this->image_display_default_value
                                        or $this->options['opt']['img_process']['style_value'] === ''
                                    ) {

                                        echo '<label class="layui-form-label">选择模式</label>
										         <div class="layui-input-block">
										   			<input lay-filter="choice" name="img_process_style_choice" type="radio" value="0" checked="TRUE" title="webp压缩图片" > 
										   		</div>
												<div class="layui-input-block">
													 <input lay-filter="choice"  name="img_process_style_choice" type="radio" value="1"  title="自定义规则">
												</div>
									 			<div class="layui-input-block" >
									 				<input class="layui-input" 
                                                     name="img_process_style_customize" type="text" id="rss_rule" placeholder="请填写自定义规则" 
                                                     value="" disabled="disabled">';
                                    } else {
                                        echo '<label class="layui-form-label">选择模式</label>
												 <div class="layui-input-block">
													  <input lay-filter="choice" name="img_process_style_choice" type="radio" value="0"  title="webp压缩图片" > 
												 </div>
												 <div class="layui-input-block">
													  <input lay-filter="choice" name="img_process_style_choice" type="radio" value="1" checked="TRUE"  title="自定义规则">
												 </div>
												 <div class="layui-input-block" >
												 <input class="layui-input"
                                                 name="img_process_style_customize" type="text" id="rss_rule" placeholder="请填写自定义规则" 
                                                 value="' . $this->options['opt']['img_process']['style_value'] . '"  >';
                                    }
                                    ?>

                                </div>
                        </div>


                        <div class="layui-form-item">
                            <div class="layui-input-block">
                                <input type="submit" name="submit" value="保存设置" class="layui-btn" />
                            </div>
                        </div>
                        <input type="hidden" name="type" value="info_set">
                        </form>
                    </div>
                  <blockquote class="layui-elem-quote">
                        <p>1. 如果我们有多个网站需要使用WPUFile插件，可以远程URL后面加上不同目录。</p>
                        <p>2. 使用WPUpFile插件分离图片、附件文件，存储在UCloud UFile云存储空间根目录，比如：2019、2018、2017这样的直接目录，不会有wp-content这样目录。</p>
                        <p>3. 如果我们已运行网站需要使用WPUFile插件，插件激活之后，需要将本地wp-content目录中的文件对应时间目录上传至UFile存储空间中，且需要在数据库替换静态文件路径生效。</p>
                    </blockquote>
                    <div class="site-text site-block">
                        <form class="layui-form wpcosform" action="<?php echo wp_nonce_url('./admin.php?page=' . $this->base_folder . '/index.php'); ?>" name="wpufile_form2" method="post">
                            <div class="layui-form-item">
                                <label class="layui-form-label">一键替换：</label>
                                <div class="layui-input-inline" style="width: 160px;">
                                    <?php if (isset($this->options['opt']) && array_key_exists('legacy_data_replace', $this->options['opt']) && $this->options['opt']['legacy_data_replace'] == 1) {
                                        echo '<input type="submit" disabled name="submit" value="已替换" class="layui-btn layui-btn-disabled" />';
                                    } else {
                                        echo '<input type="submit" name="submit" value="一键替换UFile地址" class=" layui-btn layui-btn-normal" />';
                                    }
                                    ?>

                                </div>
                                <div class="layui-form-mid layui-word-aux"> <p style="padding-bottom: 5px;">一键将本地静态文件URL替换成UCloud UFile路径，不熟悉的朋友请先备份</p></div>
                            </div>
                            <input type="hidden" name="type" value="info_replace">
                        </form>
                    </div>
                   
                </div>
            </div>
        </div>
        <!-- 左边 -->
        <!-- 右边  -->
        <div class="layui-col-md3">
            <div id="nav">
                
                <div class="laobuluo-panel">
                        <div class="laobuluo-panel-title">关注公众号</div>
                        <div class="laobuluo-code">
                            <img src="<?php echo plugin_dir_url(__FILE__); ?>layui/images/qrcode.png">
                            <p>微信扫码关注 <span class="layui-badge layui-bg-blue">老蒋朋友圈</span> 公众号</p>
                            <p><span class="layui-badge">优先</span> 获取插件更新 和 更多 <span class="layui-badge layui-bg-green">免费插件</span> </p>
                        </div>
                    </div>
                <div class="laobuluo-panel">
                            <div class="laobuluo-panel-title">站长必备资源</div>
                            <div class="laobuluo-shangjia">
                                <a href="https://www.lezaiyun.com/webmaster-tools.html" target="_blank" title="站长必备资源">
                                    <img src="<?php echo plugin_dir_url( __FILE__ );?>layui/images/cloud.jpg"></a>
                                    <p>站长必备的商家、工具资源整理！</p>
                            </div>
                        </div>
            </div>
        </div>
        <!-- 右边 end -->
    </div>
</div>
</div>
<!-- footer -->
   <div class="container-laobuluo-main">
	   <div class="layui-container container-m">
		   <div class="layui-row layui-col-space15">
			   <div class="layui-col-md12">
				<div class="laobuluo-footer-code">
					 <span class="codeshow"></span>
				</div>
				   <div class="laobuluo-links">
                    <a href="https://www.laobuluo.com/?utm_source=wpftp-setting&utm_media=link&utm_campaign=footer"  target="_blank">老部落</a>
					   <a href="https://www.lezaiyun.com/?utm_source=wpufile-setting&utm_media=link&utm_campaign=footer"  target="_blank">乐在云</a>
					   <a href="https://www.lezaiyun.com/ucloud.html?utm_source=wpufile-setting&utm_media=link&utm_campaign=footer"  target="_blank">使用说明</a> 
					   <a href="https://www.lezaiyun.com/about/?utm_source=wpufile-setting&utm_media=link&utm_campaign=footer"  target="_blank">关于我们</a>
					   </div>
			   </div>
		   </div>
	   </div>
   </div>
   <!-- footer -->
<script>
    layui.use(['jquery', 'form', 'element'], function() {

        var $ = layui.jquery;
        var form = layui.form;

        function menuFixed(id) {
            var obj = document.getElementById(id);
            var _getHeight = obj.offsetTop;
            var _Width = obj.offsetWidth
            window.onscroll = function() {
                changePos(id, _getHeight, _Width);
            }
        }

        function changePos(id, height, width) {
            var obj = document.getElementById(id);
            obj.style.width = width + 'px';
            var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
            var _top = scrollTop - height;
            if (_top < 150) {
                var o = _top;
                obj.style.position = 'relative';
                o = o > 0 ? o : 0;
                obj.style.top = o + 'px';

            } else {
                obj.style.position = 'fixed';
                obj.style.top = 50 + 'px';

            }
        }



        $(window).resize(function() {
            console.log(123121)
			if ($(window).width() > 1024) {
        
				menuFixed('nav');
			}
	    })


        var laobueys = $('.laobuluo-wp-hidden')

        laobueys.each(function() {

            var inpu = $(this).find('.layui-input');
            var eyes = $(this).find('.laobuluo-wp-eyes')
            var width = $(this).width() - 35;
            eyes.css('left', width + 'px').show();
            eyes.click(function() {
                if (inpu.attr('type') == "password") {

                    inpu.attr('type', 'text')
                    eyes.html('<i class="dashicons dashicons-visibility"></i>')
                } else {
                    inpu.attr('type', 'password')
                    eyes.html('<i class="dashicons dashicons-hidden"></i>')
                }
            })
        })

        var clashid = $(".clashid");
        form.on('switch(process_switch)', function(data) {

            if (data.elem.checked) {
                clashid.show()
            } else {
                clashid.hide()
            }

        });

        var selectValue = null;

        var rule = $("[name=img_process_style_customize]")

        form.on('radio(choice)', function(data) {

            if (selectValue == data.value && selectValue) {
                data.elem.checked = ""
                selectValue = null;
            } else {
                selectValue = data.value;
            }

            if (selectValue == '1') {
                rule.attr('disabled', false)
            } else {
                rule.attr('disabled', true)
            }

        })

    })
</script>
<?php
$baseUrl = Yii::app()->request->hostInfo . Yii::app()->request->baseUrl;
$url = Yii::app()->request->hostInfo;
?>
<div style="font-family:Tahoma,Arial,sans-serif;width:100%!important;min-height:100%;font-size:14px;color:#404040;margin:0;padding:0" bgcolor="#FFFFFF">
    <table bgcolor="transparent" style="max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;background-color:transparent;margin:0;padding:0">
        <tbody>
            <tr style="margin:0;padding:0">
                <td style="margin:0;padding:0">
                </td>
                <td style="display:block!important;max-width:600px!important;clear:both!important;margin:0 auto;padding:0">

                    <div style="max-width:600px;display:block;border-collapse:collapse;margin:0 auto;padding:0;border:0 solid #e7e7e7">
                        <table bgcolor="#fff" style="max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;background-color:transparent;margin:0;padding:0">
                            <tbody>
                                <tr style="margin:0;padding:0">
                                    <td bgcolor="#706B5F" height="4" style="background-color:#009b4c!important;line-height:4px;font-size:4px;margin:0;padding:0">&nbsp;
                                    </td>
                                    <td bgcolor="#d50f25" height="4" style="background-color:#009b4c!important;line-height:4px;font-size:4px;margin:0;padding:0">&nbsp;
                                    </td>
                                    <td bgcolor="#3369E8" height="4" style="background-color:#009b4c!important;line-height:4px;font-size:4px;margin:0;padding:0">&nbsp;
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
                <td style="margin:0;padding:0">
                </td>
            </tr>
        </tbody>
    </table>
    <table bgcolor="transparent" style="max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;background-color:transparent;margin:0;padding:0">
        <tbody>
            <tr style="margin:0;padding:0">
                <td style="margin:0;padding:0">
                </td>
                <td bgcolor="#FFFFFF" style="display:block!important;max-width:600px!important;clear:both!important;margin:0 auto;padding:0">

                    <div style="max-width:600px;display:block;border-collapse:collapse;margin:0 auto;padding:30px 15px;border:1px solid #e7e7e7">
                        <table bgcolor="transparent" style="max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;background-color:transparent;margin:0;padding:0">
                            <tbody>
                                <tr style="margin:0;padding:0">
                                    <td style="margin:0;padding:0">
                                        <h5 style="line-height:24px;color:#000;font-weight:900;font-size:17px;margin:0 0 20px;padding:0">Hello <?php echo ucwords(strtolower($m_unit->nama_pemilik)); ?>,</h5>
                                        <p style="font-weight:normal;font-size:14px;line-height:1.6;margin:0 0 20px;padding:0">Sorry, you have to reschedule the appointment. Please contact our Finance Department (WA - +6282131731536)</p>
                                        <div style="margin:0 0 20px;padding:0">

                                            <table bgcolor="transparent" style="width:100%;max-width:100%;border-collapse:collapse;border-spacing:0;background-color:transparent;margin:5px 0;padding:0">
                                                <tbody style="margin:0;padding:0">
                                                    <tr style="margin:0;padding:0">
                                                        <td valign="top" style="width:25%;font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0">Name:
                                                        </td>
                                                        <td valign="top" style="font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0"><?php echo ucwords(strtolower($m_unit->nama_pemilik)) ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div style="border-bottom-width:1px;border-bottom-color:#eee;border-bottom-style:solid;margin:0;padding:0">
                                            </div>
                                            <table bgcolor="transparent" style="width:100%;max-width:100%;border-collapse:collapse;border-spacing:0;background-color:transparent;margin:5px 0;padding:0">
                                                <tbody style="margin:0;padding:0">
                                                    <tr style="margin:0;padding:0">
                                                        <td valign="top" style="width:25%;font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0">Phone:
                                                        </td>
                                                        <td valign="top" style="font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0"><?php echo $m_unit->phone ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div style="border-bottom-width:1px;border-bottom-color:#eee;border-bottom-style:solid;margin:0;padding:0">
                                            </div>
                                            <table bgcolor="transparent" style="width:100%;max-width:100%;border-collapse:collapse;border-spacing:0;background-color:transparent;margin:5px 0;padding:0">
                                                <tbody style="margin:0;padding:0">
                                                    <tr style="margin:0;padding:0">
                                                        <td valign="top" style="width:25%;font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0">Address:
                                                        </td>
                                                        <td valign="top" style="font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0">
                                                            <?php echo 'Blok '. $m_unit->blok.'-'. $m_unit->kav .' Type '. ucwords(strtolower($m_unit->tipe_rumah)) ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div style="border-bottom-width:1px;border-bottom-color:#eee;border-bottom-style:solid;margin:0;padding:0">
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
                <td style="margin:0;padding:0">
                </td>
            </tr>
        </tbody>
    </table>
    <table bgcolor="transparent" style="max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;clear:both!important;background-color:transparent;margin:0 0 60px;padding:0">
        <tbody>
            <tr style="margin:0;padding:0">
                <td style="margin:0;padding:0">
                </td>
                <td style="display:block!important;max-width:600px!important;clear:both!important;margin:0 auto;padding:0">

                    <div style="max-width:600px;display:block;border-collapse:collapse;margin:0 auto;padding:20px 15px;border-color:#e7e7e7;border-style:solid;border-width:0 1px 1px">
                        <table bgcolor="transparent" width="100%" style="max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;background-color:transparent;margin:0;padding:0">
                            <tbody style="margin:0;padding:0">
                                <tr style="margin:0;padding:0">
                                    <td valign="top" style="margin:0;padding:0 10px 0 0;width:75%">

                                        <span style="font-size:12px;margin-bottom:6px;display:inline-block">
                                            <b>Call Us <span class="lG">Citraland Utara Surabaya</span></b> 
                                            <br>
                                            Email: marketing@citralandutara.com
                                            <br>
                                            Phone: +62 31 741 2888
                                        </span>
                                    </td>
                                    <td valign="top" style="margin:0;padding:0">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
                <td style="margin:0;padding:0">
                </td>
            </tr>
            <tr style="margin:0;padding:0">
                <td style="margin:0;padding:0">
                </td>
                <td style="display:block!important;max-width:600px!important;clear:both!important;margin:0 auto;padding:0">

                    <div style="max-width:600px;display:block;border-collapse:collapse;background-color:#f7f7f7;margin:0 auto;padding:20px 15px;border-color:#e7e7e7;border-style:solid;border-width:0 1px 1px">
                        <table bgcolor="transparent" width="100%" style="max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;background-color:transparent;margin:0;padding:0">
                            <tbody style="margin:0;padding:0">
                                <tr style="margin:0;padding:0">
                                    <td valign="middle" style="margin:0;padding:0;width:53%">

                                        <p style="color:#91908e;font-size:10px;line-height:150%;font-weight:normal;margin:0px;padding:0px">If you need help, use the page <a target="_blank" style="color:#0f990f;text-decoration:none;margin:0;padding:0" href="<?php echo $url.CHtml::normalizeUrl(array('/home')); ?>">Contact us</a>.<br style="margin:0;padding:0">&copy; <?php echo date("Y"); ?></p>
                                    </td>
                                    <td valign="middle" style="width:40%">
                                        <div style="text-align:right"><img alt="" style="max-width: 120px;" src="<?php echo $baseUrl ?>/asset/images/logo-head.png">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
                <td style="margin:0;padding:0">
                </td>
            </tr>
        </tbody>
    </table>
</div>



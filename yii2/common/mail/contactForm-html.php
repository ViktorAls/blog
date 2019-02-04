<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

?>
<style type="text/css">
    /* CLIENT-SPECIFIC STYLES */
    body, table, td, a {
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
    }

    /* Prevent WebKit and Windows mobile changing default text sizes */
    table, td {
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
    }

    table {
        border-collapse: collapse !important;
    }

    body {
        height: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
        width: 100% !important;
    }

    /* iOS BLUE LINKS */
    a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
    }

    /* MOBILE STYLES */
    @media screen and (max-width: 525px) {

        /* ALLOWS FOR FLUID TABLES */
        .wrapper {
            width: 100% !important;
            max-width: 100% !important;
        }

        /* ADJUSTS LAYOUT OF LOGO IMAGE */
        .logo img {
            margin: 0 auto !important;
        }

        /* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
        .mobile-hide {
            display: none !important;
        }

        .img-max {
            max-width: 100% !important;
            width: 100% !important;
            height: auto !important;
        }

        /* FULL-WIDTH TABLES */
        .responsive-table {
            width: 100% !important;
        }

        /* UTILITY CLASSES FOR ADJUSTING PADDING ON MOBILE */
        .padding {
            padding: 10px 5% 15px 5% !important;
        }

        .padding-meta {
            padding: 30px 5% 0px 5% !important;
            text-align: center;
        }

        .padding-copy {
            padding: 10px 5% 10px 5% !important;
            text-align: center;
        }

        .no-padding {
            padding: 0 !important;
        }

        .section-padding {
            padding: 50px 15px 50px 15px !important;
        }

        /* ADJUST BUTTONS ON MOBILE */
        .mobile-button-container {
            margin: 0 auto;
            width: 100% !important;
        }

        .mobile-button {
            padding: 15px !important;
            border: 0 !important;
            font-size: 16px !important;
            display: block !important;
        }

    }

    /* ANDROID CENTER FIX */
    div[style*="margin: 16px 0;"] {
        margin: 0 !important;
    }
</style>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td bgcolor="#ffffff" align="center" class="section-padding">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
                <tr>
                    <td align="center" valign="top" width="500">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;"
                   class="responsive-table">
                <tr>
                    <td>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td align="left"
                                                style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;"
                                                class="padding-copy">
                                                <b><?= $title ?></b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left"
                                                style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;"
                                                class="padding-copy"><?= $description ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left"
                                                style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;"
                                                class="padding-copy">С уважением,<?= $name ?>
                                                <br> Обратная связь: <?= $email ?>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
</table>

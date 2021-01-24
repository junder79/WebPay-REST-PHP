
<?php
/*PHP MAILER*/
$correo_cliente = $dataCliente['email'];
$nombre_cliente = $dataCliente['nombres'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "phpmailer/PHPMailer.php";

require_once "phpmailer/SMTP.php";

require_once "phpmailer/Exception.php";


$mail = new PHPMailer();
$mail->IsSMTP(true);
$mail->Host = 'smtp.gmail.com'; // not ssl://smtp.gmail.com
$mail->SMTPAuth = true;
$mail->Username = 'lavameappcorreo@gmail.com';
$mail->Password = 'lavameappcorreo123';
$mail->Port = 465; // not 587 for ssl 
/* La cantidad del log , 0 es nada */
$mail->SMTPDebug = 0;
$mail->SMTPSecure = 'ssl';
$mail->setFrom('desarrollo.lavameapp@gmail.com', 'LavameApp');
$mail->AddAddress($correo_cliente, $nombre_cliente);



// Content

$mail->isHTML(true);

$mail->Subject = 'Lavameapp Agendado';

$bodyMail = '<img src="https://yt3.ggpht.com/a-/AAuE7mAtp3CrBqZuuLP6BqLypb7wPK-pt9APsxil5g=s900-mo-c-c0xffffffff-rj-k-no"  width="100" height="100"/>';

$bodyMail = '<Strong>Servicio Agendado</Strong><br>';





$bodyMail = "<!doctype html>

                <html xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml' xmlns:o='urn:schemas-microsoft-com:office:office'>

                    <head>

                        <!-- NAME: 1 COLUMN -->

                        <!--[if gte mso 15]>

                        <xml>

                            <o:OfficeDocumentSettings>

                            <o:AllowPNG/>

                            <o:PixelsPerInch>96</o:PixelsPerInch>

                            </o:OfficeDocumentSettings>

                        </xml>

                        <![endif]-->

                        <meta charset='UTF-8'>

                        <meta http-equiv='X-UA-Compatible' content='IE=edge'>

                        <meta name='viewport' content='width=device-width, initial-scale=1'>

                        <title>*|MC:SUBJECT|*</title>

                        

                    <style type='text/css'>

                        p{

                            margin:10px 0;

                            padding:0;

                        }

                        table{

                            border-collapse:collapse;

                        }

                        h1,h2,h3,h4,h5,h6{

                            display:block;

                            margin:0;

                            padding:0;

                        }

                        img,a img{

                            border:0;

                            height:auto;

                            outline:none;

                            text-decoration:none;

                        }

                        body,#bodyTable,#bodyCell{

                            height:100%;

                            margin:0;

                            padding:0;

                            width:100%;

                        }

                        .mcnPreviewText{

                            display:none !important;

                        }

                        #outlook a{

                            padding:0;

                        }

                        img{

                            -ms-interpolation-mode:bicubic;

                        }

                        table{

                            mso-table-lspace:0pt;

                            mso-table-rspace:0pt;

                        }

                        .ReadMsgBody{

                            width:100%;

                        }

                        .ExternalClass{

                            width:100%;

                        }

                        p,a,li,td,blockquote{

                            mso-line-height-rule:exactly;

                        }

                        a[href^=tel],a[href^=sms]{

                            color:inherit;

                            cursor:default;

                            text-decoration:none;

                        }

                        p,a,li,td,body,table,blockquote{

                            -ms-text-size-adjust:100%;

                            -webkit-text-size-adjust:100%;

                        }

                        .ExternalClass,.ExternalClass p,.ExternalClass td,.ExternalClass div,.ExternalClass span,.ExternalClass font{

                            line-height:100%;

                        }

                        a[x-apple-data-detectors]{

                            color:inherit !important;

                            text-decoration:none !important;

                            font-size:inherit !important;

                            font-family:inherit !important;

                            font-weight:inherit !important;

                            line-height:inherit !important;

                        }

                        #bodyCell{

                            padding:10px;

                        }

                        .templateContainer{

                            max-width:600px !important;

                        }

                        a.mcnButton{

                            display:block;

                        }

                        .mcnImage,.mcnRetinaImage{

                            vertical-align:bottom;

                        }

                        .mcnTextContent{

                            word-break:break-word;

                        }

                        .mcnTextContent img{

                            height:auto !important;

                        }

                        .mcnDividerBlock{

                            table-layout:fixed !important;

                        }

                    /*

                    @tab Page

                    @section Background Style

                    @tip Set the background color and top border for your email. You may want to choose colors that match your company's branding.

                    */

                        body,#bodyTable{

                            /*@editable*/background-color:#0cb0e4;

                        }

                    /*

                    @tab Page

                    @section Background Style

                    @tip Set the background color and top border for your email. You may want to choose colors that match your company's branding.

                    */

                        #bodyCell{

                            /*@editable*/border-top:0;

                        }

                    /*

                    @tab Page

                    @section Email Border

                    @tip Set the border for your email.

                    */

                        .templateContainer{

                            /*@editable*/border:0;

                        }

                    /*

                    @tab Page

                    @section Heading 1

                    @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.

                    @style heading 1

                    */

                        h1{

                            /*@editable*/color:#202020;

                            /*@editable*/font-family:Helvetica;

                            /*@editable*/font-size:26px;

                            /*@editable*/font-style:normal;

                            /*@editable*/font-weight:bold;

                            /*@editable*/line-height:125%;

                            /*@editable*/letter-spacing:normal;

                            /*@editable*/text-align:left;

                        }

                    /*

                    @tab Page

                    @section Heading 2

                    @tip Set the styling for all second-level headings in your emails.

                    @style heading 2

                    */

                        h2{

                            /*@editable*/color:#202020;

                            /*@editable*/font-family:Helvetica;

                            /*@editable*/font-size:22px;

                            /*@editable*/font-style:normal;

                            /*@editable*/font-weight:bold;

                            /*@editable*/line-height:125%;

                            /*@editable*/letter-spacing:normal;

                            /*@editable*/text-align:left;

                        }

                    /*

                    @tab Page

                    @section Heading 3

                    @tip Set the styling for all third-level headings in your emails.

                    @style heading 3

                    */

                        h3{

                            /*@editable*/color:#202020;

                            /*@editable*/font-family:Helvetica;

                            /*@editable*/font-size:20px;

                            /*@editable*/font-style:normal;

                            /*@editable*/font-weight:bold;

                            /*@editable*/line-height:125%;

                            /*@editable*/letter-spacing:normal;

                            /*@editable*/text-align:left;

                        }

                    /*

                    @tab Page

                    @section Heading 4

                    @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.

                    @style heading 4

                    */

                        h4{

                            /*@editable*/color:#202020;

                            /*@editable*/font-family:Helvetica;

                            /*@editable*/font-size:18px;

                            /*@editable*/font-style:normal;

                            /*@editable*/font-weight:bold;

                            /*@editable*/line-height:125%;

                            /*@editable*/letter-spacing:normal;

                            /*@editable*/text-align:left;

                        }

                    /*

                    @tab Preheader

                    @section Preheader Style

                    @tip Set the background color and borders for your email's preheader area.

                    */

                        #templatePreheader{

                            /*@editable*/background-color:#0cb0e4;

                            /*@editable*/background-image:none;

                            /*@editable*/background-repeat:no-repeat;

                            /*@editable*/background-position:center;

                            /*@editable*/background-size:cover;

                            /*@editable*/border-top:0;

                            /*@editable*/border-bottom:0;

                            /*@editable*/padding-top:9px;

                            /*@editable*/padding-bottom:9px;

                        }

                    /*

                    @tab Preheader

                    @section Preheader Text

                    @tip Set the styling for your email's preheader text. Choose a size and color that is easy to read.

                    */

                        #templatePreheader .mcnTextContent,#templatePreheader .mcnTextContent p{

                            /*@editable*/color:#656565;

                            /*@editable*/font-family:Helvetica;

                            /*@editable*/font-size:12px;

                            /*@editable*/line-height:150%;

                            /*@editable*/text-align:left;

                        }

                    /*

                    @tab Preheader

                    @section Preheader Link

                    @tip Set the styling for your email's preheader links. Choose a color that helps them stand out from your text.

                    */

                        #templatePreheader .mcnTextContent a,#templatePreheader .mcnTextContent p a{

                            /*@editable*/color:#656565;

                            /*@editable*/font-weight:normal;

                            /*@editable*/text-decoration:underline;

                        }

                    /*

                    @tab Header

                    @section Header Style

                    @tip Set the background color and borders for your email's header area.

                    */

                        #templateHeader{

                            /*@editable*/background-color:#0cb0e4;

                            /*@editable*/background-image:none;

                            /*@editable*/background-repeat:no-repeat;

                            /*@editable*/background-position:center;

                            /*@editable*/background-size:cover;

                            /*@editable*/border-top:0;

                            /*@editable*/border-bottom:0;

                            /*@editable*/padding-top:9px;

                            /*@editable*/padding-bottom:0;

                        }

                    /*

                    @tab Header

                    @section Header Text

                    @tip Set the styling for your email's header text. Choose a size and color that is easy to read.

                    */

                        #templateHeader .mcnTextContent,#templateHeader .mcnTextContent p{

                            /*@editable*/color:#202020;

                            /*@editable*/font-family:Helvetica;

                            /*@editable*/font-size:16px;

                            /*@editable*/line-height:150%;

                            /*@editable*/text-align:left;

                        }

                    /*

                    @tab Header

                    @section Header Link

                    @tip Set the styling for your email's header links. Choose a color that helps them stand out from your text.

                    */

                        #templateHeader .mcnTextContent a,#templateHeader .mcnTextContent p a{

                            /*@editable*/color:#007C89;

                            /*@editable*/font-weight:normal;

                            /*@editable*/text-decoration:underline;

                        }

                    /*

                    @tab Body

                    @section Body Style

                    @tip Set the background color and borders for your email's body area.

                    */

                        #templateBody{

                            /*@editable*/background-color:#0cb0e4;

                            /*@editable*/background-image:none;

                            /*@editable*/background-repeat:no-repeat;

                            /*@editable*/background-position:center;

                            /*@editable*/background-size:cover;

                            /*@editable*/border-top:0;

                            /*@editable*/border-bottom:2px none #EAEAEA;

                            /*@editable*/padding-top:0;

                            /*@editable*/padding-bottom:9px;

                        }

                    /*

                    @tab Body

                    @section Body Text

                    @tip Set the styling for your email's body text. Choose a size and color that is easy to read.

                    */

                        #templateBody .mcnTextContent,#templateBody .mcnTextContent p{

                            /*@editable*/color:#202020;

                            /*@editable*/font-family:Helvetica;

                            /*@editable*/font-size:16px;

                            /*@editable*/line-height:150%;

                            /*@editable*/text-align:left;

                        }

                    /*

                    @tab Body

                    @section Body Link

                    @tip Set the styling for your email's body links. Choose a color that helps them stand out from your text.

                    */

                        #templateBody .mcnTextContent a,#templateBody .mcnTextContent p a{

                            /*@editable*/color:#007C89;

                            /*@editable*/font-weight:normal;

                            /*@editable*/text-decoration:underline;

                        }

                    /*

                    @tab Footer

                    @section Footer Style

                    @tip Set the background color and borders for your email's footer area.

                    */

                        #templateFooter{

                            /*@editable*/background-color:#0cb0e4;

                            /*@editable*/background-image:none;

                            /*@editable*/background-repeat:no-repeat;

                            /*@editable*/background-position:center;

                            /*@editable*/background-size:cover;

                            /*@editable*/border-top:0;

                            /*@editable*/border-bottom:0;

                            /*@editable*/padding-top:9px;

                            /*@editable*/padding-bottom:9px;

                        }

                    /*

                    @tab Footer

                    @section Footer Text

                    @tip Set the styling for your email's footer text. Choose a size and color that is easy to read.

                    */

                        #templateFooter .mcnTextContent,#templateFooter .mcnTextContent p{

                            /*@editable*/color:#656565;

                            /*@editable*/font-family:Helvetica;

                            /*@editable*/font-size:12px;

                            /*@editable*/line-height:150%;

                            /*@editable*/text-align:center;

                        }

                    /*

                    @tab Footer

                    @section Footer Link

                    @tip Set the styling for your email's footer links. Choose a color that helps them stand out from your text.

                    */

                        #templateFooter .mcnTextContent a,#templateFooter .mcnTextContent p a{

                            /*@editable*/color:#656565;

                            /*@editable*/font-weight:normal;

                            /*@editable*/text-decoration:underline;

                        }

                    @media only screen and (min-width:768px){

                        .templateContainer{

                            width:600px !important;

                        }

                

                }   @media only screen and (max-width: 480px){

                        body,table,td,p,a,li,blockquote{

                            -webkit-text-size-adjust:none !important;

                        }

                

                }   @media only screen and (max-width: 480px){

                        body{

                            width:100% !important;

                            min-width:100% !important;

                        }

                

                }   @media only screen and (max-width: 480px){

                        #bodyCell{

                            padding-top:10px !important;

                        }

                

                }   @media only screen and (max-width: 480px){

                        .mcnRetinaImage{

                            max-width:100% !important;

                        }

                

                }   @media only screen and (max-width: 480px){

                        .mcnImage{

                            width:100% !important;

                        }

                

                }   @media only screen and (max-width: 480px){

                        .mcnCartContainer,.mcnCaptionTopContent,.mcnRecContentContainer,.mcnCaptionBottomContent,.mcnTextContentContainer,.mcnBoxedTextContentContainer,.mcnImageGroupContentContainer,.mcnCaptionLeftTextContentContainer,.mcnCaptionRightTextContentContainer,.mcnCaptionLeftImageContentContainer,.mcnCaptionRightImageContentContainer,.mcnImageCardLeftTextContentContainer,.mcnImageCardRightTextContentContainer,.mcnImageCardLeftImageContentContainer,.mcnImageCardRightImageContentContainer{

                            max-width:100% !important;

                            width:100% !important;

                        }

                

                }   @media only screen and (max-width: 480px){

                        .mcnBoxedTextContentContainer{

                            min-width:100% !important;

                        }

                

                }   @media only screen and (max-width: 480px){

                        .mcnImageGroupContent{

                            padding:9px !important;

                        }

                

                }   @media only screen and (max-width: 480px){

                        .mcnCaptionLeftContentOuter .mcnTextContent,.mcnCaptionRightContentOuter .mcnTextContent{

                            padding-top:9px !important;

                        }

                

                }   @media only screen and (max-width: 480px){

                        .mcnImageCardTopImageContent,.mcnCaptionBottomContent:last-child .mcnCaptionBottomImageContent,.mcnCaptionBlockInner .mcnCaptionTopContent:last-child .mcnTextContent{

                            padding-top:18px !important;

                        }

                

                }   @media only screen and (max-width: 480px){

                        .mcnImageCardBottomImageContent{

                            padding-bottom:9px !important;

                        }

                

                }   @media only screen and (max-width: 480px){

                        .mcnImageGroupBlockInner{

                            padding-top:0 !important;

                            padding-bottom:0 !important;

                        }

                

                }   @media only screen and (max-width: 480px){

                        .mcnImageGroupBlockOuter{

                            padding-top:9px !important;

                            padding-bottom:9px !important;

                        }

                

                }   @media only screen and (max-width: 480px){

                        .mcnTextContent,.mcnBoxedTextContentColumn{

                            padding-right:18px !important;

                            padding-left:18px !important;

                        }

                

                }   @media only screen and (max-width: 480px){

                        .mcnImageCardLeftImageContent,.mcnImageCardRightImageContent{

                            padding-right:18px !important;

                            padding-bottom:0 !important;

                            padding-left:18px !important;

                        }

                

                }   @media only screen and (max-width: 480px){

                        .mcpreview-image-uploader{

                            display:none !important;

                            width:100% !important;

                        }

                

                }   @media only screen and (max-width: 480px){

                    /*

                    @tab Mobile Styles

                    @section Heading 1

                    @tip Make the first-level headings larger in size for better readability on small screens.

                    */

                        h1{

                            /*@editable*/font-size:22px !important;

                            /*@editable*/line-height:125% !important;

                        }

                

                }   @media only screen and (max-width: 480px){

                    /*

                    @tab Mobile Styles

                    @section Heading 2

                    @tip Make the second-level headings larger in size for better readability on small screens.

                    */

                        h2{

                            /*@editable*/font-size:20px !important;

                            /*@editable*/line-height:125% !important;

                        }

                

                }   @media only screen and (max-width: 480px){

                    /*

                    @tab Mobile Styles

                    @section Heading 3

                    @tip Make the third-level headings larger in size for better readability on small screens.

                    */

                        h3{

                            /*@editable*/font-size:18px !important;

                            /*@editable*/line-height:125% !important;

                        }

                

                }   @media only screen and (max-width: 480px){

                    /*

                    @tab Mobile Styles

                    @section Heading 4

                    @tip Make the fourth-level headings larger in size for better readability on small screens.

                    */

                        h4{

                            /*@editable*/font-size:16px !important;

                            /*@editable*/line-height:150% !important;

                        }

                

                }   @media only screen and (max-width: 480px){

                    /*

                    @tab Mobile Styles

                    @section Boxed Text

                    @tip Make the boxed text larger in size for better readability on small screens. We recommend a font size of at least 16px.

                    */

                        .mcnBoxedTextContentContainer .mcnTextContent,.mcnBoxedTextContentContainer .mcnTextContent p{

                            /*@editable*/font-size:14px !important;

                            /*@editable*/line-height:150% !important;

                        }

                

                }   @media only screen and (max-width: 480px){

                    /*

                    @tab Mobile Styles

                    @section Preheader Visibility

                    @tip Set the visibility of the email's preheader on small screens. You can hide it to save space.

                    */

                        #templatePreheader{

                            /*@editable*/display:block !important;

                        }

                

                }   @media only screen and (max-width: 480px){

                    /*

                    @tab Mobile Styles

                    @section Preheader Text

                    @tip Make the preheader text larger in size for better readability on small screens.

                    */

                        #templatePreheader .mcnTextContent,#templatePreheader .mcnTextContent p{

                            /*@editable*/font-size:14px !important;

                            /*@editable*/line-height:150% !important;

                        }

                

                }   @media only screen and (max-width: 480px){

                    /*

                    @tab Mobile Styles

                    @section Header Text

                    @tip Make the header text larger in size for better readability on small screens.

                    */

                        #templateHeader .mcnTextContent,#templateHeader .mcnTextContent p{

                            /*@editable*/font-size:16px !important;

                            /*@editable*/line-height:150% !important;

                        }

                

                }   @media only screen and (max-width: 480px){

                    /*

                    @tab Mobile Styles

                    @section Body Text

                    @tip Make the body text larger in size for better readability on small screens. We recommend a font size of at least 16px.

                    */

                        #templateBody .mcnTextContent,#templateBody .mcnTextContent p{

                            /*@editable*/font-size:16px !important;

                            /*@editable*/line-height:150% !important;

                        }

                

                }   @media only screen and (max-width: 480px){

                    /*

                    @tab Mobile Styles

                    @section Footer Text

                    @tip Make the footer content text larger in size for better readability on small screens.

                    */

                        #templateFooter .mcnTextContent,#templateFooter .mcnTextContent p{

                            /*@editable*/font-size:14px !important;

                            /*@editable*/line-height:150% !important;

                        }

                

                }</style></head>

                    <body>

                        <!--*|IF:MC_PREVIEW_TEXT|*-->

                        <!--[if !gte mso 9]><!----><span class='mcnPreviewText' style='display:none; font-size:0px; line-height:0px; max-height:0px; max-width:0px; opacity:0; overflow:hidden; visibility:hidden; mso-hide:all;'></span><!--<![endif]-->

                        <!--*|END:IF|*-->

                        <center>

                        <div style='background-color:#0cb0e4'>

                            <table align='center' border='0' cellpadding='0' cellspacing='0' height='100%' width='100%' id='bodyTable'>

                                <tr>

                                    <td align='center' valign='top' id='bodyCell'>

                                        <!-- BEGIN TEMPLATE // -->

                                        <!--[if (gte mso 9)|(IE)]>

                                        <table align='center' border='0' cellspacing='0' cellpadding='0' width='600' style='width:600px;'>

                                        <tr>

                                        <td align='center' valign='top' width='600' style='width:600px;'>

                                        <![endif]-->

                                        <table border='0' cellpadding='0' cellspacing='0' width='100%' class='templateContainer'>

                                            <tr>

                                                <td valign='top' id='templatePreheader'><table border='0' cellpadding='0' cellspacing='0' width='100%' class='mcnTextBlock' style='min-width:100%;'>

                    <tbody class='mcnTextBlockOuter'>

                        <tr>

                            <td valign='top' class='mcnTextBlockInner' style='padding-top:9px;'>

                                  <!--[if mso]>

                                <table align='left' border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100%;'>

                                <tr>

                                <![endif]-->

                                

                                <!--[if mso]>

                                <td valign='top' width='600' style='width:600px;'>

                                <![endif]-->

                                <table align='left' border='0' cellpadding='0' cellspacing='0' style='max-width:100%; min-width:100%;' width='100%' class='mcnTextContentContainer'>

                                    <tbody><tr>

                                        

                                        <td valign='top' class='mcnTextContent' style='padding: 0px 18px 9px; text-align: center;'>

                                        

                                            

                                        </td>

                                    </tr>

                                </tbody></table>

                                <!--[if mso]>

                                </td>

                                <![endif]-->

                                

                                <!--[if mso]>

                                </tr>

                                </table>

                                <![endif]-->

                            </td>

                        </tr>

                    </tbody>

                </table></td>

                                            </tr>

                                            <tr>

                                                <td valign='top' id='templateHeader'><table border='0' cellpadding='0' cellspacing='0' width='100%' class='mcnImageBlock' style='min-width:100%;'>

                    <tbody class='mcnImageBlockOuter'>

                            <tr>

                                <td valign='top' style='padding:9px' class='mcnImageBlockInner'>

                                    <table align='left' width='100%' border='0' cellpadding='0' cellspacing='0' class='mcnImageContentContainer' style='min-width:100%;'>

                                        <tbody><tr>

                                            <td class='mcnImageContent' valign='top' style='padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0; text-align:center;'>

                                                

                                                    

                                                        <img align='center' alt='' src='https://gallery.mailchimp.com/3bab56873114fc26759c9c0c0/images/98d10b9e-4129-4adb-a30d-7a50c44057a5.png' width='192' style='max-width:192px; padding-bottom: 0; display: inline !important; vertical-align: bottom;' class='mcnImage' bgcolor='#0cb0e'>

                                                    

                                                

                                            </td>

                                        </tr>

                                    </tbody></table>

                                </td>

                            </tr>

                    </tbody>

                </table></td>

                                            </tr>

                                            <tr>

                                                <td valign='top' id='templateBody'><table border='0' cellpadding='0' cellspacing='0' width='100%' class='mcnDividerBlock' style='min-width:100%;'>

                    <tbody class='mcnDividerBlockOuter'>

                        <tr>

                            <td class='mcnDividerBlockInner' style='min-width: 100%; padding: 5px 18px;'>

                                <table class='mcnDividerContent' border='0' cellpadding='0' cellspacing='0' width='100%' style='min-width: 100%;border-top: 2px none #EAEAEA;'>

                                    <tbody><tr>

                                        <td>

                                            <span></span>

                                        </td>

                                    </tr>

                                </tbody></table>

                <!--            

                                <td class='mcnDividerBlockInner' style='padding: 18px;'>

                                <hr class='mcnDividerContent' style='border-bottom-color:none; border-left-color:none; border-right-color:none; border-bottom-width:0; border-left-width:0; border-right-width:0; margin-top:0; margin-right:0; margin-bottom:0; margin-left:0;' />

                -->

                            </td>

                        </tr>

                    </tbody>

                </table><table border='0' cellpadding='0' cellspacing='0' width='100%' class='mcnTextBlock' style='min-width:100%;'>

                    <tbody class='mcnTextBlockOuter'>

                        <tr>

                            <td valign='top' class='mcnTextBlockInner' style='padding-top:9px;'>

                                  <!--[if mso]>

                                <table align='left' border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100%;'>

                                <tr>

                                <![endif]-->

                                

                                <!--[if mso]>

                                <td valign='top' width='600' style='width:600px;'>

                                <![endif]-->

                                <table align='left' border='0' cellpadding='0' cellspacing='0' style='max-width:100%; min-width:100%;' width='100%' class='mcnTextContentContainer'>

                                    <tbody><tr>

                                        

                                        <td valign='top' class='mcnTextContent' style='padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;'>

                                        

                                            <h1 style='text-align: left;'><span style='font-size:18px'><span style='color:#eedd00'><img data-file-id='312083' height='24' src='https://gallery.mailchimp.com/3bab56873114fc26759c9c0c0/images/57e0743c-81e5-433e-a125-e495187db66b.png' style='border: 0px  ; width: 25px; height: 24px; margin: 0px;' width='25'>&nbsp; 




                                            Servicio Agendado:</span></span></h1>

                

                                        </td>

                                    </tr>

                                </tbody></table>

                                <!--[if mso]>

                                </td>

                                <![endif]-->

                                

                                <!--[if mso]>

                                </tr>

                                </table>

                                <![endif]-->

                            </td>

                        </tr>

                    </tbody>

                </table><table border='0' cellpadding='0' cellspacing='0' width='100%' class='mcnTextBlock' style='min-width:100%;'>

                    <tbody class='mcnTextBlockOuter'>

                        <tr>

                            <td valign='top' class='mcnTextBlockInner' style='padding-top:9px;'>

                                  <!--[if mso]>

                                <table align='left' border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100%;'>

                                <tr>

                                <![endif]-->

                                

                                <!--[if mso]>

                                <td valign='top' width='600' style='width:600px;'>

                                <![endif]-->

                                <table align='left' border='0' cellpadding='0' cellspacing='0' style='max-width:100%; min-width:100%;' width='100%' class='mcnTextContentContainer'>

                                    <tbody><tr>

                                        

                                        <td valign='top' class='mcnTextContent' style='padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;'>

                                        

                                            <div style='text-align: left;'><span style='color:#ffffff'>";
/* Recorrer los Servicios del Array */
$servicio_correo = $_SESSION['servicio_correo'];
foreach ($servicio_correo as $sc) {
    $bodyMail .= "<span style='color:white;'>" . $sc . "</span><br />";
}

$bodyMail .= "</span></div>

                

                                        </td>

                                    </tr>

                                </tbody></table>

                                <!--[if mso]>

                                </td>

                                <![endif]-->

                                

                                <!--[if mso]>

                                </tr>

                                </table>

                                <![endif]-->

                            </td>

                        </tr>

                    </tbody>

                </table></td>

                                            </tr>

                                            <tr>

                                                <td valign='top' id='templateFooter'><table border='0' cellpadding='0' cellspacing='0' width='100%' class='mcnDividerBlock' style='min-width:100%;'>

                    <tbody class='mcnDividerBlockOuter'>

                        <tr>

                            <td class='mcnDividerBlockInner' style='min-width: 100%; padding: 0px 18px;'>

                                <table class='mcnDividerContent' border='0' cellpadding='0' cellspacing='0' width='100%' style='min-width: 100%;border-top: 1px solid #EBEBEB;'>

                                    <tbody><tr>

                                        <td>

                                            <span></span>

                                        </td>

                                    </tr>

                                </tbody></table>

                <!--            

                                <td class='mcnDividerBlockInner' style='padding: 18px;'>

                                <hr class='mcnDividerContent' style='border-bottom-color:none; border-left-color:none; border-right-color:none; border-bottom-width:0; border-left-width:0; border-right-width:0; margin-top:0; margin-right:0; margin-bottom:0; margin-left:0;' />

                -->

                            </td>

                        </tr>

                    </tbody>

                </table><table border='0' cellpadding='0' cellspacing='0' width='100%' class='mcnTextBlock' style='min-width:100%;'>

                    <tbody class='mcnTextBlockOuter'>

                        <tr>

                            <td valign='top' class='mcnTextBlockInner' style='padding-top:9px;'>

                                  <!--[if mso]>

                                <table align='left' border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100%;'>

                                <tr>

                                <![endif]-->

                                

                                <!--[if mso]>

                                <td valign='top' width='600' style='width:600px;'>

                                <![endif]-->

                                <table align='left' border='0' cellpadding='0' cellspacing='0' style='max-width:100%; min-width:100%;' width='100%' class='mcnTextContentContainer'>

                                    <tbody><tr>

                                        

                                        <td valign='top' class='mcnTextContent' style='padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;'>

                                            <h1 style='text-align: left;'><span style='font-size:18px'><span style='color:#eedd00'><img data-file-id='312087' height='22' src='https://gallery.mailchimp.com/3bab56873114fc26759c9c0c0/images/6dbcc2ad-29cd-4ede-b18f-176603adbbce.png' style='border: 0px  ; width: 15px; height: 22px; margin: 0px;' width='15'>&nbsp; &nbsp;Dirección: </span></span></h1>

                                        </td>

                                    </tr>

                                </tbody></table>

                                <!--[if mso]>

                                </td>

                                <![endif]-->

                                

                                <!--[if mso]>

                                </tr>

                                </table>

                                <![endif]-->

                            </td>

                        </tr>

                    </tbody>

                </table><table border='0' cellpadding='0' cellspacing='0' width='100%' class='mcnTextBlock' style='min-width:100%;'>

                    <tbody class='mcnTextBlockOuter'>

                        <tr>

                            <td valign='top' class='mcnTextBlockInner' style='padding-top:9px;'>

                                  <!--[if mso]>

                                <table align='left' border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100%;'>

                                <tr>

                                <![endif]-->

                                

                                <!--[if mso]>

                                <td valign='top' width='600' style='width:600px;'>

                                <![endif]-->

                                <table align='left' border='0' cellpadding='0' cellspacing='0' style='max-width:100%; min-width:100%;' width='100%' class='mcnTextContentContainer'>

                                    <tbody><tr>

                                        

                                        <td valign='top' class='mcnTextContent' style='padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;'>

                                        

                                            <div style='text-align: left;'><font color='#ffffff'>" . $dataCliente['direccion'] . "</font></div>

                

                                        </td>

                                    </tr>

                                </tbody></table>

                                <!--[if mso]>

                                </td>

                                <![endif]-->

                                

                                <!--[if mso]>

                                </tr>

                                </table>

                                <![endif]-->

                            </td>

                        </tr>

                    </tbody>

                </table>

                <table border='0' cellpadding='0' cellspacing='0' width='100%' class='mcnTextBlock' style='min-width:100%;'>

                    <tbody class='mcnTextBlockOuter'>

                        <tr>

                            <td valign='top' class='mcnTextBlockInner' style='padding-top:9px;'>

                                  <!--[if mso]>

                                <table align='left' border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100%;'>

                                <tr>

                                <![endif]-->

                                

                                <!--[if mso]>

                                <td valign='top' width='600' style='width:600px;'>

                                <![endif]-->

                                <table align='left' border='0' cellpadding='0' cellspacing='0' style='max-width:100%; min-width:100%;' width='100%' class='mcnTextContentContainer'>

                                    <tbody><tr>

                                        

                                        <td valign='top' class='mcnTextContent' style='padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;'>

                                            <h1 style='text-align: left;'><span style='font-size:18px'><span style='color:#eedd00'><img data-file-id='312087' height='22' src='https://gallery.mailchimp.com/3bab56873114fc26759c9c0c0/images/65a46553-be6f-423a-9c86-f92bbe3c8da9.png' style='border: 0px  ; width: 23px; height: 19px; margin: 0px;' width='23'>&nbsp; &nbsp;Modelo/Marca: </span></span></h1>

                                        </td>

                                    </tr>

                                </tbody></table>

                                <!--[if mso]>

                                </td>

                                <![endif]-->

                                

                                <!--[if mso]>

                                </tr>

                                </table>

                                <![endif]-->

                            </td>

                        </tr>

                    </tbody>

                </table><table border='0' cellpadding='0' cellspacing='0' width='100%' class='mcnTextBlock' style='min-width:100%;'>

                    <tbody class='mcnTextBlockOuter'>

                        <tr>

                            <td valign='top' class='mcnTextBlockInner' style='padding-top:9px;'>

                                  <!--[if mso]>

                                <table align='left' border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100%;'>

                                <tr>

                                <![endif]-->

                                

                                <!--[if mso]>

                                <td valign='top' width='600' style='width:600px;'>

                                <![endif]-->

                                <table align='left' border='0' cellpadding='0' cellspacing='0' style='max-width:100%; min-width:100%;' width='100%' class='mcnTextContentContainer'>

                                    <tbody><tr>

                                        

                                        <td valign='top' class='mcnTextContent' style='padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;'>

                                        

                                            <div style='text-align: left;'><font color='#ffffff'>";
/* Recorrer los Servicios del Array */
$info_auto_array = $_SESSION['info_auto'];
foreach ($info_auto_array as $auto) {
    $bodyMail .= "<span style='color:white;'>" . $auto . "</span>";
}


$bodyMail .= "</font></div>

                

                                        </td>

                                    </tr>

                                </tbody></table>

                                <!--[if mso]>

                                </td>

                                <![endif]-->

                                

                                <!--[if mso]>

                                </tr>

                                </table>

                                <![endif]-->

                            </td>

                        </tr>

                    </tbody>

                </table>

                <table border='0' cellpadding='0' cellspacing='0' width='100%' class='mcnDividerBlock' style='min-width:100%;'>

                    <tbody class='mcnDividerBlockOuter'>

                        <tr>

                            <td class='mcnDividerBlockInner' style='min-width: 100%; padding: 0px 18px;'>

                                <table class='mcnDividerContent' border='0' cellpadding='0' cellspacing='0' width='100%' style='min-width: 100%;border-top: 1px solid #EBEBEB;'>

                                    <tbody><tr>

                                        <td>

                                            <span></span>

                                        </td>

                                    </tr>

                                </tbody></table>

                <!--            

                                <td class='mcnDividerBlockInner' style='padding: 18px;'>

                                <hr class='mcnDividerContent' style='border-bottom-color:none; border-left-color:none; border-right-color:none; border-bottom-width:0; border-left-width:0; border-right-width:0; margin-top:0; margin-right:0; margin-bottom:0; margin-left:0;' />

                -->

                            </td>

                        </tr>

                    </tbody>

                </table><table border='0' cellpadding='0' cellspacing='0' width='100%' class='mcnTextBlock' style='min-width:100%;'>

                    <tbody class='mcnTextBlockOuter'>

                        <tr>

                            <td valign='top' class='mcnTextBlockInner' style='padding-top:9px;'>

                                  <!--[if mso]>

                                <table align='left' border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100%;'>

                                <tr>

                                <![endif]-->

                                

                                <!--[if mso]>

                                <td valign='top' width='600' style='width:600px;'>

                                <![endif]-->

                                <table align='left' border='0' cellpadding='0' cellspacing='0' style='max-width:100%; min-width:100%;' width='100%' class='mcnTextContentContainer'>

                                    <tbody><tr>

                                        

                                  

                                    </tr>

                                </tbody></table>

                                <!--[if mso]>

                                

                                <![endif]-->

                                

                                <!--[if mso]>

                                </tr>

                                </table>

                                <![endif]-->

                            

                        </tr>

                    </tbody>

                </table><table border='0' cellpadding='0' cellspacing='0' width='100%' class='mcnTextBlock' style='min-width:100%;'>

                    <tbody class='mcnTextBlockOuter'>

                        <tr>

                            <td valign='top' class='mcnTextBlockInner' style='padding-top:9px;'>

                                  <!--[if mso]>

                                <table align='left' border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100%;'>

                                <tr>

                                <![endif]-->

                                

                                <!--[if mso]>

                                <td valign='top' width='600' style='width:600px;'>

                                <![endif]-->

                                <table align='left' border='0' cellpadding='0' cellspacing='0' style='max-width:100%; min-width:100%;' width='100%' class='mcnTextContentContainer'>

                                    <tbody><tr>

                                        

                                      

                                   

                                </tbody></table>

                                <!--[if mso]>

                                

                                <![endif]-->

                                

                                <!--[if mso]>

                                </tr>

                                </table>

                                <![endif]-->

                            

                        </tr>

                    </tbody>

                </table><table border='0' cellpadding='0' cellspacing='0' width='100%' class='mcnTextBlock' style='min-width:100%;'>

                    <tbody class='mcnTextBlockOuter'>

                        <tr>

                            <td valign='top' class='mcnTextBlockInner' style='padding-top:9px;'>

                                  <!--[if mso]>

                                <table align='left' border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100%;'>

                                <tr>

                                <![endif]-->

                                

                                <!--[if mso]>

                                <td valign='top' width='600' style='width:600px;'>

                                <![endif]-->

                                <table align='left' border='0' cellpadding='0' cellspacing='0' style='max-width:100%; min-width:100%;' width='100%' class='mcnTextContentContainer'>

                                    <tbody><tr>

                                        

                                        <td valign='top' class='mcnTextContent' style='padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;'>

                                        

                                            

                

                                        </td>

                                    </tr>

                                </tbody></table>

                                <!--[if mso]>

                                </td>

                                <![endif]-->

                                

                                <!--[if mso]>

                                </tr>

                                </table>

                                <![endif]-->

                            </td>

                        </tr>

                    </tbody>

                </table><table border='0' cellpadding='0' cellspacing='0' width='100%' class='mcnTextBlock' style='min-width:100%;'>

                    <tbody class='mcnTextBlockOuter'>

                        <tr>

                            <td valign='top' class='mcnTextBlockInner' style='padding-top:9px;'>

                                  <!--[if mso]>

                                <table align='left' border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100%;'>

                                <tr>

                                <![endif]-->

                                

                                <!--[if mso]>

                                <td valign='top' width='600' style='width:600px;'>

                                <![endif]-->

                                <table align='left' border='0' cellpadding='0' cellspacing='0' style='max-width:100%; min-width:100%;' width='100%' class='mcnTextContentContainer'>

                                    <tbody><tr>

                                        

                                        <td valign='top' class='mcnTextContent' style='padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;'>

                                        

                                            

                

                                        </td>

                                    </tr>

                                </tbody></table>

                                <!--[if mso]>

                                </td>

                                <![endif]-->

                                

                                <!--[if mso]>

                                </tr>

                                </table>

                                <![endif]-->

                            </td>

                        </tr>

                    </tbody>

                </table>";



//                 foreach($servicios as $key => $value){

//                     $rows = $this->servicioata->sp_app_cliente_servicio_obtener_costos_por_servicio($idServicio->id)->dato;



//                 foreach ($rows as $key => $rowValue) {

//                     $bodyMail.="<table border='0' cellpadding='0' cellspacing='0' width='100%' class='mcnTextBlock' style='min-width:100%;'>

//                     <tbody class='mcnTextBlockOuter'>

//                         <tr>

//                             <td valign='top' class='mcnTextBlockInner' style='padding-top:9px;'>

//                                   <!--[if mso]>

//                                 <table align='left' border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100%;'>

//                                 <tr>

//                                 <![endif]-->



//                                 <!--[if mso]>

//                                 <td valign='top' width='600' style='width:600px;'>

//                                 <![endif]-->

//                                 <table align='left' border='0' cellpadding='0' cellspacing='0' style='max-width:100%; min-width:100%;' width='100%' class='mcnTextContentContainer'>

//                                     <tbody><tr>



//                                         <td valign='top' class='mcnTextContent' style='padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;'>



//                                             <h1 style='text-align: left;'><span style='font-size:18px'><span style='color:#eedd00'><img data-file-id='312095' height='22' src='https://gallery.mailchimp.com/3bab56873114fc26759c9c0c0/images/697ddae3-6273-4265-a88e-67a9e4a25e1e.png' style='border: 0px  ; width: 22px; height: 22px; margin: 0px;' width='22'>&nbsp; Servicio:</span></span></h1>



//                                         </td>

//                                     </tr>

//                                 </tbody></table>

//                                 <!--[if mso]>

//                                 </td>

//                                 <![endif]-->



//                                 <!--[if mso]>

//                                 </tr>

//                                 </table>

//                                 <![endif]-->

//                             </td>

//                         </tr>

//                     </tbody>

//                 </table><table border='0' cellpadding='0' cellspacing='0' width='100%' class='mcnTextBlock' style='min-width:100%;'>

//                 <tbody class='mcnTextBlockOuter'>

//                     <tr>

//                         <td valign='top' class='mcnTextBlockInner' style='padding-top:9px;'>

//                               <!--[if mso]>

//                             <table align='left' border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100%;'>

//                             <tr>

//                             <![endif]-->



//                             <!--[if mso]>

//                             <td valign='top' width='600' style='width:600px;'>

//                             <![endif]-->

//                             <table align='left' border='0' cellpadding='0' cellspacing='0' style='max-width:100%; min-width:100%;' width='100%' class='mcnTextContentContainer'>

//                                 <tbody><tr>



//                                     <td valign='top' class='mcnTextContent' style='padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;'>

//                                     ";

//                     $bodyMail .="<div style='text-align: left;'><font color='#ffffff'>".$rowValue->producto."</font></div>";



//                     $bodyMail .= "  </td>

//                     </tr>

//                 </tbody></table>

//                 <!--[if mso]>

//                 </td>

//                 <![endif]-->



//                 <!--[if mso]>

//                 </tr>

//                 </table>

//                 <![endif]-->

//             </td>

//         </tr>

//     </tbody>

// </table><table border='0' cellpadding='0' cellspacing='0' width='100%' class='mcnDividerBlock' style='min-width:100%;'>

// <tbody class='mcnDividerBlockOuter'>

//     <tr>

//         <td class='mcnDividerBlockInner' style='min-width: 100%; padding: 0px 18px;'>

//             <table class='mcnDividerContent' border='0' cellpadding='0' cellspacing='0' width='100%' style='min-width: 100%;border-top: 1px solid #EBEBEB;'>

//                 <tbody><tr>

//                     <td>

//                         <span></span>

//                     </td>

//                 </tr>

//             </tbody></table>

// <!--            

//             <td class='mcnDividerBlockInner' style='padding: 18px;'>

//             <hr class='mcnDividerContent' style='border-bottom-color:none; border-left-color:none; border-right-color:none; border-bottom-width:0; border-left-width:0; border-right-width:0; margin-top:0; margin-right:0; margin-bottom:0; margin-left:0;' />

// -->

//         </td>

//     </tr>

// </tbody>

// </table><table border='0' cellpadding='0' cellspacing='0' width='100%' class='mcnTextBlock' style='min-width:100%;'>

// <tbody class='mcnTextBlockOuter'>

//     <tr>

//         <td valign='top' class='mcnTextBlockInner' style='padding-top:9px;'>

//               <!--[if mso]>

//             <table align='left' border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100%;'>

//             <tr>

//             <![endif]-->



//             <!--[if mso]>

//             <td valign='top' width='600' style='width:600px;'>

//             <![endif]-->

//             <table align='left' border='0' cellpadding='0' cellspacing='0' style='max-width:100%; min-width:100%;' width='100%' class='mcnTextContentContainer'>

//                 <tbody><tr>



//                     <td valign='top' class='mcnTextContent' style='padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;'>



//                         <h1 style='text-align: left;'><span style='font-size:18px'><span style='color:#eedd00'><img data-file-id='312107' height='19' src='https://gallery.mailchimp.com/3bab56873114fc26759c9c0c0/images/65a46553-be6f-423a-9c86-f92bbe3c8da9.png' style='border: 0px  ; width: 23px; height: 19px; margin: 0px;' width='23'>&nbsp; Auto / Patente / Modelo:</span></span></h1>



//                     </td>

//                 </tr>

//             </tbody></table>

//             <!--[if mso]>

//             </td>

//             <![endif]-->



//             <!--[if mso]>

//             </tr>

//             </table>

//             <![endif]-->

//         </td>

//     </tr>

// </tbody>

// </table><table border='0' cellpadding='0' cellspacing='0' width='100%' class='mcnTextBlock' style='min-width:100%;'>

// <tbody class='mcnTextBlockOuter'>

//     <tr>

//         <td valign='top' class='mcnTextBlockInner' style='padding-top:9px;'>

//               <!--[if mso]>

//             <table align='left' border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100%;'>

//             <tr>

//             <![endif]-->



//             <!--[if mso]>

//             <td valign='top' width='600' style='width:600px;'>

//             <![endif]-->

//             <table align='left' border='0' cellpadding='0' cellspacing='0' style='max-width:100%; min-width:100%;' width='100%' class='mcnTextContentContainer'>

//                 <tbody><tr>



//                     <td valign='top' class='mcnTextContent' style='padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;'>

//         ";



//         $bodyMail .= " <div style='text-align: left;'><font color='#ffffff'>".$rowValue->marca_nombre."-".$rowValue->modelo_nombre."-".$rowValue->placa."</font></div>";                                       

//         $bodyMail .= "</td>

//             </tr>

//         </tbody></table>

//         <!--[if mso]>

//         </td>

//         <![endif]-->



//         <!--[if mso]>

//         </tr>

//         </table>

//         <![endif]-->

//     </td>

// </tr>

// </tbody>

// </table>";

//                 }

//             }







$bodyMail .= "

                <!--            

                                <td class='mcnDividerBlockInner' style='padding: 18px;'>

                                <hr class='mcnDividerContent' style='border-bottom-color:none; border-left-color:none; border-right-color:none; border-bottom-width:0; border-left-width:0; border-right-width:0; margin-top:0; margin-right:0; margin-bottom:0; margin-left:0;' />

                -->

                            </td>

                        </tr>

                    </tbody>

                </table><table border='0' cellpadding='0' cellspacing='0' width='100%' class='mcnTextBlock' style='min-width:100%;'>

                    <tbody class='mcnTextBlockOuter'>

                        <tr>

                            <td valign='top' class='mcnTextBlockInner' style='padding-top:9px;'>

                                  <!--[if mso]>

                                <table align='left' border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100%;'>

                                <tr>

                                <![endif]-->

                                

                                <!--[if mso]>

                                <td valign='top' width='600' style='width:600px;'>

                                <![endif]-->

                                <table align='left' border='0' cellpadding='0' cellspacing='0' style='max-width:100%; min-width:100%;' width='100%' class='mcnTextContentContainer'>

                                    <tbody><tr>

                                        

                                        <td valign='top' class='mcnTextContent' style='padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;'>

                                        

                                            <h1 style='text-align: right;'><span style='color:#FFFFFF'><span style='font-size:18px'>TOTAL</span></span></h1>

                

                                        </td>

                                    </tr>

                                </tbody></table>

                                <!--[if mso]>

                                </td>

                                <![endif]-->

                                

                                <!--[if mso]>

                                </tr>

                                </table>

                                <![endif]-->

                            </td>

                        </tr>

                    </tbody>

                </table><table border='0' cellpadding='0' cellspacing='0' width='100%' class='mcnTextBlock' style='min-width:100%;'>

                    <tbody class='mcnTextBlockOuter'>

                        <tr>

                            <td valign='top' class='mcnTextBlockInner' style='padding-top:9px;'>

                                  <!--[if mso]>

                                <table align='left' border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100%;'>

                                <tr>

                                <![endif]-->

                                

                                <!--[if mso]>

                                <td valign='top' width='600' style='width:600px;'>

                                <![endif]-->

                                <table align='left' border='0' cellpadding='0' cellspacing='0' style='max-width:100%; min-width:100%;' width='100%' class='mcnTextContentContainer'>

                                    <tbody><tr>

                                        

                                        <td valign='top' class='mcnTextContent' style='padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;'>

                                        

                                            <h1 style='text-align: right;'><font color='#eedd00'><span style='font-size:18px'>$" . $dataCliente['monto_pagado'] . "</span></font></h1>

                

                                        </td>

                                    </tr>

                                </tbody></table>

                                <!--[if mso]>

                                </td>

                                <![endif]-->

                                

                                <!--[if mso]>

                                </tr>

                                </table>

                                <![endif]-->

                            </td>

                        </tr>

                    </tbody>

                </table><table border='0' cellpadding='0' cellspacing='0' width='100%' class='mcnDividerBlock' style='min-width:100%;'>

                    <tbody class='mcnDividerBlockOuter'>

                        <tr>

                            <td class='mcnDividerBlockInner' style='min-width: 100%; padding: 10px 18px 25px;'>

                                <table class='mcnDividerContent' border='0' cellpadding='0' cellspacing='0' width='100%' style='min-width: 100%;border-top: 2px none #EEEEEE;'>

                                    <tbody><tr>

                                        <td>

                                            <span></span>

                                        </td>

                                    </tr>

                                </tbody></table>

                <!--            

                                <td class='mcnDividerBlockInner' style='padding: 18px;'>

                                <hr class='mcnDividerContent' style='border-bottom-color:none; border-left-color:none; border-right-color:none; border-bottom-width:0; border-left-width:0; border-right-width:0; margin-top:0; margin-right:0; margin-bottom:0; margin-left:0;' />

                -->

                            </td>

                        </tr>

                    </tbody>

                </table><table border='0' cellpadding='0' cellspacing='0' width='100%' class='mcnTextBlock' style='min-width:100%;'>

                    <tbody class='mcnTextBlockOuter'>

                        <tr>

                            <td valign='top' class='mcnTextBlockInner' style='padding-top:9px;'>

                                  <!--[if mso]>

                                <table align='left' border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100%;'>

                                <tr>

                                <![endif]-->

                                

                                <!--[if mso]>

                                <td valign='top' width='600' style='width:600px;'>

                                <![endif]-->

                                <table align='left' border='0' cellpadding='0' cellspacing='0' style='max-width:100%; min-width:100%;' width='100%' class='mcnTextContentContainer'>

                                    <tbody><tr>

                                        

                                        <td valign='top' class='mcnTextContent' style='padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;'>

                                        

                                            

                                        </td>

                                    </tr>

                                </tbody></table>

                                <!--[if mso]>

                                </td>

                                <![endif]-->

                                

                                <!--[if mso]>

                                </tr>

                                </table>

                                <![endif]-->

                            </td>

                        </tr>

                    </tbody>

                </table></td>

                                            </tr>

                                        </table>

                                        <!--[if (gte mso 9)|(IE)]>

                                        </td>

                                        </tr>

                                        </table>

                                        <![endif]-->

                                        <!-- // END TEMPLATE -->

                                    </td>

                                </tr>

                            </table>

                            </div>

                        </center>

                    </body>

                </html>

                ";








$mail->Body = $bodyMail;

// $this->response->mensaje = "Servicio registrado correctamente";

if ($mail->send()) {
    /* Se envió el correo */
    echo "";
} else {
    /* No se envió el correo */
    echo  "" . $mail->ErrorInfo;
}
?>
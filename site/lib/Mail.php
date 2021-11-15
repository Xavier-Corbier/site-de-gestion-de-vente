<?php
class Mail {
    // Possibilité de créer différents mail en fonction des besoin => Polue moins le code
    public static function inscription($login,$nonce,$email) {
        $mail='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                    <html xmlns="http://www.w3.org/1999/xhtml">
                        <head>
                            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                        </head>
                        <body yahoo bgcolor="#f6f8f1">
                            <table width="100%" bgcolor="#f6f8f1" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td>
                                        <table class="content" align="center" cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td>
                                                    Salut! Rejoins L\'épicerie !
                                                    http://webinfo.iutmontp.univ-montp2.fr/~corbierx/Projet_S3/site/?action=validate&controller=Utilisateur&login='.rawurlencode($login).'&nonce='.rawurlencode($nonce).'
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </body>
                    </html>';
        mail($email, 'Inscription', $mail);
    }
}
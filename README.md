# app.innotv.qrcode
La webapp consente la generazione e la gestione dei qrcode.

## Istruzioni per l'installazione
L'app usa una infrastruttura LAMP con PHP 7.1.
Si compone di due parti, il backend di gestione e un frontend che raccoglie i click effettuati sui qrcode e ne genera il reinoltro.
L'app usa la libreria Google Charts per generare i qrcode https://developers.google.com/chart/infographics/docs/qr_codes 
Creare il database secondo il file sql.
Per la directory di gestione è consigliable proteggerla ad esempio scrivendo nel file httpd.conf di apache quanto segue:
```
        AuthType Basic
        AuthName "Accesso ad area riservata"
        AuthUserFile xxx/.htpasswd
        Require valid-user admin
```
Per la directory di redirezione Configurare il file httpd.conf mettendo nell'apposito virtualhost i comandi seguenti:
```
    RewriteEngine On
    RewriteRule ^(.*)$ /qrcode.php?id=$1 [L,QSA]
```

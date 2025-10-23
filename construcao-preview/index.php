<?php
   $base_url = 'http://localhost:8080/construcao-preview/'
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

    <!-- meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- favicon -->
    <link rel="icon" href="<?= $base_url; ?>img/favicon.png">

    <!-- css -->
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        div{
            height: 100vh;
        }

        #desktop{
           width: 100%;
           height: 100%;
           object-fit: cover;
           object-position: center;
           display: block;
        }
        #mobile{
           width: 100%;
           height: 100%;
           object-fit: cover;
           object-position: center;
           display: none;
        }

        @media(max-width:992px){
            #desktop{
                display: none;
            }
            #mobile{
                display: block;
            }
        }
    </style>

    <title>Freeladev Sites | Em construção</title>
</head>
<body>
    <div>
        <img id="desktop" src="<?= $base_url; ?>img/banner-construcao-desktop.png">
        <img id="mobile" src="<?= $base_url; ?>img/banner-construcao-mobile.png">
    </div>
</body>
</html>
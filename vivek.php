<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .bottom-android-div {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 55px;
            box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
            background-color: #fff;
            display: flex;
        }

        .bottom-android-link {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            flex-grow: 1;
            min-width: 50px;
            white-space: nowrap;
            font-family: 'Times New Roman', Times, serif;
            font-size: 14px;
            color: #444444;
            text-decoration: none;
            -webkit-top-highlight-color: transparent;
            transition: background-color 0.1s ease-in-out;
        }

        .bottom-android-link:hover {
            color: #009578;
        }

        .bottom-android-icon {
            font-size: 20px;
        }

        /* @media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
  <!-- col-lg-6 col-md-3 col-sm-10 d-none d-sm-block d-lg-none -->
        } */
    </style>
</head>
<body>
   
    <div class="container-fluid mx-auto">
        <div class="row">
            <div class="col-lg-6 col-md-12 d-lg-none">
                <div class="bottom-android-div">
                    <a href="" class="bottom-android-link">
                        <i class="fa fa-tachometer" aria-hidden="true"></i>
                        <i class="fa fa-dashboard" aria-hidden="true">Dashboard</i>
                        <span class="bottom-android-text">Dashboard</span>
                    </a>
                    <a href="" class="bottom-android-link">
                        <i class="fa fa-user" aria-hidden="true">Profile</i>
                        <span class="bottom-android-text">Profile</span>
                    </a>
                    <a href="" class="bottom-android-link">
                        <i class="fa fa-laptop" aria-hidden="true">Devices</i>
                        <span class="bottom-android-text">Devices</span>
                    </a>
                    <a href="" class="bottom-android-link">
                        <i class="fa fa-bookmark" aria-hidden="true">Bookmark</i>
                        <span class="bottom-android-text">Bookmark</span>
                    </a>
                    <a href="" class="bottom-android-link">
                        <i class="fa fa-cog" aria-hidden="true">Settings</i>
                        <span class="nav-text">Settings</span>
                    </a>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
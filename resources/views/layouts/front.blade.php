<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Master Guide Tools is a comprehensive platform that offers a wide range of tools and resources to help you achieve your goals. Our platform provides a variety of tools and resources that cater to different needs and interests, including productivity tools, personal development tools, and more. With Master Guide Tools, you can access a wealth of information and resources that can help you improve your Master Guide skills and achieve your goals. Whether you're looking to improve your spiritual productivity, enhance your spiritual development, or explore new hobbies and interests, Master Guide Tools has something for everyone. Join us today and start unlocking your potential with our powerful tools and resources." />
    <meta name="author" content="APEK TECHNOLOGIES" />
    <meta name="copyright" content="APEK TECHNOLOGIES" />
    <meta name="language" content="English" />
    <meta name="distribution" content="Global" />
    <meta name="rating" content="General" />
    <meta name="revisit-after" content="7 days" />
    <meta name="keywords" content="Master Guide Tools, spiritual productivity, spiritual development, tools, resources, platform, spiritual growth, spiritual journey, spiritual tools, spiritual resources, spiritual development tools, spiritual growth resources, spiritual journey tools, spiritual journey resources, spiritual growth platform, spiritual journey platform, spiritual growth tools, spiritual journey tools, spiritual growth resources, spiritual journey resources, spiritual growth platform, spiritual journey platform" />
    <title>Master Guide Tools – App Overview</title>
    <link rel="shortcut icon" href="/storage/images/Logo.png" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="/storage/css/style2.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <style>
        .success {
            outline: 2px solid green;
        }

        .error {
            outline: 2px solid red;
        }
    </style>
    <script>
        $(document).ready(function() {
            // Define regular expression
            var regex = /^\d*[.]?\d*$/;

            $("#phone").on("input", function() {
                // Get input value
                var inputVal = $(this).val();
                // Test input value against regular expression
                if (regex.test(inputVal)) {
                    $(this).removeClass("error").addClass("success");
                    document.getElementById('errorPhone').style.display = 'none';
                } else {
                    $(this).removeClass("success").addClass("error");
                    document.getElementById('errorPhone').style.display = '';
                }
            });
        });
    </script>
</head>

<body>
    <nav>
        <div class="nav-container">
            <a href="/" class="nav-logo">Master Guide Tools</a>
            <ul class="nav-menu">
                <li><a href="/">Home</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="/features">Features</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
            <div class="nav-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>
    @yield('content')

    <script>
        const navToggle = document.querySelector('.nav-toggle');
        const navMenu = document.querySelector('.nav-menu');

        navToggle.addEventListener('click', () => {
            navMenu.classList.toggle('active');
        });
    </script>
</body>

</html>
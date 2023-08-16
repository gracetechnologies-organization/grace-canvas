<nav class="navbar navbar-expand-lg navbar-light " id="navbarManu">
    <div class="container">
        <a class="navbar-brand text-light" href="#">{{ config('app.name') }}</a>
        <button class="navbar-toggler text-light" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbar-supported-content" aria-controls="navbar-supported-content" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon text-light"></span>
        </button>
        <div class="collapse navbar-collapse text-light" id="navbar-supported-content">
            <ul class="navbar-nav ms-auto ">
                <li class="nav-item ">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Templates</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">More Services</a>
                </li>
                <li class="nav-item sign-up">
                    <a class="nav-link" href="#">Sign up</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

    body {
        box-sizing: border-box;
        font-family: 'Poppins';
        font-size: 20px;
    }

    .navbar-brand {
        padding: 15px 0px 15px 0px;
    }

    #navbarManu {
        background-color: #FF6600;

    }

    #navbar-supported-content {
        margin-right: 4rem;
    }

    .nav-link {
        color: #f5ceb4;
        font-style: normal;
        font-size: 20px;
    }

    .sign-up a {
        margin-top: 10px;
        /* border: 1px solid; */
        margin-left: 3rem;
        max-width: 7rem;
        min-width: 4rem;
        background-color: aliceblue;
        padding: 0PX 10PX 0PX 15PX;
        border-radius: 5px;
        color: black;
    }

</style>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content"  id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"> <span>Welcome : <?= $userName; ?></span></a>
                    </li>
                    
                    
                </ul>
                <!-- <a href="home" class="btn btn-outline-info mr-3">SignUp</a> -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#subjects-modal">
                    Add Subject
                </button>

                <a href="<?= BASE_URL?>admin/logout" class="btn btn-outline-danger ml-5">Logout</a>
            </div>
        </div>
    </nav>
</header>
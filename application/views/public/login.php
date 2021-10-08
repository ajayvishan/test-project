<?php include $head; ?>
<?php include $header; ?>


<div class="container">
    <div class="row">
        <div class="col-md-5 offset-md-4 p-5">
            <h3>Login</h3>
            <form action="<?= BASE_URL; ?>webservice/login/login" method="POST" class="form-submit">

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email">

                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <button type="submit" class="btn btn-info float-end">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php include $scripts; ?>
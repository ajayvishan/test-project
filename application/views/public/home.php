<?php include $head; ?>
<?php include $header; ?>


<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 p-5">
            <form action="<?= BASE_URL; ?>webservice/signup/create" method="POST" class="form-submit">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email">

                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="mb-3 form-radio">
                    <span>Gender</span>
                    <input type="radio" name="gender" value="Male" class="form-check-input" id="male">
                    <label class="form-check-label" for="male">Male</label>
                    <input type="radio" name="gender" value="Female" class="form-check-input" id="female">
                    <label class="form-check-label" for="female">Female</label>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" id="address">

                </div>
                <button type="submit" class="btn btn-info float-end">Submit</button>
            </form>
        </div>
    </div>

    <!-- <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-striped table-hover" id="allProducts">
                <thead>
                    <tr>
                        <th>Sr.</th>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Product Type</th>
                        <th>Product Quantity</th>
                        <th>Price</th>
                        <th>Views Detail</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   
                </tbody>
            </table>
        </div>
    </div> -->
</div>

<?php include $scripts; ?>
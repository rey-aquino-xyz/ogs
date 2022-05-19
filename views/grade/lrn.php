<style>
     .form-lrn {
        max-width: 400px;
        padding: 15px;
    }

    .form-lrn .form-floating:focus-within {
        z-index: 2;
    }
</style>
<br><br>
<div class="form-lrn m-auto ">
    <div class="card shadow-sm rounded-4">
        <div class="card-body text-center">
            <h6 class="card-title mb-3">Welcome to AMECI <br>Please enter your LRN</h6>
            <form action="" method="post">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="LRN">
                    <label for="floatingInput">LRN</label>
                </div>
                <div class="form-floating mb-3" style="display: none;">
                    <input type="password" class="form-control" id="floatingInput" placeholder="Password">
                    <label for="floatingInput">Password</label>
                </div>
                <a href="#" class="btn btn-primary float-end">Submit</a>
            </form>
        </div>
    </div>
</div>
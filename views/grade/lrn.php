<style>
    .form-lrn {
        max-width: 400px;
        padding: 15px;
    }

    .form-lrn .form-floating:focus-within {
        z-index: 2;
    }
</style>
<script src="../../js/lrn.js"></script>
<br><br><br>
<div class="form-lrn m-auto ">
    <div class="card shadow-sm rounded-4">
        <div class="card-body text-center">
            <a href="/ogs/">
                <img class="mb-3" src="../../assets/school_logo.jpg" alt="" width="75" height="75">
            </a>
            <h6 class="card-title mb-4">Welcome to AMECI <br>Please enter your LRN</h6>
            <form method="post" name="lrn-form">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="lrn" name="lrn" placeholder="LRN" required>
                    <label for="lrn">LRN</label>
                </div>
                <div id="lrnlock" class="form-floating mb-3" style="display: none;">
                    <input type="password" class="form-control" id="lrnpwd" name="lrnpwd"
                        placeholder="Password">
                    <label for="lrnpwd">Password</label>
                </div>
                <button class="btn btn-primary float-end" name="lrn-submit" type="submit">Submit</button>
            </form>
            <p class="text-danger" id="lrn-msg"></p>
        </div>
    </div>
</div>
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-8 col-lg-8">
            <h2 class="text-center">Sort Algorithm</h2>
            <div class="card shadow-lg p-3 mb-5 bg-body rounded">
                <div class="card-body">
                    <form method="post" action="">
                        <div class="form-group mb-2">
                            <label for="sort" class="mb-2"><b>Enter data :</b></label>
                            <input type="text" class="form-control" id="sort" name="sort" placeholder="example 6f5e4d3c2b1a" autocomplete="off">
                            <span class="text-danger"><?php echo $error ?? ''; ?></span>
                        </div>
                        <div class="form-group mb-2">
                            <label for="algorithm" class="mb-2"><b>Select Algorithm :</b></label>
                            <select name="algorithm" id="algorithm" class="form-control">
                                <option value="bubble" selected>Bubble Sort</option>
                                <option value="quick">Quick Sort</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success mt-2">Submit</button>
                    </form>
                    <br/>
                    <label for="input" class="mb-2"><b>Input :</b> <?php echo $input ?? ''; ?></label>
                    <br>
                    <label for="output"><b>Output :</b> <?php echo $output ?? ''; ?></label>
                </div>
            </div>
        </div>
    </div>
</div>

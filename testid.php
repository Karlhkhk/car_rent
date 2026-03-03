 <!-- /kaart -->
           <?php } ?>
<!-- <?php
//päring 
// $paring = 'SELECT * FROM cars LIMIT 10'; 
// $valjund = mysqli_query($yhendus, $paring);
// while($rida = mysqli_fetch_row($valjund)){ 
// }
?>
    Kaardid -->
    <!-- <div class="container my-5">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php
            // while ($rida = mysqli_fetch_row($valjund))
            ?>
            <div class="col">
                <div class="card h-100 border-0 shadow-sm rounded-3">
                    <img src="https://loremflickr/id/600/350/500" class="card-img-top rounded-top-3" alt="Auto pilt">
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col"><h5 class="card-title"><?php echo $rida[1]; ?></h5></div>
                            <div class="col text-end"><i class="bi bi-heart text-muted"></i></div>
                        </div>
                        <p class="col"><h5 class="card-title text-muted fs-6"><?php echo $rida[2]; ?></h5></p>

                        <div class="small">
                            <p class="mb-1 text-secondary"><?php echo $rida[3]; ?></p>
                            <p class="mb-1 text-secondary"><?php echo $rida[4]; ?></p>
                            <p class="fw-bold mt-2 mb-0"><?php echo $rida[5]; ?></p>
                        </div>

                        <a href="#" class="btn btn-dark w-100 mt-3 py-2">Rendi</a>
                    </div>
                </div>
            </div>
                    </div>
                </div>
            </div>

        </div>
    </div> -->
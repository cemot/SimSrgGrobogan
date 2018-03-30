<div class="row">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="green">
                    <i class="material-icons">assignment</i>
                </div>
                <div class="card-content">
                    <p class="category">Gudang</p>
                    <h3 class="card-title"><?php echo $gudang; ?></h3>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="blue">
                    <i class="material-icons">assignment</i>
                </div>
                <div class="card-content">
                    <p class="category">Pengujian</p>
                    <h3 class="card-title"><?php echo $pengujian; ?></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="blue">
                    <i class="material-icons">timeline</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Coloured Bars Chart
                        <small> - Rounded</small>
                    </h4>
                </div>
                <div id="colouredBarsChart" class="ct-chart"></div>
            </div>
        </div>
    </div>
</div>
<div class="p-4 my-container">
    <div class="mt-5"></div>
    <div class="container">
        <div class="row">
            <div class="col msjs">
                <?php
                include('msjs.php');
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-3">
                <h3 class="text-center" id="title">Calendario TAPSD</h3>
            </div>
        </div>
    </div>
    <div id="calendar"></div>
    <?php
    include('modalNuevoEvento.php');
    include('modalUpdateEvento.php');
    ?>
</div>

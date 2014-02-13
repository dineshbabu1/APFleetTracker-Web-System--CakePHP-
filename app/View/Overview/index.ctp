<?php echo $this->Html->script('viewGoogleMap'); ?>
<div id="secondary-nav-wrapper" class="large-11 medium-11 small-11 columns show-for-medium-up">
    <nav id="secondary-nav" class="top-bar" data-topbar>

        <section class="top-bar-section">


            <!-- Top Nav Section -->
            <ul class="left">

                <li class="active"><?php echo $this->Html->link(__('Overview'), array('controller' => 'overview', 'action' => 'index')); ?> </li>
                <li class="divider"></li>
                <li><?php echo $this->Html->link(__('Activity'), array('controller' => 'overview', 'action' => 'viewActivityMap')); ?> </li>
                <li class="divider"></li>
                <li><a href="#">Statistics</a></li>
                <li class="divider"></li>
            </ul>
        </section>
    </nav>
</div>



    <div id="driver-content" class="row">
        <div id="three-stat-box-wrapper" class="large-7 medium-12 small-12 columns">
            <ul class="small-block-grid-3">
                <li class="stat-box"><ul><li class="stat-box-number">5</li><li class="stat-box-desc">Completed Jobs</li></ul></li>
                <li class="stat-box"><ul><li class="stat-box-number">5</li><li class="stat-box-desc">Active Jobs</li></ul></li>
                <li class="stat-box"><ul><li class="stat-box-number">10</li><li class="stat-box-desc">Active Drivers</li></ul></li>
            </ul>

            <h4>Live Feed:</h4>

        </div>


        <div id="map_canvas_wrapper" class="large-5 columns show-for-large-up">
            <?php echo $this->GoogleMap->map($map_options); ?>
            <?php
                $i = 1;
                    foreach($activeDriverLocations as $activeDriverLocation){
                        if($activeDriverLocation){
                            $marker_options = array(
                                'showWindow' => true,
                                'windowText' => "<h5>" . $activeDriverLocation['Driver']['first_name'] . " " . $activeDriverLocation['Driver']['last_name'] . "</h5>" .
                                                "<p>" . $activeDriverLocation['Driver']['telephone'] . "</p>",
                                'markerTitle' => $activeDriverLocation['Driver']['first_name'] . " " . $activeDriverLocation['Driver']['last_name'],
                                'markerIcon' => 'truckMarker.png'
                            );
                            echo $this->GoogleMap->addMarker("map_canvas", $i, array(
                                'latitude' => $activeDriverLocation['DriverLocation']['latitude'],
                                'longitude' => $activeDriverLocation['DriverLocation']['longitude']),
                                $marker_options
                            );

                            $i++;
                        }
                    } 
               
                ?>
        </div>
    </div>






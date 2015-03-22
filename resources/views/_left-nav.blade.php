    <div class="col-md-3">
    <a href="#"  id="nav-btn"><span class="glyphicon glyphicon-list"></span></a>

            <div class="panel panel-primary" id="nav-panel">
                <div class="panel-body">
                <ul class="nav nav-pills nav-stacked left-nav">
                    <li class="{{ $setHandmadeActive or '' }}">
                    <a href="{{ route('handmadeItems') }}">Handmade Items
                    <span class="glyphicon glyphicon-gift"></span>
                    </a>
                    </li>

                    <li class="{{ $setPcActive or '' }}">
                    <a href="{{ route('pcservice') }}">
                    Computer Services <span class="glyphicon glyphicon-briefcase"></span>
                    </a>
                    </li>

                    <li class="{{ $setElectricalActive or '' }}">
                    <a href="{{ route('electrical') }}"> Electricals & Electronics
                    <span class="glyphicon glyphicon-lamp"></span>
                    </a>
                    </li>

                    <li class="{{ $setPhotographyActive or '' }}">
                    <a href="{{ route('photography') }}"> Photography
                    <span class="glyphicon glyphicon-camera"></span>
                    </a>
                    </li>

                </ul>
                            </div>

                        </div>
         </div>
@section('sidebar')       
             <div class="logo">
                    <a href="{{ url('/') }}" class="simple-text">
                        Employees app
                    </a>
                </div>
                <ul class="nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ url('puesto/') }}">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Employments</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ url('empleado/') }}">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Employees</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ url('departamento/') }}">
                            <i class="nc-icon nc-notes"></i>
                            <p>Departments</p>
                        </a>
                    </li>
                
                </ul>
           
            
@show
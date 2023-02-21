
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">MySchool</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('citys.index')}}">City</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('areas.index')}}">Areas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('schools.index')}}">Schools</a>
                </li>
            </ul>
        </div>
</nav>
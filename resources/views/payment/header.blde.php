// payment.header
<nav class="navbar navbar-default" style="background-color: #FFFFFF;">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarEexample2">
                <h1>Simple Garden</h1>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarEexample2">
            @php
            if($_SERVER["/shipping"])
            {
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 60%;">
                    <span class="sr-only">60% Complete</span>
                </div>
            </div>
            }
            if($_SERVER["/settlment"])
            {
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 90%;">
                    <span class="sr-only">90% Complete</span>
                </div>
            </div>
            }
            if($_SERVER["/thanks"])
            {
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 100%;">
                    <span class="sr-only">100% Complete</span>
                </div>
            </div>
            }
            @endphp
        </div>
    </div>
</nav>

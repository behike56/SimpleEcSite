{{-- payment.header --}}
<nav class="navbar navbar-default" style="background-color: #FFFFFF;">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarEexample2">
            </button>
        </div>
        <h1>Simple Garden</h1>
        <div clss="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10" style="margin:auto">
                @if(request()->path()=='shipping')
                    <div class="progress">
                        <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" style="width: 30%">
                            進捗：30% 
                        </div>
                    </div>
                @endif
                @if(request()->path()=='settlement')
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" style="width: 60%">
                            進捗：60%
                        </div>
                    </div>
                @endif
                @if(request()->path()=='confirmation')
                    <div class="progress">
                        <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" style="width: 90%">
                            進捗：90%
                        </div>
                    </div>
                @endif
                @if(request()->path()=='thanks')
                    <div class="progress">
                        <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width: 100%">
                            100%　完了
                        </div>
                    </div>
                @endif
                </div>
            </div>
        </div>
</nav>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

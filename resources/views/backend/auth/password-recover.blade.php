<!DOCTYPE html>
<html>
    <head>
        @include('admin.layout.header');
    </head>


    <body class="fixed-left">

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>


        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="wrapper-page">

            <div class="card">
                <div class="card-body">

                    <h3 class="text-center m-0">
                        <!--<a href="index.html" class="logo logo-admin"><img src="assets/images/logo.png" height="30" alt="logo"></a>-->
                        <a href="" class="logo logo-admin">MAROON</a>
                    </h3>

                    <div class="p-3">
                        <h4 class="text-muted font-18 m-b-5 text-center">Reset Password</h4>
                        <p class="text-muted text-center">Enter your Email and instructions will be sent to you!</p>

                        <form class="form-horizontal m-t-30" action="index.html">

                            <div class="form-group">
                                <label for="useremail">Email</label>
                                <input type="email" class="form-control" id="useremail" placeholder="Enter email">
                            </div>

                            <div class="form-group row m-t-20">
                                <div class="col-12 text-right">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Reset</button>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>

            <div class="m-t-40 text-center">
                <p class="text-white">Remember It ? <a href="pages-login.html" class="font-500 font-14 text-white font-secondary"> Sign In Here </a> </p>
                <p class="text-white">© @php echo date('Y'); @endphp MAROON. Crafted with <i class="mdi mdi-heart text-danger"></i> by Virtual Market Solution Ltd.</p>
            </div>

        </div>


        @include('admin.layout.footer');

    </body>
</html>
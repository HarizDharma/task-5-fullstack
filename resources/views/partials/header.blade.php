<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

<p class="h5">Selamat Datang, {{ Auth::user()->name }}</p>
    <span class="d-flex" style="margin-left: 1000px; margin-right: 10px">
        <form class="d-flex align-items-center" action="{{ route('logout') }}"
            method="post">
            @csrf
            <button class="btn btn-danger" type="submit">Keluar</button>
        </form>
    </span>

</header><!-- End Header -->

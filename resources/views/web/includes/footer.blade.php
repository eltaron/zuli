<footer class="sticky-footer mt-4" dir="ltr">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <h5>
                &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script>
                Made With <i class="fa fa-heart text-danger"></i> By <b>Eng / Ahmed Goma Eltaroun</b>
            </h5>
        </div>
    </div>
</footer>
</div>
</div>
</div>
</main>
<div class="dropdown setting">
    <button class="btn btn-primary btn-lg dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
        aria-expanded="false">
        <i class="fa fa-cogs"></i>
    </button>
    <ul class="dropdown-menu text-right" aria-labelledby="dropdownMenuButton">
        <li><a class="dropdown-item" href="{{ url('patient/add') }}">اضافه مريض جديد</a></li>
        <li><a class="dropdown-item" href="{{ url('patient/search') }}"> البحث عن مريض</a></li>
        <li><a class="dropdown-item" href="{{ url('clinics') }}">كل العيادات</a></li>
        <li><a class="dropdown-item" href="{{ url('days') }}">كل الايام</a></li>
        <li><a class="dropdown-item" href="{{ url('logout') }}">تسجيل الخروج</a></li>
    </ul>
</div>

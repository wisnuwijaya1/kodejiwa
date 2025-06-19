<script src="{{asset('default/vendors/jquery/jquery.min.js')}}"></script>
<aside class="chat">
    <div class="chat__header">
        <h2 class="chat__title">Chat <small>Currently 20 contacts online</small></h2>

        <div class="chat__search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search...">
                <i class="form-group__bar"></i>
            </div>
        </div>
    </div>

    <div class="scrollbar-inner">
        <div class="listview listview--hover chat__buddies">
            <a class="listview__item chat__available">
                <img src="default/demo/img/profile-pics/7.jpg" class="listview__img" alt="">

                <div class="listview__content">
                    <div class="listview__heading">Jeannette Lawson</div>
                    <p>hey, how are you doing.</p>
                </div>
            </a>

            <a class="listview__item chat__available">
                <img src="default/demo/img/profile-pics/5.jpg" class="listview__img" alt="">

                <div class="listview__content">
                    <div class="listview__heading">Jeannette Lawson</div>
                    <p>hmm...</p>
                </div>
            </a>

            <a class="listview__item chat__away">
                <img src="default/demo/img/profile-pics/3.jpg" class="listview__img" alt="">

                <div class="listview__content">
                    <div class="listview__heading">Jeannette Lawson</div>
                    <p>all good</p>
                </div>
            </a>

            <a class="listview__item">
                <img src="default/demo/img/profile-pics/8.jpg" class="listview__img" alt="">

                <div class="listview__content">
                    <div class="listview__heading">Jeannette Lawson</div>
                    <p>morbi leo risus portaac consectetur vestibulum at eros.</p>
                </div>
            </a>

            <a class="listview__item">
                <img src="default/demo/img/profile-pics/6.jpg" class="listview__img" alt="">

                <div class="listview__content">
                    <div class="listview__heading">Jeannette Lawson</div>
                    <p>fusce dapibus</p>
                </div>
            </a>

            <a class="listview__item chat__busy">
                <img src="default/demo/img/profile-pics/9.jpg" class="listview__img" alt="">

                <div class="listview__content">
                    <div class="listview__heading">Jeannette Lawson</div>
                    <p>cras mattis consectetur purus sit amet fermentum.</p>
                </div>
            </a>
        </div>
    </div>

    <a href="messages.html" class="btn btn--action btn-danger"><i class="zmdi zmdi-plus"></i></a>
</aside>
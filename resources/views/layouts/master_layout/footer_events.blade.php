<!-- Footer Start -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <ul class="copyright-text">
                    <li><a href="index.html"><img src="{!! asset('master/images/logo-2.svg') !!}" alt=""></a></li>
                    <li>
                        <div class="ftr-1"><i class="far fa-copyright"></i> 2019 Ticket Gripe by <a href="http://innovadeus.com" target="_blank">Innovadeus Pvt Ltd</a>. All Rights Reserved.</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- Footer End -->
<!-- Scripts js -->
<!-- <script src="{!! asset('master/js/jquery.min.js') !!}"></script> -->
<!-- <script src="{!! asset('master/js/jquery.nice-select.js') !!}"></script> -->
<!-- <script src="{!! asset('master/js/datepicker.min.js') !!}"></script> -->
<!-- <script src="{!! asset('master/js/i18n/datepicker.en.js') !!}"></script> -->
<script src="{!! asset('master/js/bootstrap.bundle.min.js') !!}"></script>
<script src="{!! asset('master/js/owl.carousel.js') !!}"></script>
<script src="{!! asset('master/js/custom1.js') !!}"></script>
<!-- <script src="{!! asset('master/js/timer.js') !!}"></script> -->

<script>
        function searchToggle(obj, evt){
            var container = $(obj).closest('.search-wrapper');
                if(!container.hasClass('active')){
                    container.addClass('active');
                    evt.preventDefault();
                }
                else if(container.hasClass('active') && $(obj).closest('.input-holder').length == 0){
                    container.removeClass('active');
                    // clear input
                    container.find('.search-input').val('');
                }
        }
    </script>
</body>

</html>
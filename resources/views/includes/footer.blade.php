<footer class="main-footer text-center py-3">
	&copy; <script>document.write(new Date().getFullYear())</script> E-permit, All Rights Reserved.
</footer>
<color-palate>
    <svg version="1.1" id="Layer_1"
        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 600 600">
        <g>
            <circle fill="var(--color1)" cx="301.073" cy="300.173" r="300"/>
            <circle fill="#fff5" cx="301.073" cy="300.173" r="160" stroke="#fff" stroke-width="10" />
            <path fill="transparent" d="M301.074,108.027c106.119,0,192.146,86.027,192.146,192.146s-86.026,192.146-192.146,192.146
                c-106.12,0-192.146-86.027-192.146-192.146S194.955,108.027,301.074,108.027z" id="curve" />
            <circle fill="#39B790" class="clr clr-1" />
            <circle fill="#028cd1" class="clr clr-2" />
            <circle fill="#9039B7" class="clr clr-3" />
            <circle fill="#0a4541" class="clr clr-4" />
            <!-- <circle fill="#B73990" class="clr clr-4" /> -->
            <circle fill="#4715c1" class="clr clr-5" />
        </g>
        <text width="500">
            <textPath xlink:href="#curve">
                Switch Theme
            </textPath>
        </text>
    </svg>
</color-palate>

<div class="settings">
    <i class="priya-caret-right setting-btn"></i>
    <div class="settings-content">
        <label class="pri-check">
        <input type="checkbox" value="1" data-cls="fixed-header"><i></i>
        Fixed Header
        </label>
        <label class="pri-check">
        <input type="checkbox" value="1" data-cls="fixed-header-footer"><i></i>
        Fixed Header & Footer
        </label>
        <!-- <label class="pri-check">
        <input type="checkbox" value="1" data-cls="no-gap"><i></i>
        No Gap Dashboard
        </label> -->
    </div>
</div>

</div>

<script src="{{url('js/jquery.dataTables.min.js')}}"></script>
<script src="{{url('js/chart.min.js')}}"></script>
<script src="{{url('js/bootstrap.min.js')}}"></script>
<script src="{{url('js/app.js')}}"></script>
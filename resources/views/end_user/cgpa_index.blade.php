@include('end_user.head_style')
<body class="app">
    <div id="loader">
        <div class="spinner"></div>
    </div>
    <script>
        window.addEventListener('load', () => {
            const loader = document.getElementById('loader');
            setTimeout(() => {
            loader.classList.add('fadeOut');
            }, 300);
        });
    </script>

    {{-- sidebar --}}
    @include('end_user.end_user_sidebar')

    <div class="page-container">
    
    {{-- top sidebar --}}
    @include('end_user.end_user_topSidebar')

    <main class="main-content bgc-grey-100">
    	<div id="mainContent">
        	<div class="container-fluid">
    	
    			@include('end_user.cgpa_menu')

    			

            </div>

    	</div>
	</main>		


    
    <script type="text/javascript" src="{{ asset('colortheme/vendor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('colortheme/bundle.js') }}"></script>

</body>

</html>